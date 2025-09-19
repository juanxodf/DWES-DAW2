<?php
    abstract class Animal{
        public function __construct(){
            $this->nombre;
            $this->raza;
            $this->peso;
            $this->color;
        }
        private $nombre;
        private $raza;
        private $peso;
        private $color;

        public function Vacunar(){

        }
        abstract function comer();
        abstract function dormir();
        abstract function hacerRuido();
    }