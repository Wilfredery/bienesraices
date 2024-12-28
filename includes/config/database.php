<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud', '3306');

    if(!$db) {
        echo 'Error';
        exit;
    } 

    return $db;
}