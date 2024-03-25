<?php

require_once('CalculosCentroEstudios.php');

trait MostrarCalculos {
    public function saludo() {
        echo "Bienvenido al centro de cálculo";
    }
    public function showCalculusStudyCenter($aprobados, $suspendidos, $notaMedia)
    {
        echo "Número de aprobados: $aprobados\n";
        echo "Número de suspensos: $suspendidos\n";
        echo "Nota media: $notaMedia\n";
    }
}