
<?php
//declare(strict_types=1);
require 'app.php';

function addingTemplates(string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAuth() : bool {
    session_start();
    // echo '<pre>';
    // var_dump($_SESSION);

    // echo '</pre>';
    $auth = $_SESSION['login'];
    if($auth) {
        return true;
    }

    return false;
}
?>