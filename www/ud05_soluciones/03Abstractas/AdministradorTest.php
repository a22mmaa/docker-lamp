<?php

require_once 'Administrador.php';
use ud05\Administrador;

// Crear un administrador
$administrador = new Administrador('2', 'María', 'González');
$administrador->accion();
echo "\n";
