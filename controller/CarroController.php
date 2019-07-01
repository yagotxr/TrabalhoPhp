<?php

   namespace controller;

   use model\User;
   use model\DAO\CarroDAO;
   use view\VeiculoView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class CarroController extends BaseController {

        private $carro;
        private $carroDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->carro = new Carro();

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
            $this->carroDAO = new CarroDAO($connection, $this->carro);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllCarro());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getCarro());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getCarro());
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
        private function getAllCarro() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultCarro = $this->carroDAO->getAllCarro();

            // Armazena array de objetos
            $allCarro = $resultCarro->fetchAll(PDO::FETCH_OBJ);

            return $allCarro;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getCarro() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultCarro = $this->carroDAO->getCarro($_SESSION["carro"]);

            // Armazena array de objetos
            $carro = $resultCarro->fetchAll(PDO::FETCH_OBJ);

            return $carro;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["modelo"])) $this->carro->modelo = $_POST["modelo"];
            if (isset($_POST["ano"])) $this->carro->ano = $_POST["ano"];

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->carroDAO = new CarroDAO($connection, $this->carro);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->carroDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Carro adicionado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->carroDAO->update($_SESSION["carro"]);
                    // Mensagem
                    $this->view->showMessage("Carro atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->carroDAO->delete($_SESSION["carro"]);
                    // Mensagem
                    $this->view->showMessage("Carro excluido!");
                    break;
            }
        }
   }
?>