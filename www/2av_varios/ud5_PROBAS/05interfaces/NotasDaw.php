<?php

require_once 'CalculosCentroEstudios.php';
require_once 'Notas.php';

class NotasDaw extends Notas implements CalculosCentroEstudios
{



    public function numeroDeAprobados()
    {
        $aprobados = 0;
        foreach ($this->get_notas() as $nota) {
            if ($nota >= 5) $aprobados++;
        }
        return $aprobados;
    }

    public function numeroDeSuspensos()
    {
        $suspensos = 0;
        foreach ($this->get_notas() as $nota) {
            if ($nota < 5) $suspensos++;
        }
        return $suspensos;
    }

    public function notaMedia()
    {

        $totalNotas = 0;
        $sumaNotas = 0;
        foreach ($this->get_notas() as $nota) {
            if ($nota >= 0 && $nota <= 10) {
                $totalNotas++;
                $sumaNotas += $nota;
            }
            return $sumaNotas / $totalNotas;
        }
    }
    public function toString()
    {
        $listaDeNotas = "";
        foreach ($this->get_notas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }
}
