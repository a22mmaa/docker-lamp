<?php

require 'NotasDaw.php';

/*
Primeiro vamos crear un grupo de notas.
Chamámolas notasDWCC. 
É un número pequeno e rápido de calcular
que demostra o bo funcionamento do programa
*/
$notasDWCC = new NotasDaw([0, 1, 4, 10]);

echo $notasDWCC->numeroDeAprobados()."<br/>";
echo $notasDWCC->numeroDeSuspensos()."<br/>";
echo $notasDWCC->notaMedia()."<br/>";
echo $notasDWCC->toString()."<br/>";

echo "<br/><br/><hr/><br/>";

/*
Creamos un segundo grupo de notas, agora
chamado notasDWCS, con máis cantidade
de valores.
*/
$notasDWCS = new NotasDaw([10, 5.4, 0, 9, 8.5, 6, 1, 2.3, 4, 7.8]);

echo $notasDWCS->numeroDeAprobados()."<br/>";
echo $notasDWCS->numeroDeSuspensos()."<br/>";
echo $notasDWCS->notaMedia()."<br/>";
echo $notasDWCS->toString()."<br/>";