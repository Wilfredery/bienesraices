<?php 
    //base de datos
    require '../../includes/config/database.php';
    conectarDB();
    require '../../includes/funciones.php';
        
    addingTemplates('header', $inicio = true);
    ?>

<main class="conte seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" action="">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" placeholder="titulo de la propiedad">

            <label for="precio">Precio: </label>
            <input type="number" id="precio" placeholder="precio propiedad">

            <label for="imagen">Imagen: </label>
            <input type="file" id="imagen">

            <label for="descripcion">Descripcion</label>
            <textarea name="" id="descripcion"></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input type="number" id="habitaciones" placeholder="Cantidad de habitaciones. EJ: 3" min="1">

            <label for="baños">Baños: </label>
            <input type="number" id="baños" placeholder="Cantidad de habitaciones. EJ: 3" min="1">


            <label for="estacionamientos">Estacionamientos: </label>
            <input type="number" id="estacionamientos" placeholder="Cantidad de habitaciones. EJ: 3" min="1">
        </fieldset>

        
        <fieldset>
            <legend>Vendedor</legend>

            <select name="" id="">
                <option value="1">Juan</option>
                <option value="2">Pablito</option>

            </select>
        </fieldset>

        <input class="boton-verde btnform" type="submit" value="Enviar propiedad">
    </form>
</main>

<?php 
    addingTemplates('footer');
?>
