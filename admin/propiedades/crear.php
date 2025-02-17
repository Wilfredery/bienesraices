<?php 
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;


    // debug($propiedad);

    estaAuth();
    $propiedad = new Propiedad;
    use Intervention\Image\ImageManager as Image;

    //Consultas para obtener tod los vendedores.
    $vendedor = Vendedor::all();
    $errores = Propiedad::getError();

    //Ejecutar el codigo luego del usuario envia el form.
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        
        $propiedad = new Propiedad($_POST['propiedad']);
        // $nombreImagen = uniqid( rand()). $imagen['name'];
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
        //Generar un nombre uncico para evitar que las imagenes se reescriban.
        if($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new Image(Driver::class);
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);

        $propiedad->setImage($nombreImagen); 
        }
        
        $errores = $propiedad->validar();

        if(empty($errores)) {
            //Subida de archivos.            

            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);


            $propiedad->guardar();
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


    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formularios_propiedades.php'; ?>

        <input class="boton-verde btnform" type="submit" value="Enviar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
