<?php

use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

    require '../../includes/app.php';
    estaAuth();

    // if(!$auth) {
    //     header('Location: /');
    // }

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: /admin");
    }
    //Consulta para obtener los datos de la propiedad
    
    $propiedad = Propiedad::find($id);
    
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //Array con mensaje de errores
    $errores = Propiedad::getError();


    //Ejecutar el codigo luego del usuario envia el form.
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        //Asignar los atributos.
        $args = $_POST['propiedad'];


        $propiedad->sincronizar($args);
        //Validacion
        $errores = $propiedad->validar();

        //Subida de archivos.
        
        
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            // $propiedad->crear();
            // $nombreImagen = uniqid( rand()). $imagen['name'];
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
   
            $propiedad->setImage($nombreImagen); 

            
        }


        if(empty($errores)) {

            //$Image->save(CARPETA_IMAGENES . $nombreImagen);
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $propiedad->guardar();
                        //insertar en la base de datos
            // $query = "UPDATE propiedades SET titulo = '$titulo',  precio = '$precio', imagen = '$nombreImagen', Descripción = '$descrp', habitaciones = $habit, bathroom = $bath, estacionamiento = $estac, vendedores_idvendedores = $seller WHERE idpropiedades = $id";

        }
    }


    
        
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
       
    <?php include '../../includes/templates/formularios_propiedades.php'; ?>

        <input class="boton-verde btnform" type="submit" value="Actualizar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
