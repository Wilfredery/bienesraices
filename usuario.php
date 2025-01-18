<?php
    //importando la conexion
    require 'includes/app.php';
    $db = conectarDB();
    //crear email y password
    $email = 'correo@correo.com';
    $password = '123456';

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    //query para crear el usuario
    $query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

    echo $query;


    //adding to the database
    mysqli_query($db, $query);
?>