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
    $propiedad = new Propiedad;
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);


    //Array con mensaje de errores
    $errores = Propiedad::getError();
    // $titulo = '';
    // $precio = '';
    // $descrp = '';
    // $habit =  '';
    // $bath = '';
    // $estac = '';
    // $seller = '';
    


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

        <?php include '../../includes/templates/formularios_propiedades.php'; ?>

        <input class="boton-verde btnform" type="submit" value="Enviar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
