<?php

   namespace controller;

   use view\MenuView;
   use controller\base\BaseController;

   class MenuController extends BaseController {

        function __construct() {

            // Create new View
            $this->view = new MenuView();

            // Renderiza View
            $this->renderView();
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

            // Recupera comando de requisição HTTP
            $optCommand = $this->getCommand();

            // Se comando for de voltar...
            if ($optCommand == "BACK") {
                // Chama tela de login
                $_SERVER['REQUEST_METHOD'] = null;
                new LoginController();
            } else {
                // Chama Controller de User
                new UserController($optCommand);
            }
        }
   }
?>