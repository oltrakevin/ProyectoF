<?php


class Empresa
{
    /**
     * @var string
     */
    private $cif;
    /**
     * @var string
     */
    private $nombre;
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
     * @var string
     */
    private $telefono1;
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
     * Empresa constructor.
     * @param string $cif
     * @param string $nombre
     * @param string $localizacion
     * @param string $localidad
     * @param int $cp
     * @param string $telefono1
     * @param string $email
     * @param string $observaciones
     * @param string $fecha
     */
    public function __construct(string $cif='', string $nombre='',string $localizacion='',string $localidad='',int $cp=0,int $telefono1=0,string $email='',string $observaciones='',string $fecha='')
    {
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->localizacion = $localizacion;
        $this->localidad = $localidad;
        $this->cp = $cp;
        $this->telefono1 = $telefono1;
        $this->email = $email;
        $this->observaciones = $observaciones;
        $this->fecha = $fecha;
    }

    public function __toString()
    {
        return "";
        // TODO: Implement __toString() method.
    }


    public function toArray():array{
        return[
            'cif'=>$this->getCif(),
            'nombre'=>$this->getNombre(),
            'localizacion'=>$this->getLocalizacion(),
            'localidad'=>$this->getLocalidad(),
            'cp'=>$this->getCp(),
            'telefono1'=>$this->getTelefono1(),
            'email'=>$this->getEmail(),
            'observaciones'=>$this->getObservaciones(),
            'fecha'=>$this->getFecha()
        ];
    }

    /**
     * @return string
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * @param string $cif
     * @return Empresa
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
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
     * @return Empresa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * @param string $localizacion
     * @return Empresa
     */
    public function setLocalizacion($localizacion)
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
     * @return Empresa
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
     * @return Empresa
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * @param string $telefono1
     * @return Empresa
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param int $email
     * @return Empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return Empresa
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     * @return Empresa
     */
    public function setFecha($fecha)
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

