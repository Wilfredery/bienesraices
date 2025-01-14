<?php 
        require 'includes/funciones.php';
        
        addingTemplates('header');
    ?>  
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <form class="formulario" action="">
            <fieldset>
                <legend>Emaily password</legend>

                <label for="email">E-mail: </label>
                <input type="email" placeholder="Aqui tu correo electronico" id="Email">

                <label for="password">Password: </label>
                <input type="password" placeholder="Aqui colocar tu password" id="password">

            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">

        </form>
    </main>

<?php 
    addingTemplates('footer');
?>