<?php

   namespace model;

   class Caminhao {

        private $modelo;
        private $ano;

        function __construct() {
        }

        /*
		* Método get (Mágico)
		*/
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
        
        /*
		* Método set (Mágico)
		*/
        public function __set($property, $value) {

            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
    
            return $this;
        }
   }
?>