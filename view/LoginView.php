<?php

   namespace view;

   use view\base\BaseView;

   class LoginView extends BaseView {

        /*
		* Método que renderiza elementos na tela
		*/
        public function render($controller) {
            
            // Recupera parametros para serem usados na tela
            $obj = $this->param;

            // Recupera o nome da classe
            $actionName = $this->getName(__CLASS__);

            // Renderiza a tela HTML
            require_once "html/LoginHtml.php";

            // Renderiza Superclasse
            parent::render($controller);
        }
   }
?>