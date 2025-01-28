<?php 

namespace App;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['idvendedores', 'nombre', 'apellido', 'telefono'];


    public $idvendedores;
    public$nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []) {
        $this->idvendedores = $args['idvendedores'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
      }
    
}

?>