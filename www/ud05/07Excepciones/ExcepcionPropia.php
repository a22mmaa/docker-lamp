<?php

/**
 * Clase ExcepcionPropia que extende Exception
 */
class ExcepcionPropia extends Exception
{};

/**
 * Clase ExcepcionPropiaClase
 */
class ExcepcionPropiaClase
{

    /**
     * Método que comproba se un número é igual a 0.
     * Se é así, lanza unha excepción.
     * Caso contrario, imprime o número.
     */
    public static function testNumber($numero)
    {
        if ($numero === 0) {
            throw new ExcepcionPropia('Número igual a 0.');
        } else {
            echo $numero . "<br/>";
        }
    }
}
