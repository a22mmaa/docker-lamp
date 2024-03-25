<?php

$obx1 = new class
{
    public $base;
    public $altura;

    public function area()
    {
        return ($this->base * $this->altura) / 2;
    }

    public function perimetro()
    {
        return (2 * $this->base) + (2 * $this->altura);
    }
};

$obx1->base = 2;
$obx1->altura = 5;

echo $obx1->area();
echo "<br>";
echo $obx1->perimetro();
