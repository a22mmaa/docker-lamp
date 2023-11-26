<?php
function crear_tabla_usuario($conexion) {
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
        )";
    return $sql;
}

?>