<?php

require_once 'NotasTrait.php';

use ud05\NotasTrait;

// Crear objeto de la clase NotasTrait
$notas_trait = new NotasTrait([7, 8, 5, 4, 6]);

// Calcular y mostrar resultados
$notas_trait->calcularYMostrar();
