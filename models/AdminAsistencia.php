<?php

namespace Model;

class AdminAsistencia extends ActiveRecord {
    protected static $tabla = 'asistencia';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'matricula', 'fecha', 'hora'];

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $matricula;
    public $fecha;
    public $hora;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
        $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
        $this->matricula = $args['matricula'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }
}