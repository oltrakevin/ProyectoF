<?php

class Usuario{
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
    private $apellidos;
    /**
     * @var string
     */
    private $email;
    /**
     * @var
     */
    private $password;
    /**
     * @var string
     */
    private $fechaAlta;


    /**
     * Usuario constructor.
     * @param int $id
     * @param string $nombre
     * @param string $apellidos
     * @param string $email
     * @param string $password
     * @param string $fechaAlta
     */
    public function __construct($id='', $nombre='', $apellidos='', $email='',$password='', $fechaAlta='')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->fechaAlta = $fechaAlta;
    }



    public function __toString(){
        // TODO: Implement __toString() method.
    }

    public function toArray():array{
        return[
            'id'=>$this->getId(),
            'nombre'=>$this->getNombre(),
            'apellidos'=>$this->getApellidos(),
            'email'=>$this->getEmail(),
            'password'=>$this->getPassword(),
            'fechaAlta'=>$this->getFechaAlta()
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
     * @return Usuario
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
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * @param string $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
        return $this;
    }

    public function getProfilePicture() {
        $ruta = "imgs/profiles/profile";
        if (file_exists($ruta . $this->id . ".png")) {
            return $ruta . $this->id . ".png";
        } elseif (file_exists($ruta . $this->id . ".jpg")) {
            return $ruta . $this->id . ".jpg";
        } elseif (file_exists($ruta . $this->id . ".gif")) {
            return $ruta . $this->id . ".gif";
        } elseif (file_exists($ruta . $this->id . ".jpeg")) {
            return $ruta . $this->id . ".jpeg";
        } else {
            return "imgs/profiles/default.png";
        }
    }




}