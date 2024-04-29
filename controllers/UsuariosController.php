<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Usuario;
use MVC\Router;

class UsuariosController{

    public static function index(Router $router){

        //Comprobar que este logeado
        $logeado=isLogin();
        
        $usuarios = Usuario::all();
        // Render a la vista 
        $router->render('usuarios/index', [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios
        ]);
    }
}