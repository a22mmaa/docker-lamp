<?php

require 'Usuario.php';

// Creamos un usuario correctamente e mostramos os seus datos

$usuario1 = new Usuario('Lucas', 'Novoa', 'lucas250695', 28, 'ourense');

echo $usuario1->getId() . '<br/>';
echo $usuario1->getNombre() . '<br/>';
echo $usuario1->getApellidos() . '<br/>';
echo $usuario1->getPassword() . '<br/>';
echo $usuario1->getEdad() . '<br/>';
echo $usuario1->getProvincia() . '<br/>';

echo '<br/>';

// Creo un segundo usuario, ao que lle introduzo máis tarde os datos.

$usuario2 = new Usuario('Xiana', 'Fernández', 'xiana123', 18, 'A Coruña');

echo $usuario2->getId() . '<br/>';
echo $usuario2->getNombre() . '<br/>';
echo $usuario2->getApellidos() . '<br/>';
echo $usuario2->getPassword() . '<br/>';
echo $usuario2->getEdad() . '<br/>';
echo $usuario2->getProvincia() . '<br/>';

echo '<br/>';

// Agora cambiamos todos os datos, introducindo erros para que se impriman na pantalla.

$usuario2->setNombre('');
echo '<br/>';
$usuario2->setApellidos('');
echo '<br/>';
$usuario2->setPassword('');
echo '<br/>';
$usuario2->setEdad('-5');
echo '<br/>';
$usuario2->setEdad('200');
echo '<br/>';
$usuario2->setProvincia('Orense');
echo '<br/>';

echo '<br/>';
// Volvemos imprimir os datos de usuario2, para ver se continúan intactos

echo $usuario2->getId() . '<br/>';
echo $usuario2->getNombre() . '<br/>';
echo $usuario2->getApellidos() . '<br/>';
echo $usuario2->getPassword() . '<br/>';
echo $usuario2->getEdad() . '<br/>';
echo $usuario2->getProvincia() . '<br/>';

echo '<br/>';
