<?php

require('Participante.php');

class Jugador extends Participante {
    // Propiedade do xogador
    private $posicion;

    // Construtor extendido
    public function __construct($nombre, $edad, $posicion) {
        parent::__construct($nombre, $edad);
        $this->posicion = $posicion;
    }

    // Getters e setters propios
    public function getPosicion()
    {
        return $this->posicion;
    }


    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }
}