<?php

/**
 * Esta clase serve para almacenar contactos
 * 
 * @author  Manuel Magán
 */
class Contacto {

    // Propiedades
    private $nombre;
    private $apellido;
    private $numero_telefono;

    /**
     * Construtor da clase
     */
    function __construct($nombre, $apellido, $numero_telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numero_telefono = $numero_telefono;
    }

    /**
     * Destrutor da clase
     */
    function __destruct()
    {
        echo "Obxecto ".$this->nombre." borrado.";
    }

    /**
     * Recolle o nome
     * @return  nome do obxecto
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Recolle o apelido
     * @return  apelido do obxecto
     */
    public function getApellido() {
        return $this->apellido;
    }

    /**
     * Recolle o teléfono
     * @return  teléfono do obxecto
     */
    public function getNumeroTelefono() {
        return $this->numero_telefono;
    }

    /**
     * Modifica o nome
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Modifica o apelido
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     * Modifica o teléfono
     */
    public function setNumeroTelefono($numero_telefono) {
        $this->numero_telefono = $numero_telefono;
    }

    /**
     * Imprime información sobre o contacto
     */
    function muestraInformacion() {
        echo "Nombre: ".$this->nombre.". Apellido: ".$this->apellido.". Número de teléfono: ".$this->numero_telefono.".";
    }


}