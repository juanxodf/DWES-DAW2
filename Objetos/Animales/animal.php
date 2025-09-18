<?php
    abstract class Animal{
        private $nombre;
        private $raza;
        private $peso;
        private $color;

        public function Vacunar(){

        }
        public function comer(){

        }
        public function dormir(){

        }
        abstract function hacerRuido();
        abstract function hacerCaso();
    }