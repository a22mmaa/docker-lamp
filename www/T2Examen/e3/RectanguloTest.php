<?php

require_once('Rectangulo.php');

$rect1 = new Rectangulo(10, 20);

$rect1->dibujar();
$rect1->agrandar(10);
$rect1->dibujar();
$rect1->encoger(2);
$rect1->dibujar();
