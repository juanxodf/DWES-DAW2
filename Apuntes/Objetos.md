creamos un index.php y una clase que será "nave.php"

en nave pondremos:
``
<?php
    class Nave{
        private $nombre;
        private $tipoCarga;
        private $combustible;
        
        public function __construct($nom, $tc, $co){
            $this->nombre = $nom;
            $this->tipoCarga = $tc;
            $this->combustible = $co;
        }

        
        public function __toString(){
            return 'Nave (Nombre: '.$this->nombre.' - Tipo de carga: '.$this->tipoCarga.' - Combustible: '.$this->combustible.')';
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of tipoCarga
         */ 
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

        /**
         * Get the value of combustible
         */ 
        public function getCombustible()
        {
                return $this->combustible;
        }

        /**
         * Set the value of combustible
         *
         * @return  self
         */ 
        public function setCombustible($combustible)
        {
                $this->combustible = $combustible;

                return $this;
        }

        public function despegar($vel){
            echo 'La nave '.$this->nombre.' ha despegado a '.$vel.' km/h <br>';
        }
        public function __Call($nombre, $args){
            echo 'Se llama '.$nombre.' <br>';
            print_r($args);
        }
    }

    en el index hemos puesto 
    <?php

require 'nave.php';

$n = new Nave('Enterprise', 'Mercancias', 'Antimateria');

echo $n.'<br>';

$n -> setNombre('Defiant');
echo $n.'<br>';