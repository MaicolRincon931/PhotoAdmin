<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $usuario = new Usuario($_POST);
            
            $alertas = $usuario->validarLogin();

            if(empty($alertas)) {

                // Verificar quel el usuario exista
                $usuario = Usuario::where('correo', $usuario->correo);
                
                if(!$usuario ) {
                    Usuario::setAlerta('error', 'El Usuario No Existe');
                } else {
                  
                    // El Usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        

                        // Iniciar la sesión
                        session_start();    
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;

                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['nivel'] = $usuario->nivel ?? null;

                        //Redireccionar al usuario
                        header('Location: /dashboard');

                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        // Render a la vista 
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }


    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
       
    }

    public static function registro(Router $router) {
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                    

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta en DevWebcamp',
            'usuario' => $usuario, 
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router) {
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if(empty($alertas)) {
                // Buscar el usuario
                $usuario = Usuario::where('correo', $usuario->correo);

                if($usuario) {

                    // Generar un nuevo token
                    $usuario->crearToken();
                  

                    // Actualizar el usuario
                    $usuario->guardar();

                   
                    // Enviar el email
                    $email = new Email( $usuario->correo, $usuario->nombre, $usuario->token );
                    $email->enviarInstrucciones();
                    
                    header('Location: /recuperacion?correo='. $usuario->correo);
                    // Imprimir la alerta
                    // Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');

                    
                } else {
                 
                    // Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');

                    $alertas['error'][] = 'El Usuario no existe en nuestra base de datos';
                }
            }
        }

        // Muestra la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi Contraseña',
            'alertas' => $alertas
        ]);
    }

    public static function recuperacion(Router $router) {

        $correo = $_GET['correo'];

       
        
        // Identificar el usuario con ese correo
        $usuario = Usuario::where('correo', $correo);
       
        if(empty($usuario)) {
           header('Location: /login');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            
            //Validar el token

            $token = $_POST['token'];
            
            
            if($usuario->token === $token){
                header('Location: /nuevo-password?correo='.$correo.'&token='.$token);
            }else{
                
                Usuario::setAlerta('error', 'Codigo Incorrecto');
            }
    
        }

        $alertas = Usuario::getAlertas();
        
        // Muestra la vista
        $router->render('auth/recuperacion', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'correo' => $correo
        ]);
    }

    public static function nuevoPassword(Router $router){
        
        $alertas = [];

        $correo = $_GET['correo'];
        $token = $_GET['token'];
        
        if(!$correo || !$token){
            header('Location: /login');
        }

        $usuario = Usuario::where('correo',$correo);
        if(!$usuario){
            header('Location: /login');
        }else{
            if($usuario->token !== $token){
                header('Location: /login');
            }
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->password = $_POST['password'];

            $alertas = $usuario->validarPassword();
            
            if(empty($alertas)){
                $usuario->hashPassword();
                $usuario->token='';
                
                $resultado= $usuario->guardar();
                
                if($resultado){
                    header('Location: /mensaje');
                }
            }
        }


        // Muestra la vista
        $router->render('auth/nuevo-password', [
            'titulo' => 'Nueva Contraseña',
            'alertas' => $alertas,
            'correo' => $correo ?? '',
            'token' => $token ?? ''
        ]);
    }

    public static function mensaje(Router $router){

        // Muestra la vista
        $router->render('auth/mensaje', [
            'titulo' => 'Contraseña Actualizada',      
        ]);
    }

   
}