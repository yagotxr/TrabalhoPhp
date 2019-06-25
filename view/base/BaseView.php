<?php

   namespace view\base;

   class BaseView {

        protected $param;

        function __construct() {
            
            // Limpa buffer de includes e requires de outras páginas
            ob_clean();
        }

        /*
		* Método que renderiza elementos na tela
		*/
        public function render($controller) {
            $this->returnRequest($controller);
        }

        /*
		* Método de retorno de requisições HTTP
		*/
        protected function returnRequest($controller) {
            if (($_SERVER['REQUEST_METHOD'] === 'POST') ) {
                $_SERVER['REQUEST_METHOD'] = null;
                $controller->request();
            }
        }

        /*
		* Método para setar parametros
		*/
        public function setParam($param) {
            $this->param = $param;
        }

        /*
		* Método de atualização da página
		*/
        public function refresh() {
            header("Refresh:0");
        }

        /*
		* Método para exibição de mensagens na página
		*/
        public function showMessage($message) {
            echo "<script> alert('" . $message . "'); </script>";
        }

        /*
		* Método para retornar o nome da classe
		*/
        public function getName($name) {
            $path = explode('\\', $name);
            return array_pop($path);
        }
   }
?>