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
    }