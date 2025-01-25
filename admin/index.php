<?php
    require '../includes/app.php';
    estaAuth();

    use App\Propiedad;

    //Implementar un metodo para obtener todas las propiedades
    $propiedades = Propiedad::all();
    // debug($propiedades);

        // if(!$auth) {
        //     header('Location: /');
        // }

        // //Importar la conexion
        // require '../includes/config/database.php';
        // $db = conectarDB();
        //Escribir el Query
        // $query = "SELECT * FROM propiedades";
        // //Consultar la base de datos
        // $resultadoDB = mysqli_query($db, $query);

        //mostrar mensaje condicional
        $mensaje = $_GET['mensaje'] ?? null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
                //Eliminar el archivo.

                // var_dump($propiedad['imagen']);
                // echo $query;
                // exit;

                
                // $resultado = mysqli_query($db, $query);

                // if($resultado) {
                //     header('Location: /admin?mensaje=3');
                // }
            }
        }
        //Template agregado
        
        addingTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de dinero de Bienes Raices</h1>

    <?php if($mensaje == 1): ?>

        <p class="alerta exito">Anuncio creado correctamente</p>

    <?php elseif($mensaje == 2): ?>
    <p class="alerta exito">Anuncio actualizado correctamente</p>

    <?php elseif($mensaje == 3): ?>
        <p class="alerta exito">Anuncio borrado correctamente</p>

    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--Mostrar los resultados-->

            <?php foreach( $propiedades as $propiedad): ?>

            <tr>
                <td> <?php echo $propiedad->idpropiedades; ?> </td>
                <td> <?php echo $propiedad->titulo; ?> </td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt=""></td>
                <td>$<?php echo $propiedad->precio; ?> </td>
                <td>

                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad->idpropiedades; ?>">

                        <input class="boton-rojo-block" value="Eliminar" type="submit" >
                    </form>
                    
                    <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->idpropiedades; ?>">Actualizar</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>



</main>

<?php 
    //Cerar la conexion
    mysqli_close($db);

    addingTemplates('footer');
?>
