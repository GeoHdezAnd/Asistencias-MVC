<?php

namespace Model;

class Clase extends ActiveRecord{
    protected static $tabla = 'clase';
    protected static $columnasDB = ['id', 'nrc', 'clave', 'nombre', 'secc', 'id_profesor', 'salon'];

    public $id;
    public $nrc;
    public $clave;
    public $nombre;
    public $secc;
    public $id_profesor;
    public $salon;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nrc = $args['nrc'] ?? '';
        $this->clave = $args['clave'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->secc = $args['secc'] ?? '';
        $this->id_profesor = $args['id_profesor'] ?? null;
        $this->salon = $args['salon'] ?? null;
    }

    public function validarClase(){
        if(!$this->nrc) {
            self::$alertas['error'][] = 'El nrc es obligatorio';   
        }
        if(!$this->clave) {
            self::$alertas['error'][] = 'La clave es obligatoria';   
        }
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';   
        }
        if(!$this->secc) {
            self::$alertas['error'][] = 'La seccion es obligatoria';   
        }
        if(!$this->id_profesor){
            self::$alertas['error'][] = 'El profesor es obligatorio';
        }
        if(!$this->salon){
            self::$alertas['error'][] = 'El salon es obligatorio';
        }


        return self::$alertas;
    }

    // Revisa si la clave existe
    public function existeClase(){
        $query = " SELECT *  FROM " . self::$tabla . " WHERE nrc = '" . $this->nrc . "' LIMIT 1";
        // agrega el query a la base de datos que se conecta en database.php
        // self:: self hace referencia a propia clase, :: acceder a elementos estaticos de una clase
        $resultado = self::$db->query($query);
        // accedemos a num_rows del resultado del query
        // valida si lanza registro
        if($resultado->num_rows){
            self::$alertas['error'][] = 'La clase ya está registrada';
        } 

        return $resultado;
    }
}