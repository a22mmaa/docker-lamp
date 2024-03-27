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


/* ENVIANDO O ID, FALLA */
Flight::route('GET /clientes', function () {
    
	$id = Flight::request()->data->id;

    if ($id === null) {
        $sentenciaTodos = Flight::db()->prepare("SELECT * from clientes");
        $sentenciaTodos->execute();
        $datos=$sentenciaTodos->fetchAll();
        Flight::json($datos);
    } else {
        $sentenciaId = Flight::db()->prepare("SELECT * FROM clientes WHERE id=:id");
        $sentenciaId->bindParam(':id', $id);
        $sentenciaId->execute();
        $datosId = $sentenciaId->fetchAll();
        Flight::json($datosId); 
    }

    /* PROBA
    {
    "id": 2
    }
    */
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

Flight::route('DELETE /clientes', function () {
	 $id = Flight::request()->data->id;
	 $sql ="DELETE FROM clientes WHERE id=?";
	 $sentencia = Flight::db()->prepare($sql);
	 $sentencia->bindParam(1, $id);
	 $sentencia->execute();
	 Flight::jsonp(["Cliente eliminado con id: $id"]);

     /* PROBA
    {
    "id": 3
    }
    */
});


Flight::route('PUT /clientes', function () {
    $id = Flight::request()->data->id;
    $apellidos = Flight::request()->data->apellidos;
    $edad = Flight::request()->data->edad;
    $email = Flight::request()->data->email;
    $telefono = Flight::request()->data->telefono;

    $sql = "UPDATE clientes SET apellidos=?, edad=?, email=?, telefono=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(5, $id);
    $sentencia->bindParam(1, $apellidos);
    $sentencia->bindParam(2, $edad);
    $sentencia->bindParam(3, $email);
    $sentencia->bindParam(4, $telefono);

	 $sentencia->execute();
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



Flight::route('PUT /hoteles', function () {
    $id = Flight::request()->data->id;
	$direccion = Flight::request()->data->direccion;
	$email = Flight::request()->data->email;
	$telefono = Flight::request()->data->telefono;

    $sql = "UPDATE hoteles SET direccion=?, email=?, telefono=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(4, $id);
    $sentencia->bindParam(1, $direccion);
    $sentencia->bindParam(2, $email);
    $sentencia->bindParam(3, $telefono);

	 $sentencia->execute();
     Flight::jsonp(["Hotel con id: $id actualizado correctamente"]);

    /* PROBA
    {
        "id": 1,
        "direccion": "rua de PROBAS PUT",
        "email": "hotel@garcia.PruebaPUT",
        "telefono": 666666666
    }
    */
});




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
    "id_cliente": 5,
    "id_hotel": 5,
    "fecha_reserva": "2050-11-29",
    "fecha_entrada": "2060-11-29",
    "fecha_salida": "2070-11-29"
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

     /*
    {
    "id": 50
    }
    */
});



Flight::route('PUT /reservas', function () {
    $id = Flight::request()->data->id;
	$fecha_entrada = Flight::request()->data->fecha_entrada;
	$fecha_salida = Flight::request()->data->fecha_salida;

    $sql = "UPDATE reservas SET fecha_entrada=?, fecha_salida=? WHERE id=?";
    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(3, $id);
    $sentencia->bindParam(1, $fecha_entrada);
    $sentencia->bindParam(2, $fecha_salida);

	 $sentencia->execute();
     Flight::jsonp(["Reserva con id: $id actualizada correctamente"]);

    /* PROBA
    {
        "id": 52,
        "fecha_entrada": "2160-12-29",
        "fecha_salida": "2170-12-30"
    }
    */
});




Flight::start();
