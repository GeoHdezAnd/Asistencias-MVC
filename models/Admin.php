<?php
// en composer se define que los models se identificaran como Model para ser llamados despues
namespace Model;

class Admin extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'admin';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'correo', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $correo;
    public $password;
    public $token;
    public $confirmado;
    
    // Constructor para ir agregando los argumentos que se pasan dentro de la funcion a los atributos de arriba y posteriotmente a la tabla
    public function __construct($args = []){
        // si no se les pasa nada guarda string vacio para validarlo
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPaterno = $args['apellidoPaterno'] ?? '';
        $this->apellidoMaterno = $args['apellidoMaterno'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
    }

    // Mensajes de validacion para crear la cuenta de admin
    public function validarCuenta(){
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';   
        }
        if(!$this->apellidoPaterno) {
            self::$alertas['error'][] = 'El apellido paterno es obligatorio';   
        }
        if(!$this->apellidoMaterno) {
            self::$alertas['error'][] = 'El apellido materno es obligatorio';   
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';   
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Validar Login
    public function validarLogin(){
        if(!$this->correo){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        return self::$alertas;
    }

    // Validar email
    public function validarEmail(){
        if(!$this->correo){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    // Validar password
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

// Revisa si ya existe el usuario
    public function existeUsuario() {
        $query = " SELECT *  FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        // agrega el query a la base de datos que se conecta en database.php
        // self:: self hace referencia a propia clase, :: acceder a elementos estaticos de una clase
        $resultado = self::$db->query($query);
        // accedemos a num_rows del resultado del query
        // valida si lanza registro
        if($resultado->num_rows){
            self::$alertas['error'][] = 'EL usuario ya está registrado';
        } 

        return $resultado;
    }

    public function hashPassword(){
        // ingresa a password para darle el valor de password hasheado
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordVerificado($password) {
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){
            self::$alertas['error'][] = 'Password incorrecto o cuenta no ha sido verificada';
        } else {
            return true;
        }
    }

    
}