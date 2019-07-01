<?php

   namespace model\DAO;

   class TremDAO {

        private $connection;
        private $trem;

        function __construct($connection, $trem) {
            $this->connection = $connection;
            $this->trem = $trem;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO TREM(modelo, ano) 
						values(
							'" . $this->trem->modelo . "',
							'" . $this->trem->ano . "'
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
			
			$query = "UPDATE TREM SET 
							modelo='" . $this->trem->modelo . "',
							ano='" . $this->trem->ano . "',
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
			
			$query = "DELETE FROM TREM WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllTrem()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM TREM";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>