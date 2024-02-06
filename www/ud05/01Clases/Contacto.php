<?php

class Contacto {

    // Propiedades
    private $nombre;
    private $apellido;
    private $numero_telefono;

    // Construtor
    function __construct($nombre, $apellido, $numero_telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numero_telefono = $numero_telefono;
    }

    // Destrutor
    function __destruct()
    {
        echo "Obxecto ".$this->nombre." borrado.";
    }

    // Getters e setters
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNumeroTelefono() {
        return $this->numero_telefono;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNumeroTelefono($numero_telefono) {
        $this->numero_telefono = $numero_telefono;
    }

    // Métodos
    function muestraInformacion() {
        echo "Nombre: ".$this->nombre.". Apellido: ".$this->apellido.". Número de teléfono: ".$this->numero_telefono.".";
    }


}