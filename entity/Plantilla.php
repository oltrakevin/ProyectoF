<?php

class Plantilla
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $contenido;

    /**
     * Plantilla constructor.
     * @param int $id
     * @param string $nombre
     * @param string $contenido
     */
    public function __construct( string $nombre='', string $contenido='')
    {
//        $this->id = $id;
        $this->nombre = $nombre;
        $this->contenido = $contenido;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }


    public function toArray():array{
        return[
            'id'=>$this->getId(),
            'nombre'=>$this->getNombre(),
            'contenido'=>$this->getContenido()
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Plantilla
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Plantilla
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param string $contenido
     * @return Plantilla
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
        return $this;
    }




}

