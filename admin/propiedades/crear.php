<?php 
    require '../../includes/app.php';

    use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

    $propiedad = new Propiedad;
    // debug($propiedad);

    estaAuth();

    // if(!$auth) {
    //     header('Location: /');
    // }

    //base de datos
    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //Array con mensaje de errores
    $errores = Propiedad::getError();
    $titulo = '';
    $precio = '';
    $descrp = '';
    $habit =  '';
    $bath = '';
    $estac = '';
    $seller = '';
    


    //Ejecutar el codigo luego del usuario envia el form.
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        
        $propiedad = new Propiedad($_POST);

        //Generar un nombre uncico para evitar que las imagenes se reescriban.
        $nombreImagen = uniqid( rand()). $imagen['name'];
        if($_FILES['imagen']['tmp_name']) {
            $manager = new Image(Driver::class);
            $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800,600);

            $propiedad->setImage($nombreImagen); 
        }

        $errores = $propiedad->validar();

        // debug($_FILES);


        if(empty($errores)) {
            //Subida de archivos.            

            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);


            $result = $propiedad->guardar();
            if($result) {
                //redireccionar al usuario.
                header("Location: /admin?mensaje=1");

            }
        }
    }
        
    addingTemplates('header');
    ?>



<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores AS $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        

    <?php endforeach; ?>    


    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="titulo" placeholder="titulo de la propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio: </label>
            <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="Descripción">Descripcion</label>
            <textarea id="Descripción" name="Descripción" ><?php echo $descrp; ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="habitaciones" value="<?php echo $habit ?>">

            <label for="bathroom">Baños: </label>
            <input type="number" id="bathroom" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="bathroom" value="<?php echo $bath ?>">


            <label for="estacionamiento">Estacionamientos: </label>
            <input type="number" id="estacionamiento" placeholder="Cantidad de habitaciones. EJ: 3" min="1" name="estacionamiento" value="<?php echo $estac ?>">
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

        <input class="boton-verde btnform" type="submit" value="Enviar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
