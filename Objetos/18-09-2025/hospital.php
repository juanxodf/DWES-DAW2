<?php
    require_once '../nave.php';
    class Hospital extends Nave{
        private $numCamas;
        public function __construct($nom, $co, $nc){
            parent::__construct($nom, 'Hospitalaria', $co);
            $this->numCamas = $nc;
        }

        public function __loquesea(){
            return 'oa';
        }
    }