<?php
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

        // echo "<pre>";
        // var_dump($_GET);
        // echo "</pre>";
        // exit;

        //Importar la conexion
        require '../includes/config/database.php';
        $db = conectarDB();
        //Escribir el Query
        $query = "SELECT * FROM propiedades";
        //Consultar la base de datos
        $resultadoDB = mysqli_query($db, $query);

        //mostrar mensaje condicional
        $mensaje = $_GET['mensaje'] ?? null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                //Eliminar el archivo.
                $query = "SELECT imagen FROM propiedades WHERE idpropiedades = $id";
                $resultimagen = mysqli_query($db, $query);
                $propiedad = mysqli_fetch_assoc($resultimagen);
                unlink('../imagenes/'. $propiedad['imagen']);
                // var_dump($propiedad['imagen']);
                // echo $query;
                // exit;
                //Elimina la propiedad.
                $query =  "DELETE FROM propiedades WHERE idpropiedades = $id";
                
                $resultado = mysqli_query($db, $query);

                if($resultado) {
                    header('Location: /admin?mensaje=3');
                }
            }
        }
        //Template agregado
        require '../includes/funciones.php';
        
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

            <?php while($propiedad = mysqli_fetch_assoc($resultadoDB)): ?>

            <tr>
                <td> <?php echo $propiedad['idpropiedades']; ?> </td>
                <td> <?php echo $propiedad['titulo']; ?> </td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt=""></td>
                <td>$<?php echo $propiedad['precio']; ?> </td>
                <td>

                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['idpropiedades']; ?>">

                        <input class="boton-rojo-block" value="Eliminar" type="submit" >
                    </form>
                    
                    <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['idpropiedades']; ?>">Actualizar</a>
                </td>
            </tr>

            <?php endwhile; ?>
        </tbody>
    </table>



</main>

<?php 
    //Cerar la conexion
    mysqli_close($db);

    addingTemplates('footer');
?>
