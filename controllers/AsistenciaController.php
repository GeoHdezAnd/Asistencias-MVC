<?php 

namespace Controllers;

use Model\Asistencia;
use MVC\Router;

class AsistenciaController{

    public static function asistencia(Router $router){
        $asistencia = new Asistencia;

        //ALERTAS
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Recuperar datos
            $asistencia->sincronizar($_POST);
            $alertas = $asistencia->validarAsistencia();
            if(empty($alertas)){
                $resultado = $asistencia->guardar();
                if($resultado){
                    Asistencia::setAlerta('exito', 'Asistencia registrada');
                }
            }
        }
        $alertas = Asistencia::getAlertas();
        $router->render('auth/asistencias', [
            'titulo' => 'Asistencia',
            'alertas' => $alertas,
            'asistencia' => $asistencia
        ]);
        
    }
}