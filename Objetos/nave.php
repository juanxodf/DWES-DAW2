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
    }