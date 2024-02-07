<?php

require_once('Alien.php');

echo 'Nº aliens antes de crear ningún: '.Alien::getNumberOfAliens().'<br/>';

$alien1 = new Alien('E.T.');
$alien2 = new Alien('Yoda');
$alien3 = new Alien('Alf');
$alien4 = new Alien('Kodos');


echo 'Nº aliens despois de crear 4: '.Alien::getNumberOfAliens();