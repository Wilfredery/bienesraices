
<?php
//declare(strict_types=1);
// require 'app.php';
define('TEMPLATES_URL', __DIR__ .'/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function addingTemplates(string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAuth() : bool {
    session_start();
    // echo '<pre>';
    // var_dump($_SESSION);

    // echo '</pre>';
    if(!$_SESSION['login']) {
        header('Location: /');
    }
    return true;

}

function debug($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

    exit;
}
?>