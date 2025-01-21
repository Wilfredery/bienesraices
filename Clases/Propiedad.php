<?php
namespace App;

class Propiedad {

  //Base de datos
  protected static $db;
  protected static $columnasDB = ['idpropiedades', 'titulo', 'precio', 'imagen', 'Descripción', 'habitaciones', 'bathroom', 'estacionamiento', 'creado', 'vendedores_idvendedores'];

  //Errores
  protected static $errores = [];

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

  //Definir la conexion a la base de datos.
  public static function setDB($database) {
    self::$db = $database;

  }

  public function __construct($args = []) {
    $this->idpropiedades = $args['idpropiedades'] ?? '';
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->Descripción = $args['Descripción'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->bathroom = $args['bathroom'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedores_idvendedores = $args['vendedor'] ?? '';
    
  }

  function guardar() {

    //Sanitizar los datos.
    $atributos = $this->sanitizarDB();

    //insertar en la base de datos
    $query = "INSERT INTO propiedades (";
    $query .= join(', ', array_keys($atributos));
    $query .= ") VALUES ('"; 
    $query .= join("','", array_values($atributos));
    $query .= "')"; 

    // debug($query);

    $result = self::$db->query($query);
    // debug($result);

    return $result;
  }

  //Identificar y unir los atributos de la DB. O sea, identificar cuales tenemos.
  public function atributos() {
    $atributos = [];

    foreach(self::$columnasDB as $columna) {
      //Eliminando el id paraque no se sinitize.
      //Si se cumple, continua con el siguiente (continue)
      if($columna === 'idpropiedades') continue;
      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  public function sanitizarDB() {
    $atributos = $this->atributos();
    $sanatizado = [];


    //Key columnas de la DB y value los resultados de las columnas del db.
    foreach($atributos as $key => $value) {
      $sanatizado[$key] = self::$db->escape_string($value);

    }
    return $sanatizado;
  }

  //Validaciones de errrores.
  public static function getError() {
    return self::$errores;
  }

  public function validar() {
    if(!$this->titulo) {
      self::$errores[] = 'Debes agregar un titulo';
    }
    
    if(!$this->precio) {
      self::$errores[] = 'Debes agregar un precio';
    }

    if(strlen($this->Descripción ) < 50) {
      self::$errores[] = 'Su descrip debe de ser mayor a 50 caracteres de letras.';
    }

    if(!$this->habitaciones) {
      self::$errores[] = 'Debes agregar la cantidad de habitaciones';
    }
    
    if(!$this->bathroom) {
      self::$errores[] = 'Debes agregar la cantidad de bathrooms';
    }

    if(!$this->estacionamiento) {
      self::$errores[] = 'Debes agregar la cantidad de estacionamientos';
    }

    if(!$this->vendedores_idvendedores) {
      self::$errores[] = 'Debes agregar al vendedor';
    }

    if(!$this->imagen) {
      self::$errores[] = 'La imagen es obligatoria.';
    }

    return self::$errores;
  }

  public function setImage($imagen) {
    if($imagen) {
      $this->imagen = $imagen;
    }
  }
}

