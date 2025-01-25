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
    $this->idpropiedades = $args['idpropiedades'] ?? null;
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

  public function guardar() {
    if(!is_null($this->idpropiedades)) {
      //actualizar
      $this->actualizar();
      
    } else {
      //Creando un nuevo registro.
      
      $this->crear();
    }
  }

  public function crear() {

    //Sanitizar los datos.
    $atributos = $this->sanitizarDB();

    //insertar en la base de datos
    $query = "INSERT INTO propiedades (";
    $query .= join(', ', array_keys($atributos));
    $query .= ") VALUES ('"; 
    $query .= join("','", array_values($atributos));
    $query .= "')"; 

    // debug($query);

    $resultado = self::$db->query($query);
    // debug($result);

    if($resultado) {
      //redireccionar al usuario.
      header("Location: /admin?mensaje=1");

    }
  }

  public function actualizar() {
    $atributos = $this->atributos();

    $valores = [];

    foreach($atributos as $key => $value) {
        $valores[] = "$key ='$value'";
    }
    $query = "UPDATE propiedades SET ";
    $query .= join(', ', $valores);
    $query .= "WHERE idpropiedades = '" . self::$db->escape_string($this->idpropiedades). "' ";
    $query .= " Limit 1 ";
    
    $resultado = self::$db->query($query);

    if($resultado) {
      //redireccionar al usuario.
      header("Location: /admin?mensaje=2");

    }
  }

  //Eliminar un registro
  public function eliminar() {
    //Elimina la propiedad.
    $query =  "DELETE FROM propiedades WHERE idpropiedades = " . self::$db->escape_string($this->idpropiedades) . " LIMIT 1";

    $resultado = self::$db->query($query);

    if($resultado) {
      //Llamando al metodo borrar la imagen
      $this->borrarImagen();
      //redireccionar al usuario.
      header("Location: /admin?mensaje=3");

    }
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
    //Elimina la iamgen previa.
    if(!is_null($this->idpropiedades)) {
      //Comprobar si existe el archivo.
      $this->borrarImagen();
    }

    //Asigna el atributo de imagen el nombre de la imagen.
    if($imagen) {
      $this->imagen = $imagen;
    }
  }

  //Borar la imagen del archivo.
  public function borrarImagen() {

    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
      
      if($existeArchivo) {
        unlink(CARPETA_IMAGENES . $this->imagen);
      }
    // $query = "SELECT imagen FROM propiedades WHERE idpropiedades = $id";
    // $resultimagen = mysqli_query($db, $query);
    // $propiedad = mysqli_fetch_assoc($resultimagen);
    // unlink('../imagenes/'. $propiedad['imagen']);
  }


  //Lista todas las registros
  public static function all() {
    $query = "SELECT * FROM propiedades";
    $resultado = self::consultSQL($query);
    // debug($resultado->fetch_assoc());
    return $resultado;
  }

  //Busca una registro por su id.
  public static function find($id){
    $query = "SELECT * FROM propiedades WHERE idpropiedades = $id";
    $resultado = self::consultSQL($query);
    return array_shift($resultado);
  }

  public static function consultSQL($query) {
    //Consultar la base de datos
    $resultado = self::$db->query($query);
    
    //Iterar los resultados.
    // debug($resultado->fetch_assoc());

    $array = [];
    while($registro = $resultado->fetch_assoc() ) {
      $array[] = self::crearObj($registro);
    } 

    // debug($array);

    //Liberar la memoria.
    $resultado->free();
    //Retornar los resultados.
    return $array;
  }

  protected static function crearObj($registro) {
    $objeto = new self;

    // 
    foreach($registro as $key => $value) {
      // debug($key);
      if(property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }

    return $objeto;
  }

  //Sincronizar el objeto en memoria con los cambios realizados por el usuario.
  public function sincronizar($args = []) {
    foreach($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}

