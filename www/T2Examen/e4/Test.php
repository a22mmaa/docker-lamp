<?php

require_once ('Perro.php');
require_once ('Gato.php');

$perro1 = new Perro('Toby', 10);
$perro2 = new Perro('Mus', 5);

$gato1 = new Gato('Serafín', 3);
$gato2 = new Gato('Aristogato', 1);

echo "<p>Probas cos cans</p>";

echo "Nome perro1: " . $perro1->obtenernombre();
echo "<br/>";
$perro1->setNombre('Lúa');
echo "Novo nome perro1: " . $perro1->obtenernombre();
echo "<br/>";

$perro1->emitirSonido();
echo "<br/>";
echo "Idade perro2: " . $perro2->getEdad();
echo "<br/>";
$perro2->setEdad(200);
echo "Nova idade perro2: " . $perro2->getEdad();


echo "<p>Probas cos gatos</p>";


echo "Nome gato1: " . $gato1->obtenernombre();
echo "<br/>";
$gato1->setNombre('Misifú');
echo "Novo nome gato1: " . $gato1->obtenernombre();
echo "<br/>";

$gato1->emitirSonido();
echo "<br/>";
echo "Idade gato2: " . $gato2->getEdad();
echo "<br/>";
$gato2->setEdad(100);
echo "Nova idade gato2: " . $gato2->getEdad();