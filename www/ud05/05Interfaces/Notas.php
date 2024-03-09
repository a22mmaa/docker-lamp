<?php

/**
 * Clase notas que garda as notas dunha materia o grupo
 */
class Notas {

    private $notas;

    /**
     * Método constructor
     */
    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    /**
     * Devolve as notas
     * 
     * @return  Array notas
     */
    public function get_notas() {
        return $this->notas;
    }

    /**
     * Devolve as notas en formato que permita a sua impresión
     * 
     * @return  String de notas entre []
     */
    public function toString()
    {
        $listaDeNotas = "";
        foreach ($this->get_notas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }
}

