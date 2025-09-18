<?php
require_once '../nave.php';
class Carga extends Nave
{
    private $tipoCarga;
    public function __construct($nom, $co, $tc)
    {
        parent::__construct($nom, $tc, $co);
        $this->tipoCarga = $tc;
    }

    public function getTipoCarga()
    {
        return $this->tipoCarga;
    }

    /**
     * Set the value of tipoCarga
     *
     * @return  self
     */
    public function setTipoCarga($tipoCarga)
    {
        $this->tipoCarga = $tipoCarga;

        return $this;
    }

    public function __toString()
    {
        return 'Nave de carga '. parent::__toString() .'--Tipo de carga: ' . $this->tipoCarga .')';
    }
}
