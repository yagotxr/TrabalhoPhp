<?php

   namespace view;

   use view\base\BaseView;

   class MenuView extends BaseView {

        /*
		* Método que renderiza elementos na tela
		*/
        public function render($controller) {

            // Recupera o nome da classe
            $actionName = $this->getName(__CLASS__);

            // Renderiza a tela HTML
            require_once "html/MenuHtml.php";

            // Renderiza Superclasse
            parent::render($controller);
        }
   }
?>