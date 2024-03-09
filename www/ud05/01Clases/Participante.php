<?php

class Participante
{
    // Propiedades
    private $nombre;
    private $edad;

    // Construtor
    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad   = $edad;
    }

    // Getters e setters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
}
