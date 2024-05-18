<?php

include 'data/conexion.php';

// Permitir los métodos GET, POST, PUT, DELETE y OPTIONS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Permitir ciertos encabezados en las solicitudes
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejo de parametros GET
    if (isset($_GET['id'])) {
        obtenerPorId($conn, $_GET['id']);

    } elseif (isset($_GET['producto'])) {
        obtenerProducto($conn, $_GET['producto']);

    }elseif(isset($_GET['vu'])){
        optenerVu($conn, $_GET['vu']);

    }elseif(isset($_GET['peso'])){
        optenerPeso($conn, $_GET['peso']);

    }elseif(isset($_GET['ancho'])){
        optenerAncho($conn, $_GET['ancho']);

    }elseif(isset($_GET['largo'])){
        optenerLargo($conn, $_GET['largo']);

    }elseif (isset($_GET['page'])) {
        obtenerTodas($conn, $_GET['page']);
        
    } else {
        echo json_encode(['error' => 'Parametros Incorrecto.'], JSON_UNESCAPED_UNICODE);
    }//fin if isset
}//fin if server get

function obtenerPorId($conn, $id) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE idproducto = :id");
    $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
    ejecutarConsulta($sentencia);
}

function obtenerProducto($conn, $producto) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE producto = :producto");
    $sentencia->bindParam(':producto', $producto, PDO::PARAM_STR);
    ejecutarConsulta($sentencia);
}

function optenerVu($conn, $vu) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE valorunitario = :vu");
    $sentencia->bindParam(':vu', $vu, PDO::PARAM_INT);
    ejecutarConsulta($sentencia);
}

function optenerPeso($conn, $peso) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE peso = :peso");
    $sentencia->bindParam(':peso', $peso, PDO::PARAM_INT);
    ejecutarConsulta($sentencia);
}

function optenerAncho($conn, $ancho) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE ancho = :ancho");
    $sentencia->bindParam(':ancho', $ancho, PDO::PARAM_INT);
    ejecutarConsulta($sentencia);
}

function optenerLargo($conn, $largo) {
    $sentencia = $conn->prepare("SELECT * FROM productos WHERE largo = :largo");
    $sentencia->bindParam(':largo', $largo, PDO::PARAM_INT);
    ejecutarConsulta($sentencia);
}

function obtenerTodas($conn, $page) {
    if ($page > 0){
        $offset = ($page - 1) * 50;
        $sentencia = $conn->prepare("SELECT * FROM productos LIMIT 50 OFFSET :offset");
        $sentencia->bindParam(':offset', $offset, PDO::PARAM_INT);
        ejecutarConsulta($sentencia);
    }else{
        echo json_encode(['error' => 'No es dato de pagina correcto.'], JSON_UNESCAPED_UNICODE);
    }  
}

function ejecutarConsulta($sentencia) {
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    if ($resultado) {
        echo json_encode(['data' => $resultado], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(['error' => 'No se encontraron Datos en la base datos.'], JSON_UNESCAPED_UNICODE);
    }
}