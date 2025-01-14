<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }
    //importar la base de datos
    require 'includes/config/database.php';
    $db =conectarDB();
    //Consular
    $query = "SELECT * FROM propiedades WHERE idpropiedades = $id";
    //Leer/obtener los resultados
    $resultado = mysqli_query($db, $query);

    //Manipulacion de objetos puedes chequear con un var_dump(result) los datos dentro de estas y te dira que es un objeto
    if(!$resultado->num_rows) {
        header('Location: /'); //Redireccionar
    }

    $propiedad = mysqli_fetch_assoc($resultado);
    // echo "<pre>";
    // var_dump($id);
    // echo "</pre>";
    // exit;

    require 'includes/funciones.php';        
    addingTemplates('header');
?>
    
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="imagenCasaBosque">

        </picture>

        <div class="resumen-propiedad">

            <p class="precio">$<?php echo number_format($propiedad['precio']); ?></p>

            <ul class="iconos-caracteristicas">

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="iconowc">
                    <p><?php echo $propiedad['bathroom']; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="iconoestacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="iconodormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['Descripción']; ?></p>
        </div>
    </main>

    <?php
        mysqli_close($db);
        addingTemplates('footer');
    ?>