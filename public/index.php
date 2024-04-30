<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\UsuariosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
//$router->get('/registro', [AuthController::class, 'registro']);
//$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/recuperacion', [AuthController::class, 'recuperacion']);
$router->post('/recuperacion', [AuthController::class, 'recuperacion']);

//Nuevo Password
$router->get('/nuevo-password',[AuthController::class, 'nuevoPassword']);
$router->post('/nuevo-password',[AuthController::class, 'nuevoPassword']);

//Mensaje de confirmación de contraseña Actualizada con exito
$router->get('/mensaje',[AuthController::class, 'mensaje']);

//Usuarios Routing
$router->get('/dashboard/usuarios',[UsuariosController::class, 'index']);
$router->post('/dashboard/usuarios',[UsuariosController::class, 'index']);

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->comprobarRutas();