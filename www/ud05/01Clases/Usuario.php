<?php

class Usuario
{
    // Atributos
    private $id;
    private $nombre;
    private $apellidos;
    private $password;
    private $edad;
    private $provincia;
    private static $totalUsuarios = 0;

    // Construtor
    function __construct($nombre, $apellidos, $password, $edad, $provincia) {
        self::$totalUsuarios++;
        $this->id = self::$totalUsuarios;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $password;
        $this->edad = $edad;
        $this->provincia = $provincia;
    }

    /*
    Non creo un destrutor, porque no contexto
    da base de datos para a que estaba
    pensada a tenda, non tería sentido.
    */

    // Getters e setters

    public function getId()
    {
        return $this->id;
    }
    /*
    Entendo que non tería sentido
    crear un setter para id
    */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        if (!empty($nombre)) {
            $this->nombre = $nombre;
        } else {
            echo "O nome non pode estar baleiro.";
        }
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        if (!empty($apellidos)) {
            $this->apellidos = $apellidos;
        } else {
            echo "Os apelidos non poden estar baleiros.";
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if (!empty($password)) {
            $this->password = $password;
        } else {
            echo "O contrasinal non pode estar baleiro.";
        }
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        if ($edad > 0 && $edad < 150) {
            $this->edad = $edad;
        } else {
            echo "Debe indicarse unha idade correcta";
        }

    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {   
        $provincia = strtolower($provincia);
        $provincias_validas = ['a coruña', 'lugo', 'ourense', 'pontevedra'];
        if (in_array($provincia, $provincias_validas)) {
            $this->provincia = $provincia;
        } else {
            echo "Erro na inserción dos datos. Comproba o valor que desexas introducir.";
        }
    }
}
