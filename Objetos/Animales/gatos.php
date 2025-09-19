<?php

class Gatos extends Animal{
    public function __construct(){
        
    }
    public function comer(){
        return "El gato está comiendo";
    }   
    public function dormir(){
        return "El gato está durmiendo";
    }
    
    public function hacerRuido(){
        return "Miau Miau";
    }
    public function hacerCaso(){
        $loHace = rand(1,100);
        if($loHace <= 5 ){
            return "El gato hace caso";
        }else{
            return "El gato no hace caso"; 
        }
    }
    public function toserBolaPelo(){
        return "El gato ha tosido una bola de pelo";
    }
}