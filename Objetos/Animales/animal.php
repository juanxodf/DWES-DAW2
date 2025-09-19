<?php
    abstract class Animal{
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