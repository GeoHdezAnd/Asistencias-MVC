<?php

namespace Model;

use Model\ActiveRecord;

class AlumnoAdmin extends ActiveRecord{
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
        $this->carrera = $args['carrera'] ?? '';
    }
}