<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\AsistenciaController;
use Controllers\DashboardController;
use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// Principal
$router->get('/', [LoginController::class, 'inicio']);
// Asistencia 

$router->get('/asistencia-alumno', [AsistenciaController::class, 'asistencia']);
$router->post('/asistencia-alumno', [AsistenciaController::class, 'asistencia']);



// Iniciar Sesion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar password 
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/reestablece', [LoginController::class, 'reestablece']);
$router->post('/reestablece', [LoginController::class, 'reestablece']);

// Crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Administrador 
$router->get('/index', [DashboardController::class, 'index']);
$router->get('/usuarios', [DashboardController::class, 'usuarios']);
// Administrador agregar administrador
$router->get('/administrador', [DashboardController::class, 'administrador']);
$router->get('/agregar-admin', [DashboardController::class, 'agregarAdmin']);
$router->post('/agregar-admin', [DashboardController::class, 'agregarAdmin']);
$router->get('/confirma-cuenta', [DashboardController::class, 'confirmar']);
$router->get('/mensaje', [DashboardController::class, 'mensaje']);
$router->post('/eliminar-admin', [DashboardController::class, 'eliminarAdmin']);


// Alumnos
$router->get('/alumno', [DashboardController::class, 'alumno']);
$router->get('/agregar-alumno', [DashboardController::class, 'agregarAlumno']);
$router->post('/agregar-alumno', [DashboardController::class, 'agregarAlumno']);
$router->get('/editar-alumno', [DashboardController::class, 'editarAlumno']);
$router->post('/editar-alumno', [DashboardController::class, 'editarAlumno']);
$router->post('/eliminar-alumno', [DashboardController::class, 'eliminarAlumno']);


//Profesor
$router->get('/profesor', [DashboardController::class, 'profesor']);
$router->get('/agregar-profesor', [DashboardController::class, 'agregarProfesor']);
$router->post('/agregar-profesor', [DashboardController::class, 'agregarProfesor']);
$router->get('/editar-profe', [DashboardController::class, 'editarProfe']);
$router->post('/editar-profe', [DashboardController::class, 'editarProfe']);
$router->post('/eliminar-profe', [DashboardController::class, 'eliminarProfe']);


// CLASES
$router->get('/clases', [DashboardController::class, 'clases']);
$router->get('/agregar-clase', [DashboardController::class, 'agregarClase']);
$router->post('/agregar-clase', [DashboardController::class, 'agregarClase']);
$router->get('/editar-clase', [DashboardController::class, 'editarClase']);
$router->post('/editar-clase', [DashboardController::class, 'editarClase']);
$router->post('/eliminar-clase', [DashboardController::class, 'eliminarClase']);
// Asistencias
$router->get('/asistencias', [DashboardController::class, 'asistencias']);

// API ADMIN
$router->get('/api/admin', [APIController::class, 'verAdmin']);

// API ASISTENCIAS
// API ADMIN
$router->get('/api/asistencias', [APIController::class, 'verAsistencias']);

// API ALUMNO
$router->get('/api/alumnos', [APIController::class, 'verAlumno']);

// API MAESTROS
$router->get('/api/profesor', [APIController::class, 'verProfesor']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();