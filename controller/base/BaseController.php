<?php

   namespace controller\base;

   class BaseController {

        protected $view;

        function __construct() {
        }

        /*
        * Chama a View para renderizar elementos da tela
        */
        protected function renderView() {
            $this->view->render($this);
        }

        /*
        * Método que é chamado após requisição para esta página
        */
        public function request() {

        }

        /*
        * Persiste um novo cookie
        */
        protected function setCookie($key, $value) {
            setcookie($key, $value, time()+3600);  /* expira em 1 hora */
        }

        /*
        * Recupera um cookie
        */
        protected function checkHasCookie($key) {
            // Recupera Cookie
            if (isset($_COOKIE[$key])) {
                return $_COOKIE[$key];
            }
        }

        /*
        * Recupera último comando via requisição HTTP
        */
        protected function getCommand() {
            $route = explode(":", $_POST['requestAction']);
            return $route[1];
        }
   }
?>