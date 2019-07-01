<?php

   namespace controller;

   use model\User;
   use model\DAO\MotoDAO;
   use view\VeiculoView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class MotoController extends BaseController {

        private $moto;
        private $motoDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->moto = new Moto();

            // Create new View
            $this->view = new VeiculoView();

            // Seta comandos que vieram do Menu
            $this->setCommand($optCommand);
        }

        /*
        * Chama a View para renderizar elementos da tela com parametro de comando
        */
        protected function renderView($optCommand) {
            $this->view->render($this, $optCommand);
        }

        /*
        * Metodo que seta comandos que vieram do Menu
        */
        private function setCommand($optCommand) {

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->motoDAO = new MotoDAO($connection, $this->moto);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllMoto());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getMoto());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getMoto());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'BACK' :

                    // Volta para o menu da aplicação
                    $_SERVER['REQUEST_METHOD'] = null;
                    new MenuController();
                    break;
            }
        }

        /*
        * Método que recupera todos os Usuarios
        */
        private function getAllMoto() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultMoto = $this->motoDAO->getAllMoto();

            // Armazena array de objetos
            $allMoto = $resultMoto->fetchAll(PDO::FETCH_OBJ);

            return $allMoto;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getMoto() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultMoto = $this->motoDAO->getMoto($_SESSION["moto"]);

            // Armazena array de objetos
            $moto = $resultMoto->fetchAll(PDO::FETCH_OBJ);

            return $moto;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["modelo"])) $this->moto->modelo = $_POST["modelo"];
            if (isset($_POST["ano"])) $this->moto->ano = $_POST["ano"];

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->motoDAO = new MotoDAO($connection, $this->moto);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->motoDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Moto adicionado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->motoDAO->update($_SESSION["moto"]);
                    // Mensagem
                    $this->view->showMessage("Moto atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->motoDAO->delete($_SESSION["moto"]);
                    // Mensagem
                    $this->view->showMessage("Moto excluido!");
                    break;
            }
        }
   }
?>