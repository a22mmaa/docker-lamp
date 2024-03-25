<?php

require_once('Persona.php');

class Usuario extends Persona
{

    private $id;
    protected $nombre;
    protected $apellidos;

    public  function getId()
    {
        return $this->id;
    }

    public  function setID($id)
    {
        $this->id = $id;
    }

    public  function getNombre()
    {
        return $this->nombre;
    }

    public  function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public  function getApellidos()
    {
        return $this->apellidos;
    }

    public  function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public  function accion()
    {
        return $this->nombre . " " . $this->apellidos . " es un usuario";
    }
}
