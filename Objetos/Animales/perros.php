<?php
    require_once('animal.php');
    class Perros extends Animal{
        public function comer(){
            return "El perro está comiendo";
        }
        public function dormir(){
            return "El perro está durmiendo";
        }
        public function hacerRuido(){
            return "Guau Guau";
        }
        public function hacerCaso(){
            $loHace = rand(1,10);
            if($loHace <= 9){
                return "El perro hace caso";
            }else{
                return "El perro no hace caso"; 
            }
        }
        
    }