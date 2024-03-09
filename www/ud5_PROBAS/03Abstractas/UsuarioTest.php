<?php

require_once('Usuario.php');

$admin1 = new Usuario("a001", "roberto", "varela");

echo $admin1->getApellidos();
echo "<br>";
echo $admin1->accion();