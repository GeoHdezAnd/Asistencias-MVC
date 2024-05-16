<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;
use Classes\Email;

class LoginController {
    public static function inicio(Router $router) {
        $router->render('auth/inicio');
    }
    public static function login(Router $router){
        $alertas = [];
        $auth = new Admin;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $alertas = $auth->validarLogin();
            if(empty($alertas)){
                // Comprobar usuario exista
                $admin = Admin::where('correo', $auth->correo);
                if($admin){
                    // Verificamos password
                    if($admin->comprobarPasswordVerificado($auth->password)){
                        // Autenticar usuario
                        session_start();

                        $_SESSION['id'] = $admin->id;
                        $_SESSION['nombre'] = $admin->nombre;
                        $_SESSION['apellidoPaterno'] = $admin->apellidoPaterno;
                        $_SESSION['correo'] = $admin->correo;
                        $_SESSION['login'] = true;

                        header('Location: /index');
                    }
                }else {
                    Admin::setAlerta('error', 'Usuario no encontrado');
                }
            }
            
        }
        $alertas = Admin::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
        
    }

    public static function olvide(Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $alertas = $auth->validarEmail();
            
            if(empty($alertas)){
                $admin = Admin::where('correo', $auth->correo);
                if($admin && $admin->confirmado === "1"){
                    // generar token
                    $admin->crearToken();
                    $admin->guardar();

                    // ENviar email
                    $email = new Email($admin->nombre, $admin->correo, $admin->token);
                    $email->enviarInstrucciones();
                    // Enviar alerta
                    Admin::setAlerta('exito', 'Instrucciones enviadas');
                } else{
                    Admin::setAlerta('error', 'El usuario no existe o no esta confirmado');
                }
            }
        }
        $alertas = Admin::getAlertas();
        $router->render('auth/olvide', [
            'alertas' => $alertas
        ]);
    }

    public static function reestablece(Router $router){
        $alertas = [];
        $error = false;
        $token = s($_GET['token']);

        // Buscamos a usuario por su token
        $admin = Admin::where('token', $token);
        
        
        if(empty($admin)){
            Admin::setAlerta('error', 'Token no valido');
            $error = true;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Leer el nuevo password y guardarlo
            $password = new Admin($_POST);
            
            $alertas = $password->validarPassword();

            if(empty($alertas)){
                
                $admin->password = null;
                
                $admin->password = $password->password;
                
                $admin->hashPassword();
                $admin->token = null;

                

                $resultado = $admin->guardar();
                if($resultado) {
                    header('Location: /login');
                }
            }
        }

        $alertas = Admin::getAlertas();
        $router->render('auth/reestablece', [
            'alertas' => $alertas,
            'error' => $error // Se pasa a la vista para evitar que salga una parte de contendio en vista
        ]);
    }

    
}