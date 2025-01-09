<?php 
        // echo "<pre>";
        // var_dump($_GET);
        // echo "</pre>";
        // exit;
        $mensaje = $_GET['mensaje'] ?? null;
        require '../includes/funciones.php';
        
        addingTemplates('header');
?>

<main class="conte seccion">
    <h1>Administrador de dinero de Bienes Raices</h1>

    <?php if($mensaje == 1): ?>

        <p class="alerta exito">Anuncio creado correctamente</p>

    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>



</main>

<?php 
    addingTemplates('footer');
?>
