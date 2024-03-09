<?php

/**
 * Trait para mostrar os cálculos realizados
 */
trait MostrarCalculos
{

    /**
     * Imprime por pantalla un saúdo
     */
    public function saludo()
    {
        echo "<p>Bienvenido al centro de cálculo</p>";
    }

    /**
     * Imprime por pantalla os resultados dos cálculos
     * de CalculosCentroEstudios.
     */
    public function showCalculusStudyCenter($numeroAprobados, $numeroDeSuspensos, $notaMedia)
    {
        echo $numeroAprobados . " personas han superado las pruebas.<br/>";
        echo $numeroDeSuspensos . " no han conseguido superar las pruebas.<br/>";
        echo "La nota promedio es de " . $notaMedia . " puntos sobre 10.<br/>";
    }
    /*
Esta función podería recoller de forma automática os valores que usa
sen necesidade de que estes fosen pasados por parámetros.
Non obstante, facémolo así (tal e como está aquí) porque o enunciado
di que "recibe" os valores.
 */
}
