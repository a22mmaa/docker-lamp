<?php

require('Participante-Jugador.php');

// Creo un xogador con todos os datos e imprimo
$jugador1 = new jugador('Hugo Oliveira López', 26, 'Centrocampista');

echo $jugador1->getNombre() . '<br/>';
echo $jugador1->getEdad() . '<br/>';
echo $jugador1->getPosicion() . '<br/>';

// Modifico todos os datos dese xogador

$jugador1->setNombre('Marta Ribeiro Suárez');
$jugador1->setEdad(29);
$jugador1->setPosicion('Delantera');

// Volvemos imprimir

echo $jugador1->getNombre() . '<br/>';
echo $jugador1->getEdad() . '<br/>';
echo $jugador1->getPosicion() . '<br/>';

// Repito os pasos anteriores con outro xogador

$jugador2 = new jugador('Iago Santos Vázquez', 24, 'Defensa');

echo $jugador2->getNombre() . '<br/>';
echo $jugador2->getEdad() . '<br/>';
echo $jugador2->getPosicion() . '<br/>';

// Modifico todos os datos dese xogador

$jugador2->setNombre('Luca Ferreira Martínez');
$jugador2->setEdad(28);
$jugador2->setPosicion('Portero');

// Volvemos imprimir

echo $jugador2->getNombre() . '<br/>';
echo $jugador2->getEdad() . '<br/>';
echo $jugador2->getPosicion() . '<br/>';