<?php

/**
 * Trait cos cálculos correspondentes.
 * Son semellantes aos do anterior exercicio, excepto
 * no modo en que recollemos a variábel $notas.
 */
trait CalculosCentroEstudios {
    /**
     * Calcula o número de aprobados
     * 
     * @return  Número de aprobados
     */
    public function numeroDeAprobados() {
        $notas = $this->notas;
        $numeroAprobados = 0;

        foreach ($notas as $nota) {
            if ($nota >= 5) {         
                $numeroAprobados++;
            }
        }
        return $numeroAprobados;
    }

    /**
     * Calcula o número de suspensos
     * 
     * @return  Número de suspensos
     */
    public function numeroDeSuspensos() {
        $notas = $this->notas;
        $numeroDeSuspensos = 0;

        foreach ($notas as $nota) {
            if ($nota < 5) {         
                $numeroDeSuspensos++;
            }
        }
        return $numeroDeSuspensos;
    }

    /**
     * Calcula a nota media das notas
     * 
     * @return  Número da nota media
     */
    public function notaMedia() {
        $notas = $this->notas;
        $sumaTotal = 0;
        $cantidadeNotas = 0;
        foreach ($notas as $nota) {
            $sumaTotal += $nota;
            $cantidadeNotas++;
        }
        return $sumaTotal/$cantidadeNotas;
    }
}