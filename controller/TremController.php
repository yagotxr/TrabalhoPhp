<?php

   namespace controller;

   use model\User;
   use model\DAO\TremDAO;
   use view\VeiculoView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class TremController extends BaseController {

        private $trem;
        private $tremDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->trem = new Trem();

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
            $this->tremDAO = new TremDAO($connection, $this->trem);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllTrem());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getTrem());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getTrem());
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
        private function getAllTrem() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultTrem = $this->tremDAO->getAllTrem();

            // Armazena array de objetos
            $allTrem = $resultTrem->fetchAll(PDO::FETCH_OBJ);

            return $allTrem;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getTrem() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultTrem = $this->tremDAO->getTrem($_SESSION["trem"]);

            // Armazena array de objetos
            $trem = $resultTrem->fetchAll(PDO::FETCH_OBJ);

            return $trem;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["modelo"])) $this->trem->modelo = $_POST["modelo"];
            if (isset($_POST["ano"])) $this->trem->ano = $_POST["ano"];

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->tremDAO = new TremDAO($connection, $this->trem);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->tremDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Trem adicionado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->tremDAO->update($_SESSION["trem"]);
                    // Mensagem
                    $this->view->showMessage("Trem atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->tremDAO->delete($_SESSION["trem"]);
                    // Mensagem
                    $this->view->showMessage("Trem excluido!");
                    break;
            }
        }
   }
?>