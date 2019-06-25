<?php

    use controller\LoginController;
    use controller\MenuController;
    use controller\UserController;

    /*
    * Verifica comando da última requisição POST HTTP
    */
    if (isset($_POST['requestAction'])) {

        // Recupera rota
        $request = getRoute();

        // Recupera comando
        $command = getCommand();

        switch ($request) {
            case $request . '/' :
                break;
            case '' :
                break;
            case 'LoginView' :
                new LoginController();
                break;
            case 'MenuView' :
                new MenuController();
                break;
            case 'UserView' :
                new UserController($command);
                break;
            default:
                //new ErrorController();
                break;
        }
    } else {

        // Inicio da aplicação...
        new LoginController();
    }

    /*
    * Recupera última View antes da requisição HTTP
    */
    function getRoute() {
        $route = explode(":", $_POST['requestAction']);
        return $route[0];
    }

    /*
    * Recupera último comando via requisição HTTP
    */
    function getCommand() {
        $route = explode(":", $_POST['requestAction']);
        return $route[1];
    }
?>