<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Establecer el juego de caracteres a UTF-8
    $conn->exec("set names utf8");

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
    
}

