<?php

namespace Model;

class Profesor extends ActiveRecord{
    protected static $tabla = 'profesor';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'clave', 'telefono'];

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $clave;
    public $telefono;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
        $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
        $this->clave = $args['clave'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validarProfesor(){
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';   
        }
        if(!$this->apellidoPaterno) {
            self::$alertas['error'][] = 'El apellido paterno es obligatorio';   
        }
        if(!$this->apellidoMaterno) {
            self::$alertas['error'][] = 'El apellido materno es obligatorio';   
        }
        if(!$this->clave) {
            self::$alertas['error'][] = 'La clave es obligatoria';   
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El telefono es obligatorio';
        }

        return self::$alertas;
    }

    // Revisa si la clave existe
    public function existeMaestro(){
        $query = " SELECT *  FROM " . self::$tabla . " WHERE clave = '" . $this->clave . "' LIMIT 1";
        // agrega el query a la base de datos que se conecta en database.php
        // self:: self hace referencia a propia clase, :: acceder a elementos estaticos de una clase
        $resultado = self::$db->query($query);
        // accedemos a num_rows del resultado del query
        // valida si lanza registro
        if($resultado->num_rows){
            self::$alertas['error'][] = 'EL maestro ya está registrado';
        } 

        return $resultado;
    }
}