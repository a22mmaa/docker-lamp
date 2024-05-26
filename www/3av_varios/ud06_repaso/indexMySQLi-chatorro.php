<?php

require 'flight/Flight.php';

Flight::register('db', 'mysqli', array('db', 'root', 'test', 'myDBPDO'));

Flight::route('GET /clientes', function () {
    Flight::request()->query["id"];

    $result = Flight::db()->query("SELECT * FROM clientes");

    $datos = $result->fetch_all(MYSQLI_ASSOC);

    Flight::json($datos);
});

Flight::route('GET /clients/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();
    $datos = $result->fetch_assoc();

    Flight::json($datos);
});

Flight::route('POST /clients', function() {
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $stmt = Flight::db()->prepare("INSERT INTO clientes (nombre, apellidos, email, edad, telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $nombre, $apellidos, $email, $edad, $telefono);

    $stmt->execute();

    // Ver si el resultado de la inserción es correcto
    if ($stmt->affected_rows > 0) {
        Flight::jsonp(["Cliente agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el cliente."]);
    }
});

Flight::route('DELETE /clientes', function() {
    $id = Flight::request()->data->id;

    $stmt = Flight::db()->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bind_param("i", $id);

    $stmt->execute();

    Flight::jsonp(["Cliente eliminado con id: $id"]);
});

Flight::route('PUT /cliente', function() {
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $stmt = Flight::db()->prepare("UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?");
    $stmt->bind_param("sisii", $apellidos, $edad, $email, $telefono, $id);

    $stmt->execute();

    Flight::jsonp(["Cliente con id: $id actualizado correctamente"]);
});

Flight::route('GET /hoteles', function () {
    $id = Flight::request()->query["id"];

    if ($id === null) {
        $result = Flight::db()->query("SELECT * from hoteles");
        $datos = $result->fetch_all(MYSQLI_ASSOC);
        Flight::json($datos);
    } else {
        $stmt = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $datosId = $result->fetch_all(MYSQLI_ASSOC);
        Flight::json($datosId);
    }
});

Flight::route('POST /hoteles', function() {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $stmt = Flight::db()->prepare("INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssis", $hotel, $direccion, $telefono, $email);
    $stmt->execute();

    // Ver si el resultado de la inserción es correcto
    if ($stmt->affected_rows > 0) {
        Flight::jsonp(["Hotel agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el hotel."]);
    }
});

