<?php 

    require 'includes/app.php';
    $db = conectarDB();
    //User auth
    $errores = [];


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errores[] = "Correo obligatorio o no es valido.";
        } 

        if(!$password) {
            $errores[] = "Contra obligatoria.";
        }

        if(empty($errores)) {
            //Revisar si el usuario existe. Siempre este sera el primer paso
            $query = " SELECT * FROM usuarios WHERE email = '$email' ";
            $resultado = mysqli_query($db, $query);
            

            if ($resultado -> num_rows) { //En caso de que haya resultado
                //Revisar si la contra es correcta.
                $usuario = mysqli_fetch_assoc($resultado);
                var_dump($usuario);

                //Verificacion la validacion del password
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    //El usuario esta autenticado.
                    session_start();

                    //Llenar el arreglo de la session
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                    // echo "<pre>";
                    // var_dump($_SESSION);
                    // echo "</pre>";

                } else {
                    //El usuario no esta auth
                    $errores[] = "El password es incorrecto";
                }

            } else {
                $errores[] = 'El usuario no existe';
            }
        }
        
    }
    //Adding header
        
    addingTemplates('header');
?>  
    
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error) :?>
            <div class="alerta error">
                <?php echo $error; ?>

            </div>
        <?php endforeach;?>

        <form class="formulario" action="" method="POST">
            <fieldset>
                <legend>Emaily password</legend>

                <label for="email">E-mail: </label>
                <input name="email" type="email" placeholder="Aqui tu correo electronico" id="Email">

                <label for="password">Password: </label>
                <input name="password" type="password" placeholder="Aqui colocar tu password" id="password">

            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">

        </form>
    </main>

<?php 
    addingTemplates('footer');
?>