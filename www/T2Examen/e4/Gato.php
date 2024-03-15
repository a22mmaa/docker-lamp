<?php

require_once ('Animal.php');

class Gato extends Animal
{

    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function emitirSonido()
    {
        echo "Miau, miau";
    }

}