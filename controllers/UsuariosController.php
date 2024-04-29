<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;

class UsuariosController{

    public static function index(Router $router){

        //Comprobar que este logeado
        $logeado=isLogin();
        
        

        // Render a la vista 
        $router->render('usuarios/index', [
            'titulo' => 'Usuarios'
        ]);
    }
}