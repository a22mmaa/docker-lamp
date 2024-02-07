<?php

require 'Administrador.php';
require 'Usuario.php';

// Creamos un usuario, imprimimos os datos con accion(), editamos os datos cos setters, e volvemos usar accion()

$usuario1 = new Usuario('U01', 'Xoán', 'Mosquera');

$usuario1->accion();

$usuario1->setNombre('Luís');
$usuario1->setApellidos('Gomes');

$usuario1->accion();

echo "<br/>";
// Facemos o mesmo, agora cun administrador

$admin1 = new Administrador('A01', 'Ana', 'Míguez');

$admin1->accion();

$admin1->setNombre('Sara');
$admin1->setApellidos('Graña');

$admin1->accion();
