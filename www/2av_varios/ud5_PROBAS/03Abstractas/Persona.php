<?php

abstract class Persona
{
    private $id;
    protected $nombre;
    protected $apellidos;

    /* En PHP, una clase abstracta puede tener un constructor, pero no puede ser declarado como abstracto. Esto se debe a que un constructor en una clase abstracta puede tener implementaciones concretas, y no puede ser simplemente una firma abstracta sin implementación.
    
    La razón principal para permitir un constructor en una clase abstracta es que las clases concretas que heredan de la clase abstracta pueden necesitar inicializar propiedades específicas de la clase o realizar otras tareas de inicialización en su constructor. Al no permitir un constructor en una clase abstracta, estarías limitando severamente la capacidad de las clases concretas de inicializar adecuadamente sus propiedades y configuraciones específicas.
    En resumen, el constructor no puede ser abstracto en una clase abstracta porque necesita proporcionar una implementación concreta para permitir que las clases concretas hereden y utilicen correctamente la clase abstracta. */
    public function __construct($id, $nombre, $apellidos)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    abstract public  function getId();

    abstract public  function setID($id);

    abstract public  function getNombre();

    abstract public  function setNombre($nombre);

    abstract public  function getApellidos();

    abstract public  function setApellidos($apellidos);

    abstract public  function accion();
}
