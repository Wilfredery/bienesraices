<?php
namespace App;

class Propiedad extends ActiveRecord {

  protected static $tabla = 'propiedades'; 
  
  protected static $columnasDB = ['idpropiedades', 'titulo', 'precio', 'imagen', 'Descripción', 'habitaciones', 'bathroom', 'estacionamiento', 'creado', 'vendedores_idvendedores'];

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

  public function __construct($args = []) {
    $this->idpropiedades = $args['idpropiedades'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->Descripción = $args['Descripción'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->bathroom = $args['bathroom'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedores_idvendedores = $args['vendedores_idvendedores'] ?? '';
    
  }

}

