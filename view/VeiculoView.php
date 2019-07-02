<?php

   namespace view;

   use view\base\BaseView;

   class VeiculoView extends BaseView {

        /*
		* Método que renderiza elementos na tela
		*/
        public function render($controller, $optCommand) {

            // Recupera parametros para serem usados na tela
            $listObj = $this->param;

            // Recupera o nome da classe
            $actionName = $this->getName(__CLASS__);

            // Renderiza a tela HTML
            require_once "html/Veiculohtml.php";

            // Renderiza Superclasse
            parent::render($controller);
        }

        
   }
?>