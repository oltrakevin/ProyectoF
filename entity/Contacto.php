<?php

class Contacto{
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
    private $contacto;
    /**
     * @var string
     */
    private $localizacion;
    /**
     * @var string
     */
    private $localidad;
    /**
     * @var int
     */
    private $cp;
    /**
     * @var int
     */
    private $telefono1;
    /**
     * @var int
     */
    private $telefono2;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $observaciones;
    /**
     * @var string
     */
    private $fecha;

    /**
     * Contacto constructor.
     * @param string $nombre
     * @param string $contacto
     * @param string $localizacion
     * @param string $localidad
     * @param int $cp
     * @param int $telefono1
     * @param int $telefono2
     * @param string $email
     * @param string $observaciones
     * @param string $fecha
     */
    public function __construct( string $nombre='', string $contacto='', string $localizacion='', string $localidad='', int $cp=0, int $telefono1=0, int $telefono2=0, string $email='', string $observaciones='',string $fecha=''){
        $this->nombre = $nombre;
        $this->contacto = $contacto;
        $this->localizacion = $localizacion;
        $this->localidad = $localidad;
        $this->cp = $cp;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->email = $email;
        $this->observaciones = $observaciones;
        $this->fecha = $fecha;
    }

    public function __toString(){
        // TODO: Implement __toString() method.
    }

    public function toArray():array{
        return[
            'id'=>$this->getId(),
            'nombre'=>$this->getNombre(),
            'contacto'=>$this->getContacto(),
            'localizacion'=>$this->getLocalizacion(),
            'localidad'=>$this->getLocalidad(),
            'cp'=>$this->getCp(),
            'telefono1'=>$this->getTelefono1(),
            'telefono2'=>$this->getTelefono2(),
            'email'=>$this->getEmail(),
            'observaciones'=>$this->getObservaciones(),
            'fecha'=>$this->getFecha()
        ];
    }

    /**
     * @return int
     */
    public function getId()//: int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contacto
     */
    public function setId(int $id): Contacto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Contacto
     */
    public function setNombre(string $nombre): Contacto
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getContacto(): string
    {
        return $this->contacto;
    }

    /**
     * @param string $contacto
     * @return Contacto
     */
    public function setContacto(string $contacto): Contacto
    {
        $this->contacto = $contacto;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalizacion(): string
    {
        return $this->localizacion;
    }

    /**
     * @param string $localizacion
     * @return Contacto
     */
    public function setLocalizacion(string $localizacion): Contacto
    {
        $this->localizacion = $localizacion;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param string $localidad
     * @return Contacto
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
        return $this;
    }

    /**
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param int $cp
     * @return Contacto
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }
    /**
     * @return int
     */
    public function getTelefono1(): int
    {
        return $this->telefono1;
    }

    /**
     * @param int $telefono1
     * @return Contacto
     */
    public function setTelefono1(int $telefono1): Contacto
    {
        $this->telefono1 = $telefono1;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelefono2(): int
    {
        return $this->telefono2;
    }

    /**
     * @param int $telefono2
     * @return Contacto
     */
    public function setTelefono2(int $telefono2): Contacto
    {
        $this->telefono2 = $telefono2;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contacto
     */
    public function setEmail(string $email): Contacto
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones(): string
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return Contacto
     */
    public function setObservaciones(string $observaciones): Contacto
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    /**
     * @return string
     */
    public function getFecha(): string
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     * @return Contacto
     */
    public function setFecha(string $fecha): Contacto
    {
        $this->fecha = $fecha;
        return $this;
    }


    /**
     * @return string
     */
    public function getFechaFormat(): string
    {
        return date('d/m/Y',strtotime($this->getFecha()));
    }


}