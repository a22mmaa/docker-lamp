<?php

// CUESTIÓNS BÁSICAS DA BD

function estabelecer_conexion() {
    $servername = "db";
    $username = "root";
    $password = "test";

    try {
        $conPDO = new PDO("mysql:host=$servername;dbname=dbname", $username, $password);
        
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conPDO;
    } catch(PDOException $e) {
            echo "Fallo en conexión: " . $e->getMessage();
        }
}


function crear_bbdd() {
    $conPDO = estabelecer_conexion();
   
    try {
        $sql = "CREATE DATABASE IF NOT EXISTS donacion231210";
        // use exec() because no results are returned
        $conPDO->exec($sql);
        // Se ao executar houbese algún erro, xa se vai capturar o catch
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conPDO = null;   
}

function crear_taboas() {
    $conPDO = estabelecer_conexion();
    crear_bbdd();
    $conPDO->exec("USE donacion231210");

    try{
        $sql = "CREATE TABLE IF NOT EXISTS donantes(
            id INT(6) AUTO_INCREMENT PRIMARY KEY, 
            nombre VARCHAR(30) NOT NULL,
            apellido VARCHAR(30) NOT NULL, 
            idade INT(3) NOT NULL,
            gruposanguineo VARCHAR(3) NOT NULL,
            codigopostal INT(5) NOT NULL,
            telefono INT(9) NOT NULL
            )";
        $conPDO->exec($sql);
    } catch(PDOException $e){
        //$conPDO->rollback();
        echo "Fallo Táboa Clientes: ". $e->getMessage();
    }

    try{
        $sql = "CREATE TABLE IF NOT EXISTS historico(
            id INT(6) AUTO_INCREMENT PRIMARY KEY, 
            donante INT(6) NOT NULL,
            fecha_donacion DATE, 
            fecha_donacion_proxima DATE
            )";
        $conPDO->exec($sql);
    } catch(PDOException $e){
        //$conPDO->rollback();
        echo "Fallo Táboa Histórico: ". $e->getMessage();
    }

    try{
        $sql = "CREATE TABLE IF NOT EXISTS administradores(
            usuarioadmin VARCHAR(50) PRIMARY KEY, 
            contraadmin VARCHAR(200) NOT NULL
            )";
        $conPDO->exec($sql);
    } catch(PDOException $e){
        //$conPDO->rollback();
        echo "Fallo Táboa Clientes: ". $e->getMessage();
    }
    $conPDO = null;
}

// INSERTS

function alta_donante($nome, $apelidos, $idade, $sangue, $cp, $tlfn) {
    $conPDO = estabelecer_conexion();
    $conPDO->exec("USE donacion231210");
    try {
        $stmt = $conPDO->prepare("INSERT INTO donantes (nombre, apellido, idade, gruposanguineo, codigopostal, telefono)
        VALUES (:nombre, :apellido, :idade, :gruposanguineo, :codigopostal, :telefono)");
        $stmt->bindParam(':nombre', $nome);
        $stmt->bindParam(':apellido', $apelidos);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':gruposanguineo', $sangue);
        $stmt->bindParam(':codigopostal', $cp);
        $stmt->bindParam(':telefono', $tlfn);

        $stmt->execute();

        $stmt->execute();

    } catch(PDOException $e){
        echo "Fallo inserindo datos de donante: ". $e->getMessage();
    }
    $conPDO = null;
}


function donar($nome, $apelidos, $idade, $sangue, $cp, $tlfn) {
    $conPDO = estabelecer_conexion();
    $conPDO->exec("USE donacion231210");
    try {
        $stmt = $conPDO->prepare("INSERT INTO donantes (nombre, apellido, idade, gruposanguineo, codigopostal, telefono)
        VALUES (:nombre, :apellido, :idade, :gruposanguineo, :codigopostal, :telefono)");
        $stmt->bindParam(':nombre', $nome);
        $stmt->bindParam(':apellido', $apelidos);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':gruposanguineo', $sangue);
        $stmt->bindParam(':codigopostal', $cp);
        $stmt->bindParam(':telefono', $tlfn);

        $stmt->execute();

        $stmt->execute();

    } catch(PDOException $e){
        echo "Fallo inserindo datos de donante: ". $e->getMessage();
    }
    $conPDO = null;
}


// SELECTS

function consultar_donantes()
{
    $conPDO = estabelecer_conexion();
    $conPDO->exec("USE donacion231210");

    $stmt = $conPDO->prepare("SELECT id, nombre, apellido, idade, gruposanguineo, codigopostal, telefono FROM donantes");
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Apelidos</th>";
        echo "<th>Idade</th>";
        echo "<th>Grupo Sanguíneo</th>";
        echo "<th>Código Postal</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Accións</th>";
        echo "</tr>";

        foreach ($resultados as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['idade'] . "</td>";
            echo "<td>" . $row['gruposanguineo'] . "</td>";
            echo "<td>" . $row['codigopostal'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td><a class='btn btn-primary' href='donar.php?id=" . $row['id'] . "'>Rexistrar donación</a></td>";
            echo "<td><a class='btn btn-primary' href='borrar_donante.php?id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "<td><a class='btn btn-primary' href='listar_donaciones.php?id=" . $row['id'] . "'>Lista de donacións</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Non hai donantes rexistrados.";
    }
    $conPDO = null;
}


?>


