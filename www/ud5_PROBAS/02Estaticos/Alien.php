<?php

class Alien {
    private $nombre;
    static private $numberOfAliens;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        self::$numberOfAliens++;
    }

    public static function getNumberOfAliens() {
        return self::$numberOfAliens;
    }


}