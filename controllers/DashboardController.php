<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;
use Model\Clase;
use Model\Alumno;
use Classes\Email;
use Model\Profesor;
use Model\Asistencia;
use Model\AlumnoAdmin;
use Model\ClasesAdmin;
use Model\AdminAsistencia;

class DashboardController {
    public static function index(Router $router){
        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Usuarios'
        ]);
    }

    public static function administrador(Router $router){
        
        isAuth();

        $router->render('dashboard/administrador', [
            'titulo' => 'Usuarios'
        ]);
    }

    public static function agregarAdmin(Router $router){
        
        isAuth();
        $admin = new Admin;

        //Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Sincronizar va iterar los datos que se le pasan a post, con esto y el value que se le dio en en formulario, se van a giardar los valores que se pusieron por si se recarga la pagina
            $admin->sincronizar($_POST);
            $alertas = $admin->validarCuenta();

            // Revisar que alertas este vacio
            if(empty($alertas)){
                // Verifica que el usuario no este registrado
                $resultado = $admin->existeUsuario();
                if($resultado->num_rows){
                    $alertas = Admin::getAlertas();
                } else {
                    // Hashear password
                    $admin->hashPassword();

                    // Crear token unico
                    $admin->crearToken();

                    // Enviar email
                    $email = new Email($admin->nombre, $admin->correo, $admin->token);
                    $email->enviarConfirmacion();

                    // Creacion del usuario
                    $resultado = $admin->guardar();
                    
                    
                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }

        }

        $router->render('dashboard/agregar-admin', [
            'titulo' => 'Usuarios',
            'admin' => $admin,
            'alertas' => $alertas
        ]);
    }

    // EDITAR ADMIN
    public static function editarAdmin(Router $router){
        isAuth();
        if(!is_numeric($_GET['id'])) return;
        $admin = Admin::find($_GET['id']);
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $admin->sincronizar($_POST);
            $alertas = $admin->validarCuenta();

            if(empty($alertas)){
                $admin->guardar();
                Admin::setAlerta('exito', 'Dato actualizado');
            }
        }
        $alertas = Admin::getAlertas();
        $router->render('dashboard/actualizarAdmin', [
            'titulo' => 'Usuarios',
            'admin' => $admin,
            'alertas' => $alertas
        ]);
    }

    // Eliminar admin
    public static function eliminarAdmin(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $admin = Admin::find($id);
            $admin->eliminar();
            header('Location: /administrador');
        }
    }


    public static function mensaje(Router $router){

        $router->render('dashboard/mensaje');
    }

    public static function confirmar(Router $router){
        $alertas = [];

        // Sanitizamos para que no puedan manipular el token
        $token = s($_GET['token']);
        $admin = Admin::where('token', $token);
        
        if(empty($admin)){
            // Mostar mensaje de error
            Admin::setAlerta('error', 'Token no valido');
        } else {
            // Modifica a confirmado
            $admin->confirmado = "1";
            $admin->token = null;
            $admin->guardar();
            Admin::setAlerta('exito', 'Cuenta comprobada correctamente');
        }
        $alertas = Admin::getAlertas();
        $router->render('dashboard/confirma-cuenta', [
            'alertas' => $alertas
        ]);
    }

    public static function alumno(Router $router){
        isAuth();
        
        // ASISTENCIA  CONSULTA
        $consulta =  " SELECT alumno.id, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno, alumno.matricula, carrera.nombre as carrera ";
        $consulta .= " FROM alumno ";
        $consulta .= " LEFT OUTER JOIN carrera ";
        $consulta .= " ON alumno.carrera=carrera.id_carrera";

        $alumnos = AlumnoAdmin::SQL($consulta);
        $router->render('dashboard/alumno', [
            'titulo' => 'Usuarios',
            'alumnos' => $alumnos
        ]);
    }

    public static function agregarAlumno(Router $router){
        
        isAuth();

        $alumno = new Alumno;

        // Alertas
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Recuperar datos
            $alumno->sincronizar($_POST);
            $alertas = $alumno->validarAlumno();
            
            if(empty($alertas)){
                
                // Verifica usuario no existe
                $resultado = $alumno->existeAlumno();
                if($resultado->num_rows){
                    $alertas = Alumno::getAlertas();
                } else {
                    // Creacion de usuario 
                    $resultado = $alumno->guardar();
                    
                    if($resultado){
                        Alumno::setAlerta('exito', 'Alumno guardado correctamente');
                    }
                }
                
            }
        }
        $alertas = Alumno::getAlertas();
        $router->render('dashboard/agregar-alumno', [
            'titulo' => 'Usuarios',
            'alumno' => $alumno,
            'alertas' => $alertas
        ]);
    }

    public static function editarAlumno(Router $router){
        isAuth();
        if(!is_numeric($_GET['id'])) return;

        $alumno = Alumno::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $alumno->sincronizar($_POST);
            $alertas = $alumno->validarAlumno();

            if(empty($alertas)){
                $alumno->guardar();
                Alumno::setAlerta('exito', 'Dato actualizado correctamente');
            }
        }
        $alertas = Alumno::getAlertas();
        $router->render('dashboard/actualizarAlumno' , [
            'titulo' => 'Usuarios',
            'alumno' => $alumno,
            'alertas' => $alertas
        ]);
    }

    // Eliminar admin
    public static function eliminarAlumno(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $alumno = Alumno::find($id);
            $alumno->eliminar();
            header('Location: /alumno');
    }}

    // PROFESOR
    public static function profesor(Router $router){
        $router->render('dashboard/profesor', [
            'titulo' => 'Usuarios'
        ]);
    }
    public static function agregarProfesor(Router $router){
        
        isAuth();

        $profesor = new Profesor;

        // Alertas
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Recuperar datos
            $profesor->sincronizar($_POST);
            $alertas = $profesor->validarProfesor();
            
            if(empty($alertas)){
                
                // Verifica usuario no existe
                $resultado = $profesor->existeMaestro();
                if($resultado->num_rows){
                    $alertas = Admin::getAlertas();
                } else {
                    // Creacion de usuario 
                    $resultado = $profesor->guardar();
                    
                    if($resultado){
                        Alumno::setAlerta('exito', 'Profesor guardado correctamente');
                    }
                }
                
            }
        }
        $alertas = Admin::getAlertas();
        $router->render('dashboard/agregar-profesor', [
            'titulo' => 'Usuarios',
            'profesor' => $profesor,
            'alertas' => $alertas
        ]);
    }

    public static function editarProfe(Router $router){
        isAuth();
        if(!is_numeric($_GET['id'])) return;
        $profesor = Profesor::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profesor->sincronizar($_POST);
            $alertas = $profesor->validarProfesor();

            if(empty($alertas)){
                $profesor->guardar();
                Profesor::setAlerta('exito', 'Dato actualizado correctamente');
            }
        }
        $alertas = Profesor::getAlertas();
        $router->render('dashboard/actualizarProfesor', [
            'titulo' => 'Usuarios',
            'profesor' => $profesor,
            'alertas' => $alertas
        ]);
    }

     // Eliminar admin
    public static function eliminarProfe(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $profe = Profesor::find($id);
            $profe->eliminar();
            header('Location: /profesor');
    }}

    // CLASE
    public static function clases(Router $router){
        isAuth();
        // clases  CONSULTA
        $consulta =  " SELECT clase.id, clase.nrc, clase.clave , clase.nombre, clase.secc, CONCAT ( profesor.nombre, ' ', profesor.apellidoPaterno) as profesor, profesor.clave as claveProfe, clase.salon ";
        $consulta .= " FROM clase ";
        $consulta .= " LEFT OUTER JOIN profesor ";
        $consulta .= " ON clase.id_profesor=profesor.id";

        $clases = ClasesAdmin::SQL($consulta);

        $router->render('dashboard/clases', [
            'titulo' => 'Clases',
            'clases' => $clases
        ]);
    }

    public static function agregarClase(Router $router){
        
        isAuth();

        $clase = new Clase;

        // Alertas
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Recuperar datos
            $clase->sincronizar($_POST);
            $alertas = $clase->validarClase();
            
            if(empty($alertas)){
                
                // Verifica usuario no existe
                $resultado = $clase->existeClase();
                if($resultado->num_rows){
                    $alertas = Admin::getAlertas();
                } else {
                    // Creacion de usuario 
                    $resultado = $clase->guardar();
                    
                    if($resultado){
                        Alumno::setAlerta('exito', 'Clase guardada correctamente');
                    }
                }
                
            }
        }
        $alertas = Admin::getAlertas();
        $router->render('dashboard/agregar-clase', [
            'titulo' => 'Clases',
            'clase' => $clase,
            'alertas' => $alertas
        ]);
    }
    
    public static function editarClase(Router $router){
        isAuth();

        if(!is_numeric($_GET['id'])) return;
        $clase =  Clase::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $clase->sincronizar($_POST);
            $alertas = $clase->validarClase();

            if(empty($alertas)){
                $clase->guardar();
                Clase::setAlerta('exito', 'Dato actualizado correctamente');
            }
        }
        $alertas = Clase::getAlertas();
        $router->render('dashboard/actualizarClase', [
            'titulo' => 'Clases',
            'clase' => $clase,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarClase(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $clase = Clase::find($id);
            $clase->eliminar();
            header('Location: /clases');
        }
    }

    public static function asistencias(Router $router){
        
        isAuth();

        $router->render('dashboard/asistencias', [
            'titulo' => 'Asistencias'
        ]);
    }
}