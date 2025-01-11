<?php 
    
        // echo "<pre>";
        // var_dump($_GET);
        // echo "</pre>";

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: /admin");
    }

    //base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consulta para obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE idpropiedades = $id";

    $resultadoProDB = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultadoProDB); 
    // echo $consulta;

        // echo "<pre>";
        // var_dump($propiedad);
        // echo "</pre>";


    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //Array con mensaje de errores
    $errores = [];
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descrp = $propiedad['Descripción'];
    $habit =  $propiedad['habitaciones'];
    $bath = $propiedad['bathroom'];
    $estac = $propiedad['estacionamiento'];
    $seller = $propiedad['vendedores_idvendedores'];
    $imagenPropiedad = $propiedad['imagen'];
    


    //Ejecutar el codigo luego del usuario envia el form.
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // exit;
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        

        $num =  '1hola';
        $num1 = 1;

        //Sanitizar
        // $result = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        // var_dump($result);

        // $result = filter_var($num1, FILTER_VALIDATE_INT);
        // var_dump($result);
        // exit;

        $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descrp = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $habit =  mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
        $bath = mysqli_real_escape_string( $db,  $_POST['bathroom'] );
        $estac = mysqli_real_escape_string( $db,  $_POST['estacionamientos'] );
        $seller = mysqli_real_escape_string( $db,  $_POST['vendedor'] );
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];
        // var_dump($imagen['name']);
        // exit;

        if($titulo === '') {
            $errores[] = 'Debes agregar un titulo';
        }

        if($precio === '') {
            $errores[] = 'Debes agregar un precio';
        }

        if(strlen( $descrp ) < 50) {
            $errores[] = 'Su descrip debe de ser mayor a 50 caracteres de letras.';
        }

        if($habit === '') {
            $errores[] = 'Debes agregar la cantidad de habitaciones';
        }
        
        if($bath === '') {
            $errores[] = 'Debes agregar la cantidad de bathrooms';
        }

        if($estac === '') {
            $errores[] = 'Debes agregar la cantidad de estacionamientos';
        }

        if($seller === '') {
            $errores[] = 'Debes agregar al vendedor';
        }

        // if(!$imagen['name'] || $imagen['error'] ) {
        //     $errores[] = 'La imagen es obligatoria.';
        // }

        //Validar por tamaño de imagen(1MB max)
        $medidabaKB = 1000 * 1000;

        if ($imagen['size'] > $medidabaKB) {
            $errores[] = 'La imagen es muy pesada.';
        }


        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

    

        //Revisar que el array de errores este vacio
        if(empty($errores)) {
        
            //Subida de archivos

            //Crear una carpeta
            $imagefile = '../../imagenes/';
            
            if(!is_dir($imagefile)) {
                mkdir($imagefile);
            }
            $nombreImagen = '';
            //Si hay una nueva imagen, se elimina la imagen anterior.
            if($imagen['name']) {
                unlink($imagefile . $propiedad['imagen']);
                
                //Generar un nombre uncico para evitar que las imagenes se reescriban.
                $nombreImagen = uniqid( rand()). $imagen['name'];

                //Crear la imagen/subir la imagen.
                move_uploaded_file($imagen['tmp_name'], $imagefile .$nombreImagen);

            //Si no hay ningun cambio de imagen y se queda el mismo pues este no se eliminara.
            } else {
                $nombreImagen = $propiedad['imagen'];
            }




            
                        //insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '$titulo',  precio = '$precio', imagen = '$nombreImagen', Descripción = '$descrp', habitaciones = $habit, bathroom = $bath, estacionamiento = $estac, vendedores_idvendedores = $seller WHERE idpropiedades = $id";

            // echo $query;
            // exit;
            //Enviarlo a la base de datos
            $result = mysqli_query($db, $query);

            if($result) {
                //redireccionar al usuario.
                header("Location: /admin?mensaje=2");

            }
        }
    }


    require '../../includes/funciones.php';
        
    addingTemplates('header');
    ?>



<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores AS $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        

    <?php endforeach; ?>    


    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="titulo" placeholder="titulo de la propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio: </label>
            <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img class="imagen-small" src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" ><?php echo $descrp; ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="habitaciones" value="<?php echo $habit ?>">

            <label for="bathroom">Baños: </label>
            <input type="number" id="bathroom" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="bathroom" value="<?php echo $bath ?>">


            <label for="estacionamientos">Estacionamientos: </label>
            <input type="number" id="estacionamientos" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="estacionamientos" value="<?php echo $estac ?>">
        </fieldset>

        
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="" value="<?php echo $seller ?>">
                <option value="">--Seleccionar--</option>
                <!-- <option value="1">Juan</option>
                <option value="2">Pablito</option> -->

                <?php while( $vendedor = mysqli_fetch_assoc($resultado) ): ?>
                    <option <?php echo $seller === $vendedor['idvendedores'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['idvendedores']; ?>">
                         <?php echo $vendedor['nombre']. " ". $vendedor['apellido']; ?> 
                    </option>
                
                <?php endwhile; ?>

            </select>
        </fieldset>

        <input class="boton-verde btnform" type="submit" value="Actualizar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
