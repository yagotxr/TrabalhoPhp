<?php

   namespace controller;

   use model\User;
   use model\DAO\CaminhaoDAO;
   use view\VeiculoView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class CaminhaoController extends BaseController {

        private $caminhao;
        private $caminhaoDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->caminhao = new Caminhao();

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
            $this->caminhaoDAO = new CaminhaoDAO($connection, $this->caminhao);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllCaminhao());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getCaminhao());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getCaminhao());
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
        private function getAllCaminhao() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultCaminhao = $this->caminhaoDAO->getAllCaminhao();

            // Armazena array de objetos
            $allCaminhao = $resultCaminhao->fetchAll(PDO::FETCH_OBJ);

            return $allCaminhao;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getCaminhao() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultCaminhao = $this->caminhaoDAO->getCaminhao($_SESSION["caminhao"]);

            // Armazena array de objetos
            $caminhao = $resultCaminhao->fetchAll(PDO::FETCH_OBJ);

            return $caminhao;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["modelo"])) $this->caminhao->modelo = $_POST["modelo"];
            if (isset($_POST["ano"])) $this->caminhao->ano = $_POST["ano"];

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->caminhaoDAO = new CaminhaoDAO($connection, $this->caminhao);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->caminhaoDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Caminhão adicionado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->caminhaoDAO->update($_SESSION["caminhao"]);
                    // Mensagem
                    $this->view->showMessage("Caminhão atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->caminhaoDAO->delete($_SESSION["caminhao"]);
                    // Mensagem
                    $this->view->showMessage("Caminhão excluido!");
                    break;
            }
        }
   }
?>