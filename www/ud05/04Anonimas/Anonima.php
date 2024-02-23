<?php

/**
 * Clase abstracta
 * 
 * @author  Manuel Magán
 */
$obx1 = new class($base, $altura) {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    /**
     * Calcula a area
     * 
     * @return  Valor da área
     */
    public function area() {
        return ($this->base * $this->altura)/2;
    }

    /**
     * Calcula o perímetro
     * 
     * @return  Valor do perímetro
     */
    public function perimetro() {
        return (2*$this->base)+(2*$this->altura);
    }
};