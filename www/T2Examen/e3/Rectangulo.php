<?php

require_once('Figura.php');

class Rectangulo extends Figura
{
    private $ancho;
    private $alto;

function __construct($ancho, $alto) {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }


    public  function getAncho() {
        return $this->ancho;
    }

    public  function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    public  function getAlto() {
        return $this->alto;
    }

    public  function setAlto($alto) {
        $this->alto = $alto;
    }

    public function dibujar() {

        echo "<p>Se dibuja el cuadrado";
        echo "<br/>";
        echo "Ancho: ".$this->ancho;
        echo "<br/>";
        echo "Alto: ".$this->alto."</p>";
    }
    
    public function agrandar($factor) {

        $this->ancho =  $this->ancho*$factor;
        $this->alto = $this->alto*$factor;
    }
    
    public function encoger($factor) {
        $this->ancho = $this->ancho/$factor;
        $this->alto =  $this->alto/$factor;
    }

}
