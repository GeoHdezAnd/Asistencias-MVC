<?php

namespace Model;

class Alumno extends ActiveRecord{
    protected static $tabla = 'alumno';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'matricula', 'carrera'];

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $matricula;
    public $carrera;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
        $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
        $this->matricula = $args['matricula'] ?? '';
        $this->carrera = $args['carrera'] ?? null;
    }

    public function validarAlumno(){
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';   
        }
        if(!$this->apellidoPaterno) {
            self::$alertas['error'][] = 'El apellido paterno es obligatorio';   
        }
        if(!$this->apellidoMaterno) {
            self::$alertas['error'][] = 'El apellido materno es obligatorio';   
        }
        if(!$this->matricula) {
            self::$alertas['error'][] = 'La matricula es obligatoria';   
        }
        if(!$this->carrera){
            self::$alertas['error'][] = 'La carrera es obligatoria';
        }

        return self::$alertas;
    }

    // Revisa si matricula existe
    public function existeAlumno(){
        $query = " SELECT *  FROM " . self::$tabla . " WHERE matricula = '" . $this->matricula . "' LIMIT 1";
        // agrega el query a la base de datos que se conecta en database.php
        // self:: self hace referencia a propia clase, :: acceder a elementos estaticos de una clase
        $resultado = self::$db->query($query);
        // accedemos a num_rows del resultado del query
        // valida si lanza registro
        if($resultado->num_rows){
            self::$alertas['error'][] = 'EL alumno ya está registrado';
        } 

        return $resultado;
    }
}