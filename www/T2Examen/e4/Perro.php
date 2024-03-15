<?php

require_once ('Animal.php');

class Perro extends Animal
{

    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function emitirSonido()
    {
        echo "Guau, guau";
    }

}