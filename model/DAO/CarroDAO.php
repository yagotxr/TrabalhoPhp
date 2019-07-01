<?php

   namespace model\DAO;

   class CarroDAO {

        private $connection;
        private $carro;

        function __construct($connection, $moto) {
            $this->connection = $connection;
            $this->carro = $carro;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO CARRO(modelo, ano) 
						values(
							'" . $this->carro->modelo . "',
							'" . $this->carro->ano . "'
						)";
						
			$stmt = $con->prepare($query);
			return $stmt->execute();
		}
		
		/*
		* Método de atualização no banco de dados
		*/
		public function update($login)
		{
			$con = $this->connection;
			
			$query = "UPDATE CARRO SET 
							modelo='" . $this->carro->modelo . "',
							ano='" . $this->carro->ano . "',
						WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			return $stmt->execute();
		}
		
		/*
		* Método de exclusão no banco de dados
		*/
		public function delete($login)
		{
			$con = $this->connection;
			
			$query = "DELETE FROM CARRO WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllCarro()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM CARRO";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>