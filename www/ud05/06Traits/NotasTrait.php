<?php

require('CalculosCentroEstudios.php');
require('MostrarCalculos.php');

/**
 * Clase NotasTrait
 */
class NotasTrait {

    private $notas;

    /**
     * Método constructor
     */
    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    use CalculosCentroEstudios;
    use MostrarCalculos;
}


/*
Vamos usar os mesmos exemplos que no exercicio 5 de interfaces.
Aínda que agora irán precedidos do saúdo
*/

$notasDWCC = new NotasTrait([0, 1, 4, 10]);

$notasDWCC->saludo();
echo $notasDWCC->showCalculusStudyCenter($notasDWCC->numeroDeAprobados(), $notasDWCC->numeroDeSuspensos(), $notasDWCC->notaMedia());

echo "<br/><br/><hr/><br/>";


/*
Para modificar lixeiramente o modo de proceder,
agora vamos gardar os resultados dos cálculos en variábeis
e pasalos como argumentos en showCalculusStudyCenter
*/

$notasDWCS = new NotasTrait([10, 5.4, 0, 9, 8.5, 6, 1, 2.3, 4, 7.8]);

$DWCSaprobados = $notasDWCS->numeroDeAprobados();
$DWCSsuspensos = $notasDWCS->numeroDeSuspensos();
$DWCSmedia = $notasDWCS->notaMedia();

$notasDWCS->saludo();
echo $notasDWCS->showCalculusStudyCenter($DWCSaprobados, $DWCSsuspensos, $DWCSmedia);