    <?php 
        require 'includes/app.php';
        
        addingTemplates('header');
    ?>
    
    <main class="contenedor seccion">
        <h1>contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagencontacto">
        </picture>

        <h2>Llenar el siguiente formulario de contacto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Informacion personal</legend>

                <label for="nombre">Nombre: </label>
                <input type="text" placeholder="Aqui colocar tu nombre" id="nombre">

                <label for="email">E-mail: </label>
                <input type="email" placeholder="Aqui tu correo electronico" id="Email">

                <label for="telefono">Telefono: </label>
                <input type="tel" placeholder="Aqui colocar tu numero de telefono" id="telefono">

                <label for="Mensaje">Mensaje</label>
                <textarea name="" id="Mensaje"></textarea>
            </fieldset>


            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                
                <label for="opciones">Vende o Compra: </label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccionar--</option>
                    <option value="Compra">Compra</option>
                    <option value="Venda">Venda</option>
                </select>
                <label for="presupuesto">Presupuesto: </label>
                <input type="tel" placeholder="Aqui colocar tu presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elegir la fecha y la hora, por favor</p>

                <label for="fecha">Fecha: </label>
                <input type="date" id="fecha">

                <label for="hora">Hora: </label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde-block">
        </form>
    </main>

<?php 
    addingTemplates('footer');
?>