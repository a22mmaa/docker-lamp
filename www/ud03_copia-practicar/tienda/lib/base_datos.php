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
