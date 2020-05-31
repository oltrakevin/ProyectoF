<?php

class EmpresaCiclo{

    /**
     * @var string
     */
    private $cif;
    /**
     * @var int
     */
    private $id;

    /**
     * EmpresaCiclo constructor.
     * @param string $cif
     * @param int $id
     */
    public function __construct($cif='', $id=0)
    {
        $this->cif = $cif;
        $this->id = $id;
    }

    public function toArray():array{
        return[
            'cif'=>$this->getCif(),
            'id'=>$this->getId()

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
     * @return EmpresaCiclo
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
        return $this;
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
     * @return EmpresaCiclo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}