<?php

   namespace model;

   class User {

        private $nome;
        private $ultimoNome;
        private $cpf;
        private $rg;
        private $dataNascimento;
        private $idade;
        private $endereco;
        private $user;
        private $pass;
        private $email;

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