<?php

require_once('Rectangulo.php');

$rect1 = new Rectangulo(10, 20);

echo $rect1->getAncho();

$rect1->dibujar();
$rect1->agrandar(10);
$rect1->encoger(2);
$rect1->dibujar();
