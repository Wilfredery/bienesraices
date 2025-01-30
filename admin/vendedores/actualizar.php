<?php
    require '../../includes/app.php';
    use App\Vendedor;
    estaAuth();

    //Validar que sea un id valido.
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }
    
    //Obtener el arreglo del vendedor.
    $vendedor = Vendedor::find($id);
   

    //Arreglo con mensajes de errores.
    $errores = Vendedor::getError();

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        //Asignar los valores
        $args = $_POST['vendedor'];

        //Sincronizar objeto en memoria con lo que el usuario escribio.
        $vendedor->sincronizar($args);

        //validacion por si se le olvida rellenar un campo.
        $errores = $vendedor->validar();

        if(empty($errores)) {
            $vendedor->guardar();
        }
    }   

    addingTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Actualizar vendedor/a</h1>

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
