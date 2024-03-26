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


/* FALTA PUUUUUTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT */



Flight::route('GET /hoteles', function () {
	$sentenciaTodos = Flight::db()->prepare("SELECT * from hoteles");
	$sentenciaTodos->execute();
	$datos=$sentenciaTodos->fetchAll();
	Flight::json($datos);
});

/* ENVIANDO O ID, FALLA */
Flight::route('GET /hoteles', function () {
	$id = Flight::request()->data->id;
	$sentenciaId = Flight::db()->prepare("SELECT * FROM hoteles WHERE id=:id");
	$sentenciaId->bindParam(':id', $id);
	$sentenciaId->execute();
	$datosId = $sentenciaId->fetchAll();
	Flight::json($datosId); 
});

Flight::route('POST /hoteles', function () {
	$hotel = Flight::request()->data->hotel;
	$direccion = Flight::request()->data->direccion;
	$telefono = Flight::request()->data->telefono;
	$email = Flight::request()->data->email;
	$sql ="INSERT INTO hoteles(hotel, direccion, telefono, email) VALUES (?, ?, ?, ?)";
	$sentencia = Flight::db()->prepare($sql);
	$sentencia->bindParam(1, $hotel);
	$sentencia->bindParam(2, $direccion);
	$sentencia->bindParam(3, $telefono);
	$sentencia->bindParam(4, $email);
	$sentencia->execute();
	Flight::jsonp(["Hotel agregado correctamente."]);

    /*
    {
    "hotel": "hotel PRUEBA",
    "direccion": "rua PRUEBA",
    "telefono": 600000000,
    "email": "hotele@PRUEBAS.es"
    }
    */
 
});

Flight::route('DELETE /hoteles', function () {
	 $id = Flight::request()->data->id;
	 $sql ="DELETE FROM hoteles WHERE id=?";
	 $sentencia = Flight::db()->prepare($sql);
	 $sentencia->bindParam(1, $id);
	 $sentencia->execute();
	 Flight::jsonp(["Hotel eliminado con id: $id"]);
});



/* FALTA PUUUUUTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT */






/* RESERVAS */

Flight::route('GET /reservas', function () {
	$sentenciaTodos = Flight::db()->prepare("SELECT * from reservas");
	$sentenciaTodos->execute();
	$datos=$sentenciaTodos->fetchAll();
	Flight::json($datos);
});

/* ENVIANDO O ID, FALLA */
Flight::route('GET /reservas', function () {
	$id = Flight::request()->data->id;
	$sentenciaId = Flight::db()->prepare("SELECT * FROM reservas WHERE id=:id");
	$sentenciaId->bindParam(':id', $id);
	$sentenciaId->execute();
	$datosId = $sentenciaId->fetchAll();
	Flight::json($datosId); 
});

Flight::route('POST /reservas', function () {
	$id_cliente = Flight::request()->data->id_cliente;
	$id_hotel = Flight::request()->data->id_hotel;
	$fecha_reserva = Flight::request()->data->fecha_reserva;
	$fecha_entrada = Flight::request()->data->fecha_entrada;
	$fecha_salida = Flight::request()->data->fecha_salida;
	$sql ="INSERT INTO reservas(id_cliente, id_hotel, fecha_reserva, fecha_entrada, fecha_salida) VALUES (?, ?, ?, ?, ?)";
	$sentencia = Flight::db()->prepare($sql);
	$sentencia->bindParam(1, $id_cliente);
	$sentencia->bindParam(2, $id_hotel);
	$sentencia->bindParam(3, $fecha_reserva);
	$sentencia->bindParam(4, $fecha_entrada);
	$sentencia->bindParam(5, $fecha_salida);
	$sentencia->execute();
	Flight::jsonp(["Hotel agregado correctamente."]);

    /*
    {
    "id_cliente": "hotel PRUEBA",
    "id_hotel": "rua PRUEBA",
    "fecha_reserva": 600000000,
    "fecha_entrada": 600000000,
    "fecha_salida": "hotele@PRUEBAS.es"
    }
    */
 
});

Flight::route('DELETE /reservas', function () {
	 $id = Flight::request()->data->id;
	 $sql ="DELETE FROM reservas WHERE id=?";
	 $sentencia = Flight::db()->prepare($sql);
	 $sentencia->bindParam(1, $id);
	 $sentencia->execute();
	 Flight::jsonp(["Hotel eliminado con id: $id"]);
});



/* FALTA PUUUUUTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT */




Flight::start();
