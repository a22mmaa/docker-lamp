<?php

abstract class Persona {
    private $id;
    protected $nombre;
    protected $apellidos;

    abstract function __construct($id, $nombre, $apellidos);

    /*
    Nota sobre get e set ID():

    Por defecto, non tería feito un setID(),
    xa que ao meu modo de comprender o
    uso de ID, este sería un valor
    inmutábel. Con todo, do mesmo xeito
    que acontece con getID(), dado que
    o atributo é private, non é posíbel
    acceder a el desde fóra de Persona,
    polo que necesito definir ambos métodos
    como públicos e non abstractos.

    Outro modo de resolver isto sería
    facendo público o constructor, pero 
    entendo que iría claramente en contra
    do enunciado.
    */
    function getID(){
        return $this->id;
    }

    function setID($id) {
        $this->id = $id;
    }

    abstract function getNombre();
    abstract function setNombre($nombre);
    abstract function getApellidos();
    abstract function setApellidos($apellidos);

    abstract function accion();
}


