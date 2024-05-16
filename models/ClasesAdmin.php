<?php

namespace Model;
use Model\ActiveRecord;

class ClasesAdmin extends ActiveRecord {
    protected static $tabla = 'clase';
    protected static $columnasDB = ['id', 'nrc', 'clave', 'nombre', 'secc', 'profesor', 'claveProfe', 'salon'];

    public $id;
    public $nrc;
    public $clave;
    public $nombre;
    public $secc;
    public $profesor;
    public $claveProfe;
    public $salon;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nrc = $args['nrc'] ?? '';
        $this->clave = $args['clave'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->secc = $args['secc'] ?? '';
        $this->profesor = $args['profesor'] ?? '';
        $this->claveProfe = $args['claveProfe'] ?? '';
        $this->salon = $args['salon'] ?? null;
    }
}