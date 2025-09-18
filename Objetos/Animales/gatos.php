<?php

class Gatos extends Animal{
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
}