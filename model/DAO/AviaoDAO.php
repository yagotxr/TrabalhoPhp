<?php

   namespace model\DAO;

   class AviaoDAO {

        private $connection;
        private $aviao;

        function __construct($connection, $aviao) {
            $this->connection = $connection;
            $this->aviao = $aviao;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO AVIAO(modelo, ano) 
						values(
							'" . $this->aviao->modelo . "',
							'" . $this->aviao->ano . "'
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
			
			$query = "UPDATE AVIAO SET 
							modelo='" . $this->aviao->modelo . "',
							ano='" . $this->aviao->ano . "',
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
			
			$query = "DELETE FROM AVIAO WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllAviao()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM AVIAO";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>