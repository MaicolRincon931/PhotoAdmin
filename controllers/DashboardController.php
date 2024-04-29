<?php

namespace Controllers;

use MVC\Router;

class DashboardController {

    public static function index(Router $router){
        //Comprobar que este logeado
        $logeado=isLogin();
        
        

        // Render a la vista 
        $router->render('dashboard/index', [
            'titulo' => 'Inicio'
        ]);
    }
}