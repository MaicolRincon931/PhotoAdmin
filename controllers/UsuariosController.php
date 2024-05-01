<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Usuario;
use MVC\Router;

class UsuariosController
{

    public static function index(Router $router)
    {

        //Comprobar que este logeado
        $logeado = isLogin();

        //Comprobar su nivel de acceso
        isNivel(4);

        $user = new Usuario;
        $guardado = false;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar todos los campos del POST
            $user->sincronizar($_POST);


            $alertas = $user->validarNuevoUsuario();
            if (empty($alertas)) {
                $existeUsuario = Usuario::where('correo', $user->correo);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $user->password = 1234;
                    $user->hashPassword();
                    // Crear un nuevo usuario
                    $resultado =  $user->guardar();

                    if ($resultado) {
                        $user = new Usuario;
                        $alertas['exito'][] = 'Usuario Registrado con Éxito';
                    }
                }
            }
        }

        $usuarios = Usuario::all();
        // Render a la vista 
        $router->render('usuarios/index', [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios,
            'alertas' => $alertas,
            'user' => $user
        ]);
    }


    public static function editar(Router $router)
    {
        //Comprobar que este logeado
        $logeado = isLogin();

        //Comprobar su nivel de acceso
        isNivel(4);

        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = Usuario::where('id', $_POST['id']);
            $usuario->sincronizar($_POST);

            $user = Usuario::where('correo', $usuario->correo);

            if($user){
                if ($user->id !== $usuario->id) {
                    $alertas['error'][] = 'El correo no puede ser el mismo entre Usuarios';
                } else {
                    $resultado = $usuario->guardar();
    
                    if ($resultado) {
                        header('Location: /dashboard/usuarios');
                    }
                }
            }
        }

        $usuarios = Usuario::all();
        // Render a la vista 
        $router->render('usuarios/index', [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios,
            'alertas' => $alertas,
            'user' => $user
        ]);
    }
}
