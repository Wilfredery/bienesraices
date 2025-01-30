<?php
    require '../includes/app.php';
    estaAuth();

    //Importando las clases.
    use App\Propiedad;
    use App\Vendedor;

    //Implementar un metodo para obtener todas las propiedades
    $propiedad = Propiedad::all();
    $vendedor = Vendedor::all();

    // debug($propiedades);

        //mostrar mensaje condicional
        $mensajeAlerta = $_GET['mensaje'] ?? null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoeCont($tipo)) {
                    
                    //Compara lo que se va a eliminar.
                    if($tipo === 'vendedor') {
                        $vendedor = Vendedor::find($id);    
                        //Eliminar el archivo.
                        $vendedor->eliminar();
                    } else if ($tipo === 'propiedad') {
                        $propiedad = Propiedad::find($id);    
                        //Eliminar el archivo.
                        $propiedad->eliminar();
                    }
                }


            }
        }
        //Template agregado
        
        addingTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de dinero de Bienes Raices</h1>

    <?php
        $mensaje = mostrarNotificacion(intval($mensajeAlerta));
        if($mensaje) { ?>
            <p class="alerta exito"><?php echo sanitizar($mensaje); ?></p>
        <?php } ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <h2>Propiedades</h2>
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

            <?php foreach( $propiedad as $propiedad): ?>

            <tr>
                <td><?php echo $propiedad->id; ?> </td>
                <td><?php echo $propiedad->titulo; ?> </td>
                <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt=""></td>
                <td>$<?php echo $propiedad->precio; ?> </td>
                <td>

                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input class="boton-rojo-block" value="Eliminar" type="submit" >
                    </form>
                    
                    <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/admin/vendedores/crear.php" class="boton boton-verde">Nuevo/a vendedor</a>
    <h2>Vendedores/as</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!--Mostrar los resultados-->

            <?php foreach( $vendedor as $vendedor): ?>

            <tr>
                <td> <?php echo $vendedor->id; ?> </td>
                <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                <td> <?php echo $vendedor->telefono; ?> </td>
                <td>

                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input class="boton-rojo-block" value="Eliminar" type="submit" >
                    </form>
                    
                    <a class="boton-amarillo-block" href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php 

    addingTemplates('footer');
?>