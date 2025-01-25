<?php 
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

estaAuth();

$db = conectarDB();
$errores = Propiedad::getError();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $propiedad = new Propiedad($_POST['propiedad']);
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Use the correct file input
    $manager = new Image(Driver::class);
    $Image = $manager->read($_FILES['imagen']['tmp_name'])->resize(800, 600);

    $propiedad->setImage($nombreImagen); 
    $errores = $propiedad->validar();

    if (empty($errores)) {
        // Upload the image
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES, 0755, true);
        }

        // Save the image to the server
        $Image->save(CARPETA_IMAGENES . $nombreImagen);

        // Save the property details to the database
        $propiedad->guardar();
    }
}

addingTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
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