<?php

require_once('Administrador.php');

$admin1 = new Administrador("a001", "roberto", "vazquez");

echo $admin1->getApellidos();
echo "<br>";
echo $admin1->accion();