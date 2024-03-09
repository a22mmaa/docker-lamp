<?php

require_once 'CalculosCentroEstudios.php';
require_once 'MostrarCalculos.php';

class NotasTrait
{
    use CalculosCentroEstudiosTrait;
    use MostrarCalculos;

    private $notas;

    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    public function calcularYMostrar()
    {
        $aprobados = $this->numeroDeAprobados($this->notas);
        $suspendidos = $this->numeroDeSuspensos($this->notas);
        $notaMedia = $this->notaMedia($this->notas);

        $this->saludo();
        $this->showCalculusStudyCenter($aprobados, $suspendidos, $notaMedia);
    }
}
