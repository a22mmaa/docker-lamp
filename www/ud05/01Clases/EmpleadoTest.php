<?php

require('Empleado.php');

/*
Comezamos imprimindo o número de empregados antes de instanciar a clase
*/

echo Empleado::$numEmpleados;

echo "<br/>";

/*
Creamos un empregado correctamente
e mostramos os seus datos
*/

$empleado1 = new Empleado('María Outeiro', 1800);

echo $empleado1->getNombre();
echo $empleado1->getSalario();

echo "<br/>";

/*
Creamos un segundo empregado.
Como tiña o apelido deturpado, decide galeguizalo, así que o modificamos o nome con set.
*/

$empleado2 = new Empleado('Juan Meijide', 1000);

echo $empleado2->getNombre();

$empleado2->setNombre('Xoán Meixide');

echo $empleado2->getNombre();

echo "<br/>";

/*
Creamos un terceiro empregado.
Por erro, escribimos 5000 en lugar de 2000.
*/

$empleado3 = new Empleado('Carla Pereira', 5000);

echo $empleado3->getSalario();

echo "<br/>";

/*
Volvemos imprimir o número de empregados,
para ver que aumentou.
*/

echo Empleado::$numEmpleados;

echo "<br/>";