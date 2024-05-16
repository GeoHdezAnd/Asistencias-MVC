<?php

namespace Controllers;

use Model\Admin;
use Model\Alumno;
use Model\Asistencia;
use Model\Clase;
use Model\Profesor;

class APIController{

    public static function verAdmin(){
        $admin = Admin::all();
        echo json_encode($admin);
    }

    public static function verAlumno(){
        $alumno = Alumno::all();
        echo json_encode($alumno);
    }

    public static function verProfesor(){
        $profesor = Profesor::all();
        echo json_encode($profesor);
    }

    public static function verAsistencias(){
        $asistencia = Asistencia::all();
        echo json_encode($asistencia);
    }
    
}
