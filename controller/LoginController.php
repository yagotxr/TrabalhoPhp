<?php

   namespace controller;

   use model\User;
   use model\DAO\UserDAO;
   use view\LoginView;
   use controller\MenuController;
   use controller\base\BaseController;

   class LoginController extends BaseController {

        private $user;
        private $userDAO;

        function __construct() {

            // Create new Model
            $this->user = new User();

            // Create new View
            $this->view = new LoginView();

            // Check Cookie
            $this->user->user = $this->checkHasCookie("loginCookie");

            // Set Param Model
            $this->view->setParam($this->user);

            // Renderiza View
            $this->renderView();
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Campos da tela foram digitados...
            if (isset($_POST["user"]) && isset($_POST["pass"])) {
                
                // Recupera Global de conexao com o banco de dados
                $connection = $GLOBALS['connection'];

                // Cria nova instancia de UserDAO
                $this->userDAO = new UserDAO($connection, $this->user);

                // Verifica se usuario existe no banco de dados
                if ($this->checkUserExists()) {

                    // Mensagem
                    $this->view->showMessage("Usuario encontrado!");

                    // Inicia sessão para este usuario
                    session_start();
                    $_SESSION["user"] = $_POST["user"];
                    
                    // Persiste Cookie
                    $this->setCookie("loginCookie", $_POST["user"]);

                    // Chama Menu da aplicação
                    new MenuController();

                } else {
                    // Se usuario não existe no banco de dados
                    // Mensagem
		            $this->view->showMessage("Usuario não encontrado!");
                }
            }
        }

        /*
        * Método que verifica se usuário existe no banco de dados
        */
        private function checkUserExists() {
            
            // Chama método de UserDAO para verificar se existe usuario (SELECT)
            $resultUsers = $this->userDAO->checkUser($_POST["user"], $_POST["pass"]);

            // Se registros retornados na consulta forem > 0
            if ($resultUsers->rowCount() > 0) {
                return true;
            }
            return false;
        }
   }
?>