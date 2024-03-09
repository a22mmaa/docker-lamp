<?php

require('Participante-Arbitro.php');

// Creo un árbitro con todos os datos e imprimo
$arbitro1 = new Arbitro('María Vidal Rodríguez', 28, 10);

echo $arbitro1->getNombre() . '<br/>';
echo $arbitro1->getEdad() . '<br/>';
echo $arbitro1->getAnos() . '<br/>';

// Modifico todos os datos dese árbitro

$arbitro1->setNombre('Xoán Freire Pérez');
$arbitro1->setEdad(25);
$arbitro1->setAnos(8);

// Volvemos imprimir

echo $arbitro1->getNombre() . '<br/>';
echo $arbitro1->getEdad() . '<br/>';
echo $arbitro1->getAnos() . '<br/>';

// Repito os pasos anteriores con outro árbitro

$arbitro2 = new Arbitro('Carla Ferreira González', 30, 12);

echo $arbitro2->getNombre() . '<br/>';
echo $arbitro2->getEdad() . '<br/>';
echo $arbitro2->getAnos() . '<br/>';

// Modifico todos os datos dese árbitro

$arbitro2->setNombre('Antónia Silva Fernández');
$arbitro2->setEdad(27);
$arbitro2->setAnos(9);

// Volvemos imprimir

echo $arbitro2->getNombre() . '<br/>';
echo $arbitro2->getEdad() . '<br/>';
echo $arbitro2->getAnos() . '<br/>';