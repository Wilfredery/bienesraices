<?php
namespace App;

class Propiedad {
    public $idpropiedades;
    public $titulo;
    public $precio;
    public $imagen;
    public $Descripción;
    public $habitaciones;
    public $bathroom;
    public $estacionamiento;
    public $creado;
    public $vendedores_idvendedores;

    public function __construct($args = [])
    {
        $this->idpropiedades = $args['idpropiedades'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->Descripción = $args['Descripción'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->bathroom = $args['bathroom'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('d/m/Y');
        $this->vendedores_idvendedores = $args['vendedores_idvendedores'] ?? '';
    }
}

function guardar() {
  echo "GUARDANDO EN LA DB";   
}