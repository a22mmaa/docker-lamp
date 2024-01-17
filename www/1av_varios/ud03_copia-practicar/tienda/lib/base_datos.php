<?php

function get_conexion()
{
    //Código para establecer á conexión
    //return $conexion;

    // Manuel: Creamos a conexión con MySQLi Orientado a obxectos

    $conexion = new mysqli('db', 'root', 'test', 'dbname');

    // Manuel: Comprobamos a conexión

    $erro = $conexion->connect_errno;

    if ($erro != null) {
        die('Produciuse un erro na conexión: ' . $conexion->connect_error . ' Código de erro: ' . $erro);
    }
    //echo "Conexión correcta.";

    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    $conexion->select_db("tenda2");
}


function crear_bd_tienda($conexion)
{
    //Código para creación de bd
    $sql = "CREATE DATABASE IF NOT EXISTS tenda2";

    if (!$conexion->query($sql)) {
        echo "Erro na creación na base de datos. " . $conexion->error;
    }
}

function crear_tabla_usuario($conexion)
{
    
    //Código para creación de bd
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(30) NOT NULL, 
        apellidos VARCHAR(30) NOT NULL,
        edad INT,
        provincia VARCHAR(50)
    )";

    if (!$conexion->query($sql)) {
        echo "Erro na creación na base de datos. " . $conexion->error;
    }
}

function dar_de_alta($conexion, $nome, $apelido, $idade, $provincia) {
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia)  
         VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssis", $nome, $apelido, $idade, $provincia);

    

    $stmt -> execute();
    $stmt -> close();
    $conexion -> close();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}