<?php

   namespace controller;

   use model\Veiculo;
   use model\DAO\AviaoDAO;
   use view\VeiculoView;
   use controller\MenuController;
   use controller\base\BaseController;
   use PDO;

   class VeiculoController extends BaseController {

        private $aviao;
        private $userDAO;

        function __construct($optCommand) {

            // Create new Model
            $this->aviao = new Aviao();

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
            $this->aviaoDAO = new AviaoDAO($connection, $this->aviao);

            switch ($optCommand) {
                case 'CREATE' :

                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'READ' :

                    // Set Param Model com todos os usuários
                    $this->view->setParam($this->getAllAviao());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'UPDATE' :
                    
                    // Set Param Model para um usuario
                    $this->view->setParam($this->getAviao());
                    // Renderiza View
                    $this->renderView($optCommand);
                    break;
                case 'DELETE' :

                    // Set Param Model para um usuario
                    $this->view->setParam($this->getAviao());
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
        private function getAllAviao() {

            // Chama método de UserDAO para recuperar todos os usuarios (SELECT)
            $resultUsers = $this->aviaoDAO->getAllAviao();

            // Armazena array de objetos
            $allAviao = $resultAviao->fetchAll(PDO::FETCH_OBJ);

            return $allAviao;
        }

        /*
        * Método que recupera um unico Usuario
        */
        private function getAviao() {
            
            // Recurso para trabalhar com sessão
            session_start();

            // Chama método de UserDAO para recuperar um unico usuario (SELECT)
            $resultAviao = $this->aviaoDAO->getAviao($_SESSION["aviao"]);

            // Armazena array de objetos
            $aviao = $resultAviao->fetchAll(PDO::FETCH_OBJ);

            return $aviao;
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Obtem elementos da tela vindos via POST HTTP
            if (isset($_POST["modelo"])) $this->user->modelo = $_POST["modelo"];
            if (isset($_POST["ano"])) $this->user->ano = $_POST["ano"];
        

            // Recupera Global de conexao com o banco de dados
            $connection = $GLOBALS['connection'];

            // Cria nova instancia de UserDAO
            $this->aviaoDAO = new AviaoDAO($connection, $this->aviao);

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            switch ($optCommand) {
                case 'CREATE' :

                    // Insere novo registro no banco de dados
                    $this->aviaoDAO->insert();
                    // Mensagem
                    $this->view->showMessage("Avião cadastrado!");
                    break;
                case 'UPDATE' :

                    // Atualiza registro no banco de dados
                    $this->aviaoDAO->update($_SESSION["aviao"]);
                    // Mensagem
                    $this->view->showMessage("Aviao atualizado!");
                    break;
                case 'DELETE' :

                    // Deleta registro no banco de dados
                    $this->aviaoDAO->delete($_SESSION["aviao"]);
                    // Mensagem
                    $this->view->showMessage("Aviao excluido!");
                    break;
            }
        }
   }
?>