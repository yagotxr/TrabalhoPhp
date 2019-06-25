<?php

   namespace model\DAO;

   class UserDAO {

        private $connection;
        private $user;

        function __construct($connection, $user) {
            $this->connection = $connection;
            $this->user = $user;
        }

		/*
		* Método de inserção no banco de dados
		*/
		public function insert()
		{
			$con = $this->connection;
			
			$query = "INSERT INTO USER(nome, ultimoNome, cpf, rg, dataNascimento, idade, endereco, user, pass, email) 
						values(
							'" . $this->user->nome . "',
							'" . $this->user->ultimoNome . "',
							'" . $this->user->cpf . "',
							'" . $this->user->rg ."',
							'" . $this->user->dataNascimento . "',
							" . $this->user->idade . ",
							'" . $this->user->endereco ."',
							'" . $this->user->user . "',
							'" . $this->user->pass . "',
							'" . $this->user->email ."'
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
			
			$query = "UPDATE USER SET 
							nome='" . $this->user->nome . "',
							ultimoNome='" . $this->user->ultimoNome . "',
							cpf='" . $this->user->cpf . "',
							rg='" . $this->user->rg . "',
							dataNascimento='" . $this->user->dataNascimento . "',
							idade='" . $this->user->idade . "',
							endereco='" . $this->user->endereco . "',
							user='" . $this->user->user . "',
							pass='" . $this->user->pass . "',
							email='" . $this->user->email . "'
						WHERE user = '$login'";
			
			$stmt = $con->prepare($query);
			return $stmt->execute();
		}
		
		/*
		* Método de exclusão no banco de dados
		*/
		public function delete($login)
		{
			$con = $this->connection;
			
			$query = "DELETE FROM USER WHERE user = '$login'";
			
			$stmt = $con->prepare($query);
			
			return $stmt->execute();
		}
		
		/*
		* Método para verificar existencia de usuario no banco de dados
		*/
		public function checkUser($login, $pass)
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM USER WHERE user = '$login' AND pass = '$pass'";
			
			$rs = $con->query($query);
			
			return $rs;
		}
		
		/*
		* Método para recuperar um unico usuario
		*/
		public function getUser($login)
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM USER WHERE user = '$login'";
			
			$rs = $con->query($query);
			
			return $rs;
		}
		
		/*
		* Método para recuperar todos os usuarios
		*/
		public function getAllUser()
		{
			$con = $this->connection;
			
			$query = "SELECT * FROM USER";
			
			$rs = $con->query($query);
			
			return $rs;
		}
   }
?>