<?php

$base   = 30;
$altura = 5;

require 'Anonima.php';

/*
Primeiro vou inicializar as variábeis e
despois crear a caixa
 */

$caixa1 = new $obx1($base, $altura);

echo "Área da caixa 1: " . $caixa1->area();
echo "<br/>";
echo "Perímetro da caixa 1: " . $caixa1->perimetro();

echo "<br/><br/><hr/><br/>";

/*
Agora vou inserir os valores dos
argumentos directamente no constructor
 */

$caixa2 = new $obx1(100, 2);

echo "Área da caixa 2: " . $caixa2->area();
echo "<br/>";
echo "Perímetro da caixa 2: " . $caixa2->perimetro();
