<?php

class Empleado {

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    // Construtor
    function __construct($nombre, $salario) {
        $this->nombre = $nombre;
        if ($salario <= 2000) {
            $this->salario = $salario;
        } else {
            $this->salario = 2000;
        }
        self::$numEmpleados++;
    }

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function getSalario() {
        return $this->salario;
    }

}
