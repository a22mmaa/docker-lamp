<?php

function conexion_bbdd() {
    $servername = "db";
	$username = "root";
	$password = "test";

    try {
	  $conPDO = new PDO("mysql:host=$servername;dbname=dbname", $username, $password);
	  
	  $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
	  echo "Fallo en conexión: " . $e->getMessage();
	}
    return $conPDO;
}

function crear_bbdd() {
    try {
        $conPDO = conexion_bbdd();
        $sql = "CREATE DATABASE IF NOT EXISTS donacion";
        $conPDO->exec($sql);
        $conPDO->exec("USE donacion");
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
	}	  
}

function preparar_bbdd() {
    $conPDO = conexion_bbdd();
    crear_bbdd();
    $conPDO->exec("USE donacion");

    try {

        $sql = "CREATE TABLE IF NOT EXISTS donantes (
            id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(50) NOT NULL,
            apellidos VARCHAR(50) NOT NULL,
            edad INT NOT NULL CHECK (edad > 18),
            grupo_sanguineo ENUM('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+') NOT NULL,
            codigo_postal VARCHAR(5) NOT NULL,
            telefono_movil VARCHAR(9) NOT NULL
            )";
	    $conPDO->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS historico (
            id INT PRIMARY KEY AUTO_INCREMENT,
            donante INT,
            fecha_donacion DATE,
            fecha_proxima_donacion DATE,
            FOREIGN KEY (donante) REFERENCES donantes(id)
        )";
	    $conPDO->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS administradores (
            username VARCHAR(50) PRIMARY KEY,
            password VARCHAR(200) NOT NULL
        )";
	    $conPDO->exec($sql);
    }catch(PDOExcetion $e){
        //$conPDO->rollback();
        echo "Fallo en conexión: ". $e->getMessage();
    }
}