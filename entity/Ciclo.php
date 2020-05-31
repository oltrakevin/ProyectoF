<?php


class Ciclo{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $ciclo;

    /**
     * Ciclo constructor.
     * @param int $id
     * @param string $ciclo
     */
    public function __construct($id=0, $ciclo='')
    {
        $this->id = $id;
        $this->ciclo = $ciclo;
    }

    public function __toString()
    {
        return $this->getCiclo();
        // TODO: Implement __toString() method.
    }

    /**
     * @return int
     */


    public function toArray():array{
        return[
            'id'=>$this->getId(),
            'ciclo'=>$this->getCiclo()

        ];
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Ciclo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * @param string $ciclo
     * @return Ciclo
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;
        return $this;
    }





}