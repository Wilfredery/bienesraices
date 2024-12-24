declare(strict_types=1);
<?php

require 'app.php';

function addingTemplates(string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}