<?php

require('Notas.php');
require('CalculosCentroEstudios.php');

/**
 * Clase NotasDaw, que extende Notas e implementa a interface CalculosCentroEstudios
 */
class NotasDaw extends Notas implements CalculosCentroEstudios {
    
    /**
     * Calcula o número de aprobados
     * 
     * @return  Número de aprobados
     */
    public function numeroDeAprobados() {
        $notas = parent::get_notas();
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
        $notas = parent::get_notas();
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
        $notas = parent::get_notas();
        $sumaTotal = 0;
        $cantidadeNotas = 0;
        foreach ($notas as $nota) {
            $sumaTotal += $nota;
            $cantidadeNotas++;
        }
        return $sumaTotal/$cantidadeNotas;
    }
}