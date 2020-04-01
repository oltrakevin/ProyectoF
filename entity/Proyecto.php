<?php

const RUTA_IMG='imgs/productos/';

class Proyecto{

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
    private $imagen;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var string
     */
    private $stock;
    /**
     * @var float
     */
    private $precio;

    /**
     * Proyecto constructor.
     * @param string $nombre
     * @param string $imagen
     * @param string $descripcion
     * @param string $stock
     * @param float $precio
     */
    public function __construct($nombre='', $imagen='', $descripcion='', $stock='', $precio='')
    {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    public function toArray():array{
        return[
            'id'=>$this->getId(),
            'nombre'=>$this->getNombre(),
            'imagen'=>$this->getImagen(),
            'descripcion'=>$this->getDescripcion(),
            'stock'=>$this->getStock(),
            'precio'=>$this->getPrecio()
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
     * @return Proyecto
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
     * @return Proyecto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     * @return Proyecto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Proyecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param string $stock
     * @return Proyecto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     * @return Proyecto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }



    public function getUrlImagen(){
        return RUTA_IMG . $this->getImagen();
    }



}