<?php
    class Nave{
        private $nombre;
        private $combustible;
        static $tablon;
        
        public function __construct($nom, $tc, $co){
            $this->nombre = $nom;
            
            $this->combustible = $co;
        }

        
        public function __toString(){
            return 'Nave (Nombre: '.$this->nombre.' - Combustible: '.$this->combustible.')';
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
         *<
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
        public static function metodoEstatico(){
            echo 'Metodo estatico <br>';
        }

        public static function Builder(){
            return new BuilderNave();
        }
    }

    class BuilderNave{
        private $nombre;

        // Así es como se ponen valores por defecto
        private $tipoCarga = "Ninguno";
        private $combustible = "Ninguno";

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

        // Método que crea la nave con los datos que se han ido seteando
        public function build(){
            return new Nave($this->nombre, $this->tipoCarga, $this->combustible);
        }   
        public function __loquesea(){
            return 'ea';
        }
    }
    