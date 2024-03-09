<?php

trait CalculosCentroEstudiosTrait {
    public function numeroDeAprobados($notas)
    {
        $aprobados = 0;
        foreach ($notas as $nota) {
            if ($nota >= 5) $aprobados++;
        }
        return $aprobados;
    }

    public function numeroDeSuspensos($notas)
    {
        $suspensos = 0;
        foreach ($notas as $nota) {
            if ($nota < 5) $suspensos++;
        }
        return $suspensos;
    }

    public function notaMedia($notas)
    {

        $totalNotas = 0;
        $sumaNotas = 0;
        foreach ($notas as $nota) {
            if ($nota >= 0 && $nota <= 10) {
                $totalNotas++;
                $sumaNotas += $nota;
            }
            return $sumaNotas / $totalNotas;
        }
    }
}
