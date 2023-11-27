<?php
include("lib/base_datos.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function novo_donante($nombre, $apellido, $edad, $grupo_sanguineo, $cp, $telefono) {

    try {
        $conPDO = conexion_bbdd();
        $conPDO->exec("USE donacion");
        $stmt = $conPDO->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil) VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :cp, :telefono)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellido);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':telefono', $telefono);

        $stmt->execute();

        echo "Donante rexistrado";
    } catch (PDOException $e) {
        echo "Error al registrar el donante: " . $e->getMessage();
    }

}


function consultar_donantes()
{
    $conPDO = conexion_bbdd();
    $conPDO->exec("USE donacion");

    $stmt = $conPDO->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil FROM donantes");
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Edad</th>";
        echo "<th>Grupo Sanguíneo</th>";
        echo "<th>Código Postal</th>";
        echo "<th>Teléfono Móvil</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";

        foreach ($resultados as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['grupo_sanguineo'] . "</td>";
            echo "<td>" . $row['codigo_postal'] . "</td>";
            echo "<td>" . $row['telefono_movil'] . "</td>";
            echo "<td><a class='btn btn-primary' href='donar.php?id=" . $row['id'] . "'>Registrar donación</a></td>";
            echo "<td><a class='btn btn-primary' href='borrar_donante.php?id=" . $row['id'] . "'>Eliminar</a></td>";
            echo "<td><a class='btn btn-primary' href='listar_donaciones.php?id=" . $row['id'] . "'>Lista de donaciones</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No hay donantes registrados.";
    }
}

function consultar_donante_porid($id_donante)
{
    $conPDO = conexion_bbdd();
    $conPDO->exec("USE donacion");

    $stmt = $conPDO->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo FROM donantes WHERE id = :id_donante");
    $stmt->bindParam(':id_donante', $id_donante);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "<h2>Datos donante:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellidos</th>";
        echo "<th>Edad</th>";
        echo "<th>Grupo Sanguíneo</th>";
        echo "</tr>";

        foreach ($resultados as $row) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['grupo_sanguineo'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Non se encontraron donantes con este identificador.";
    }

}

function consultar_donaciones($id_donante)
{
    $conPDO = conexion_bbdd();
    $conPDO->exec("USE donacion");

    $stmt = $conPDO->prepare("SELECT donante, fecha_donacion, fecha_proxima_donacion FROM historico WHERE donante = :id_donante ORDER BY fecha_donacion");
    $stmt->bindParam(':id_donante', $id_donante, PDO::PARAM_INT);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultados) > 0) {
        echo "<h2>Listado de donacións</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>donante</th>";
        echo "<th>fecha_donacion</th>";
        echo "<th>fecha_proxima_donacion</th>";
        echo "</tr>";

        foreach ($resultados as $row) {
            echo "<tr>";
            echo "<td>" . $row['donante'] . "</td>";
            echo "<td>" . $row['fecha_donacion'] . "</td>";
            echo "<td>" . $row['fecha_proxima_donacion'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Este usuario non fixo donacións.</p>";
    }
}

?>