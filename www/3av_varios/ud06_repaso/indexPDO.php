<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=myDBPDO','root','test'));

Flight::route('GET /clientes', function () {
    Flight::request()->query["id"];

    $stmt = Flight::db()->prepare("SELECT * FROM clientes");

    $stmt->execute();

    $datos = $stmt->fetchAll();

    Flight::json($datos);
});

Flight::route('GET /clients/@id', function ($id) {
    $stmt = Flight::db()->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);

    $stmt->execute();

    $datos = $stmt->fetch();

    Flight::json($datos);
});

Flight::route('POST /clients', function() {
    $nombre = Flight::request()->data->nombre;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    /* OPCIÓN 1 */
    $sql = "INSERT INTO clientes (nombre, apellidos, email, edad, telefono) VALUES (:nombre, :apellidos, :email, :edad, :telefono)";
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

    /* OPCIÓN 2
    $sql ="INSERT INTO clientes(nombre, apellidos, edad, email, telefono) VALUES (?, ?, ?, ?, ?)";

	$sentencia = Flight::db()->prepare($sql);
	$sentencia->bindParam(1, $nombre);
	$sentencia->bindParam(2, $apellidos);
	$sentencia->bindParam(3, $edad);
	$sentencia->bindParam(4, $email);
	$sentencia->bindParam(5, $telefono);

	$sentencia->execute(); */

	Flight::jsonp(["Cliente agregado correctamente."]);

    /* PROBA
    {
    "nombre": "IvánPRUEBA",
    "apellidos": "García",
    "edad": 35,
    "email": "ivan@garcia.es",
    "telefono": 600000000
    }
    */
    
});

Flight::route('DELETE /clientes', function() {
    $id = Flight::request()->data->id;

    $sql = "DELETE FROM clientes WHERE id=?";
    $stmt = Flight::db()->prepare($sql);

    $sentencia->bindParam(1, $id);

    $stmt->execute();
    Flight::jsonp(["Cliente eliminado con id: $id"]);

    /* PROBA
   {
   "id": 3
   }
   */
});

Flight::route('PUT /cliente', function() {
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $email = Flight::request()->data->email;
    $edad = Flight::request()->data->edad;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?";
    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(5, $id);
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);

    $stmt->execute();

    Flight::jsonp(["Cliente con id: $id actualizado correctamente"]);

    /* PROBA
    {
        "id": 1,
        "apellidos": "apelidoPruebaPUT",
        "edad": 200,
        "email": "ivan@garcia.PruebaPUT",
        "telefono": 666666666
    }
    */
});

Flight::route('GET /hoteles', function () {

    $id = Flight::request()->query["id"];

    if ($id === null) {
        $sentenciaTodos = Flight::db()->prepare("SELECT * from hoteles");
        $sentenciaTodos->execute();
        $datos=$sentenciaTodos->fetchAll();
        Flight::json($datos);
    } else {
        $sentenciaId = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=:id");
        $sentenciaId->bindParam(':id', $id);
        $sentenciaId->execute();
        $datosId = $sentenciaId->fetchAll();
        Flight::json($datosId); 
    }
});

Flight::route('POST /hoteles', function() {
    $hotel = Flight::request()->data->hotel;
    $direccion = Flight::request()->data->direccion;
    $telefono = Flight::request()->data->telefono;
    $email = Flight::request()->data->email;

    $sql = "INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES(:hotel, :direccion, :telefono, :email)";
    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(':hotel', $hotel);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $direccion);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    // Ver si el resultado de la inserción es correcto
    if ($stmt->rowCount() > 0) {
        Flight::jsonp(["Hotel agregado correctamente."]);
    } else {
        Flight::jsonp(["Error al agregar el hotel."]);
    }

    /*
    {
    "hotel": "hotel PRUEBA",
    "direccion": "rua PRUEBA",
    "telefono": 600000000,
    "email": "hotele@PRUEBAS.es"
    }
    */

    

});