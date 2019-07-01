<?php

   namespace model\DAO;

   class CaminhaoDAO {

        private $connection;
        private $caminhao;

        function __construct($connection, $caminhao) {
            $this->connection = $connection;
            $this->caminhao = $caminhao;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO CAMINHAO(modelo, ano) 
						values(
							'" . $this->caminhao->modelo . "',
							'" . $this->caminhao->ano . "'
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
			
			$query = "UPDATE CAMINHAO SET 
							modelo='" . $this->caminhao->modelo . "',
							ano='" . $this->caminhao->ano . "',
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
			
			$query = "DELETE FROM CAMINHAO WHERE modelo = '$modelo'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllCaminhao()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM CAMINHAO";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>