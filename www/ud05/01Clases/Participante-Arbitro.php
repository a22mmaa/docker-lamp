<?php

require('Participante.php');

class Arbitro extends Participante {
    // Propiedade do árbitro
    private $anos;

    // Construtor extendido
    public function __construct($nombre, $edad, $anos) {
        parent::__construct($nombre, $edad);
        $this->anos = $anos;
    }

    // Getters e setters propios
    public function getAnos()
    {
        return $this->anos;
    }


    public function setAnos($anos)
    {
        $this->anos = $anos;
    }
}