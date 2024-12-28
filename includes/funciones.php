
<?php
//declare(strict_types=1);
require 'app.php';

function addingTemplates(string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}