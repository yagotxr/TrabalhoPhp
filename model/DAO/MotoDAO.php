<?php

   namespace model\DAO;

   class MotoDAO {

        private $connection;
        private $moto;

        function __construct($connection, $moto) {
            $this->connection = $connection;
            $this->moto = $moto;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO MOTO(modelo, ano) 
						values(
							'" . $this->moto->modelo . "',
							'" . $this->moto->ano . "'
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
			
			$query = "UPDATE MOTO SET 
							modelo='" . $this->moto->modelo . "',
							ano='" . $this->moto->ano . "',
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
			
			$query = "DELETE FROM MOTO WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllMoto()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM MOTO";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>