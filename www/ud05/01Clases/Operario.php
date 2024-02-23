<?php

class Operario extends Empleado {
    private $turno;

    // Construtor

    function __construct($nombre, $salario, $turno) {
        parent::__construct($nombre, $salario);

        $this->turno = $turno;

        self::$numEmpleados++;
    }

    /*
    Esta foi a primeira versión do constructor.
    Funcionaba ben, pero en VSC saltaba o erro:
    "Undefined property '$nombre'." e o mesmo con
    salario.

    function __construct($nombre, $salario, $turno) {
        $this->nombre = $nombre;
        if ($salario <= 2000) {
            $this->salario = $salario;
        } else {
            $this->salario = 2000;
        }
        $this->turno = $turno;

        self::$numEmpleados++;
    }
    */

    function setTurno($turno) {

        $turno = strtolower($turno);

        if ($turno === 'diurno' || $turno === 'nocturno') {
            $this->turno = $turno;
        } else {
            echo "⚠️ Erro. Turno só pode conter os valores 'diurno' e 'nocturno'";
        }
    }

}