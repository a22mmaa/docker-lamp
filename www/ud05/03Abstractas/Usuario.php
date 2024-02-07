<?php

require_once 'Persona.php';

class Usuario extends Persona {

    function __construct($id, $nombre, $apellidos) {
        self::setID($id);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function accion(){
        echo "Nome: ".self::getNombre()."<br/>Apelidos: ".self::getApellidos()."<br/>Es un usuario.<br/>";
    }
}