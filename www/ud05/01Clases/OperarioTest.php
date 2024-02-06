<?php

require('Empleado.php');
require('Operario.php');

/*
Comezamos comprobando o número de empregados
*/

echo Empleado::$numEmpleados;

echo "<br/>";

/* Creamos un primeiro operario.
Todos os seus datos son introducidos con normalidade.
*/

$operario1 = new Operario('Hugo Castro', 1500, 'Diurno');

/* 
Modificamos o turno de operario1
*/

$operario1->setTurno('NOCTURNO');

/*
Volvemos actualizalo.
Agora con erros.
*/

$operario1->setTurno('diurnooo');

echo "<br/>";

/*
Creamos un segundo operario.
Por erro, escribimos mal o seu nome.
Tamén, por erro, introducimos un soldo de 5000€.
*/

$operario2 = new Operario('Mata Freitas', 5000, 'Diurno');

echo $operario2->getSalario();

echo "<br/>";

/*
Corriximos o nome de operario2
*/

$operario2->setNombre('Marta');
echo $operario2->getNombre();

echo "<br/>";

/*
Volvemos imprimir o número de empregados.
*/

echo Empleado::$numEmpleados;

echo "<br/>";