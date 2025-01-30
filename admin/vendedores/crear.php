<?php
    require '../../includes/app.php';
    use App\Vendedor;

    estaAuth();

    $vendedor = new Vendedor;
    $errores = Vendedor::getError();

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        //Crear una nueva instancia.
        $vendedor = new Vendedor($_POST['vendedor']);

        //Validar que no haya campos vacios.

        $errores = $vendedor->validar();

        if(empty($errores)) {
            $vendedor->guardar();
        }

    }

    addingTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Crear vendedor/a</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores AS $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        

    <?php endforeach; ?>    


    <form class="formulario" method="POST">

        <?php include '../../includes/templates/formularios_vendedores.php'; ?>

        <input class="boton-verde btnform" type="submit" value="Enviar">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
