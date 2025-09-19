<?php
require_once('animal.php');
class Elefante extends Animal{
    public function __construct(){

    }
    public function dormir(){
        return "El elefante está durmiendo";
    }
    public function comer(){
        return "El elefante está comiendo";
    }
    public function hacerRuido(){
        return "Barritar";
    }
    public function hacerCaso(){
        $loHace = rand(1,100);
        if($loHace <= 70){
            return "El elefante hace caso";
        }else{
            return "El elefante no hace caso"; 
        }
    }
}