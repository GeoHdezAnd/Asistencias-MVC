<?php

namespace Model;

class Asistencia extends ActiveRecord{
    protected static $tabla = 'asistencia';
    protected static $columnasDB = ['id', 'matricula', 'fecha', 'hora', 'nrc', 'salon'];
    public $id;
    public $matricula;
    public $fecha;
    public $hora;
    public $nrc;
    public $salon;

    public function __construct($args = []){
        date_default_timezone_set('America/Mexico_City');
        $this->id = $args['id'] ?? null;
        $this->matricula = $args['matricula'] ?? '';
        $this->fecha = $args['fecha'] ?? date('Y-m-d');
        $this->hora = $args['hora'] ?? date('H:i:s');
        $this->nrc = $args['nrc'] ?? '';
        $this->salon = $args['salon'] ?? '';
    }

    public function validarAsistencia(){
        if(!$this->matricula) {
            self::$alertas['error'][] = 'La matricula es obligatorio';   
        }
        if(!$this->fecha) {
            self::$alertas['error'][] = 'La fecha es obligatoria';   
        }
        if(!$this->hora) {
            self::$alertas['error'][] = 'La hora es obligatorio';   
        }
        if(!$this->nrc) {
            self::$alertas['error'][] = 'El nrc es obligatoria';   
        }
        if(!$this->salon) {
            self::$alertas['error'][] = 'El salon es obligatoria';   
        }
    }
}