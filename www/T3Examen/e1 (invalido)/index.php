<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=pruebas', 'root', 'test'));

Flight::route('GET /customers', function () {
    Flight::request()->query["customerNumber"];
    $stmt = Flight::db()->prepare("SELECT * FROM customers");
    $stmt->execute();
    $datos = $stmt->fetchAll();
    Flight::json($datos);
});


Flight::route('POST /customers', function () {

    $nombre =  Flight::request()->data->nombre;
    $apellidos =  Flight::request()->data->apellidos;
    $email =  Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $sql = "INSERT INTO customers (nombre, apellidos, email, edad, telefono)
    VALUES (:nombre, :apellidos, :email, :edad, :telefono)";

    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidos', $apellidos);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Cliente agregado correctamente pffff."]);
    } else {
        Flight::jsonp(["Error al agregar el cliente."]);
    }
});


Flight::route('DELETE /customers', function () {
    $id =  Flight::request()->data->id;
    $sql  = "DELETE FROM customers WHERE id=?";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    Flight::jsonp(["Cliente eliminado correctamente."]);
});


Flight::route('PUT /customers', function () {
    $id =  Flight::request()->data->id;
    $apellidos =  Flight::request()->data->apellidos;
    $email =  Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE customers SET apellidos=?, email=?, edad=?, telefono=? WHERE id=?";

    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(1, $apellidos);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $edad);
    $stmt->bindParam(4, $telefono);
    $stmt->bindParam(5, $id);

    $stmt->execute();

    Flight::jsonp(["Cliente actualizado correctamente."]);
});
