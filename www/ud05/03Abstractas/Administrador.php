<?php

require_once 'Persona.php';

class Administrador extends Persona
{

    public function __construct($id, $nombre, $apellidos)
    {
        self::setID($id);
        $this->nombre    = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function accion()
    {
        echo "Nome: " . self::getNombre() . "<br/>Apelidos: " . self::getApellidos() . "<br/>Es unha administradora.<br/>";
    }
}
