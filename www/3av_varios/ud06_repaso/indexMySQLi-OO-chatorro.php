<?php

require 'flight/Flight.php';

class Database {
    private $connection;

    public function __construct() {
        $this->connection = new mysqli('db', 'root', 'test', 'myDBPDO');

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

Flight::register('db', 'Database');

Flight::route('GET /clientes', function () {
    $db = Flight::db()->getConnection();
    $result = $db->query("SELECT * FROM clientes");

    if ($result) {
        $datos = $result->fetch_all(MYSQLI_ASSOC);
        Flight::json($datos);
    } else {
        Flight::json(["error" => $db->error], 500);
    }
});

Flight::route('GET /clients/@id', function ($id) {
    $db = Flight::db()->getConnection();
    $stmt = $db->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $datos = $result->fetch_assoc();
        Flight::json($datos);
    } else {
        Flight::json(["error" => $stmt->error], 500);
    }
});

Flight::route('POST /clients', function() {
    $db = Flight::db()->getConnection();
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $stmt = $db->prepare("INSERT INTO clientes (nombre, apellidos, email, edad, telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $nombre, $apellidos, $email, $edad, $telefono);

    if ($stmt->execute()) {
        Flight::jsonp(["Cliente agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el cliente."], 500);
    }
});

Flight::route('DELETE /clientes', function() {
    $db = Flight::db()->getConnection();
    $id = Flight::request()->data->id;

    $stmt = $db->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        Flight::jsonp(["Cliente eliminado con id: $id"]);
    } else {
        Flight::jsonp(["Error al eliminar el cliente."], 500);
    }
});

Flight::route('PUT /cliente', function() {
    $db = Flight::db()->getConnection();
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $stmt = $db->prepare("UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?");
    $stmt->bind_param("sisii", $apellidos, $edad, $email, $telefono, $id);

    if ($stmt->execute()) {
        Flight::jsonp(["Cliente con id: $id actualizado correctamente"]);
    } else {
        Flight::jsonp(["Error al actualizar el cliente."], 500);
    }
});

Flight::route('GET /hoteles', function () {
    $db = Flight::db()->getConnection();
    $id = Flight::request()->query["id"];

    if ($id === null) {
        $result = $db->query("SELECT * from hoteles");

        if ($result) {
            $datos = $result->fetch_all(MYSQLI_ASSOC);
            Flight::json($datos);
        } else {
            Flight::json(["error" => $db->error], 500);
        }
    } else {
        $stmt = $db->prepare("SELECT * FROM hoteles WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $datosId = $result->fetch_all(MYSQLI_ASSOC);
            Flight::json($datosId);
        } else {
            Flight::json(["error" => $stmt->error], 500);
        }
    }
});

Flight::route('POST /hoteles', function() {
    $db = Flight::db()->getConnection();
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $stmt = $db->prepare("INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssis", $hotel, $direccion, $telefono, $email);

    if ($stmt->execute()) {
        Flight::jsonp(["Hotel agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el hotel."], 500);
    }
});

Flight::start();
