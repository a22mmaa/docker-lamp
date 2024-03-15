<?php

abstract class Figura
{
    private $ancho;
    private $alto;

    public function __construct($ancho, $alto) {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    // Método abstracto para dibujar la figura
    abstract public function dibujar();
    
    // Método abstracto para agrandar la figura
    abstract public function agrandar($factor);
    
    // Método abstracto para encoger la figura
    abstract public function encoger($factor);

    abstract public  function getAncho();

    abstract public  function setAncho($ancho);

    abstract public  function getAlto();

    abstract public  function setAlto($alto);
}
