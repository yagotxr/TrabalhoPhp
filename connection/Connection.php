<?php

namespace connection;

use PDO;

class Connection {
 
   /*
   * Declaração dos atributos da classe de conexão
   */
 
   private $host; // Endereço do servidor do banco de dados
   private $bd; // Banco de dados utilizado na conexão
   private $usuario; // Usuário do banco de dados que possua acesso ao schema
   private $senha; // Senha do usuário
   private $sql; // Consulta a ser executada
   private $conexao;
 
   /*
   * Dados para acesso ao banco de dados
   */
   private function configuraDados()
   {
	   $this->bd = 'bduser';
	   $this->host = '127.0.0.1';
	   $this->usuario = 'root';
	   $this->senha = 'Carol123';
   }
   
   function __construct()
   {
	   try
	   {	
			/*
			* Método que conecta ao banco de dados passando
			* os valores necessários para que a conexão ocorra
			*/
			$this->configuraDados();
			$this->conectar();
	   }
	   catch (PDOException $e) 
        {
            # call the get_error function
            $this->get_error($e);
        }
   }
   
   public function __sleep()
   {
	   return array('bd','host','usuario','senha');
   }
   
   public function __wakeup()
   {
	   $this->conectar();
   }
 
   /*
   * Metodo responsavel por criar conexão com o banco de dados
   */
   function conectar()
   {
	   $query = "mysql:host=" . $this->host . ";dbname=" . $this->bd;
       $this->conexao = new PDO($query, $this->usuario, $this->senha);
	   return $this->conexao;
   }

   /*
   * Metodo que retorna a instancia já criada do banco de dados
   */
   public function getInstance() {
       return $this->conexao;
   }
}
 
?>