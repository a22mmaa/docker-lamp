<?php

require('Contacto.php');

// Creo os obxectos

$contacto1 = new Contacto('Xosé Ramón', 'Barreiro', 981123456);
$contacto2 = new Contacto('Manuel', 'Ferreiro', 699987654);
$contacto3 = new Contacto('Ramón', 'Pardo', 982456789);

// Mostro os seus valores con get()

echo $contacto1->getNombre();
echo $contacto1->getApellido();
echo $contacto1->getNumeroTelefono();
echo "<br/>";
echo $contacto2->getNombre();
echo $contacto2->getApellido();
echo $contacto2->getNumeroTelefono();
echo "<br/>";
echo $contacto3->getNombre();
echo $contacto3->getApellido();
echo $contacto3->getNumeroTelefono();
echo "<br/>";

// Mostro os valores coa función específica

$contacto1->muestraInformacion();
echo "<br/>";
$contacto2->muestraInformacion();
echo "<br/>";
$contacto3->muestraInformacion();
echo "<br/>";
