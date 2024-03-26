<?php

// require 'flight/Flight.php';
require 'flight/autoload.php';

Flight::register('db', 'PDO', array('mysql:host=db;dbname=myDBPDO','root','test'));

Flight::route('/', function () {
    echo 'hello world!';
});

Flight::route('/saludar', function () {
    echo 'Hola, bienvenido al módulo de DWCS!';
});


Flight::route('GET /clientes', function () {
	$sentenciaTodos = Flight::db()->prepare("SELECT * from clientes");
	$sentenciaTodos->execute();
	$datos=$sentenciaTodos->fetchAll();
	Flight::json($datos);
});

/* ENVIANDO O ID, FALLA */
Flight::route('GET /clientes', function () {
	$id = Flight::request()->data->id;
	$sentenciaId = Flight::db()->prepare("SELECT * FROM clientes WHERE id=:id");
	$sentenciaId->bindParam(':id', $id);
	$sentenciaId->execute();
	$datosId = $sentenciaId->fetchAll();
	Flight::json($datosId); 
});

Flight::route('POST /clientes', function () {
	$nombre = Flight::request()->data->nombre;
	$apellidos = Flight::request()->data->apellidos;
	$edad = Flight::request()->data->edad;
	$email = Flight::request()->data->email;
	$telefono = Flight::request()->data->telefono;
	$sql ="INSERT INTO clientes(nombre, apellidos, edad, email, telefono) VALUES (?, ?, ?, ?, ?)";
	$sentencia = Flight::db()->prepare($sql);
	$sentencia->bindParam(1, $nombre);
	$sentencia->bindParam(2, $apellidos);
	$sentencia->bindParam(3, $edad);
	$sentencia->bindParam(4, $email);
	$sentencia->bindParam(5, $telefono);
	$sentencia->execute();
	Flight::jsonp(["Cliente agregado correctamente."]);

    /*
    {
    "nombre": "IvánPRUEBA",
    "apellidos": "García",
    "edad": 35,
    "email": "ivan@garcia.es",
    "telefono": 600000000
    }
    */
 
});

Flight::route('DELETE /clientes', function () {
	 $id = Flight::request()->data->id;
	 $sql ="DELETE FROM clientes WHERE id=?";
	 $sentencia = Flight::db()->prepare($sql);
	 $sentencia->bindParam(1, $id);
	 $sentencia->execute();
	 Flight::jsonp(["Cliente eliminado con id: $id"]);
});


Flight::start();
