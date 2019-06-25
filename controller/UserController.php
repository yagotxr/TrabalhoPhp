<?php

   namespace controller;

   use model\User;
   use model\DAO\UserDAO;
   use view\UserView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class UserController extends BaseController {

        private $user;
        private $userDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->user = new User();

            // Create new View
            $this->view = new UserView();

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
            $this->userDAO = new UserDAO($connection, $this->user);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllUser());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getUser());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getUser());
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
        private function getAllUser() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultUsers = $this->userDAO->getAllUser();

            // Armazena array de objetos
            $allUsers = $resultUsers->fetchAll(PDO::FETCH_OBJ);

            return $allUsers;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getUser() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultUser = $this->userDAO->getUser($_SESSION["user"]);

            // Armazena array de objetos
            $user = $resultUser->fetchAll(PDO::FETCH_OBJ);

            return $user;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["nome"])) $this->user->nome = $_POST["nome"];
            if (isset($_POST["ultimoNome"])) $this->user->ultimoNome = $_POST["ultimoNome"];
            if (isset($_POST["cpf"])) $this->user->cpf = $_POST["cpf"];
            if (isset($_POST["rg"])) $this->user->rg = $_POST["rg"];
            if (isset($_POST["dataNascimento"])) $this->user->dataNascimento = $_POST["dataNascimento"];
            if (isset($_POST["idade"])) $this->user->idade = $_POST["idade"];
            if (isset($_POST["endereco"])) $this->user->endereco = $_POST["endereco"];
            if (isset($_POST["user"])) $this->user->user = $_POST["user"];
            if (isset($_POST["pass"])) $this->user->pass = $_POST["pass"];
            if (isset($_POST["email"])) $this->user->email = $_POST["email"];

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->userDAO = new UserDAO($connection, $this->user);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->userDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Usuario criado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->userDAO->update($_SESSION["user"]);
                    // Mensagem
                    $this->view->showMessage("Usuario atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->userDAO->delete($_SESSION["user"]);
                    // Mensagem
                    $this->view->showMessage("Usuario excluido!");
                    break;
            }
        }
   }
?>