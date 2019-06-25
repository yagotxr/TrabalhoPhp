<?php
    // Autoloader
    require_once 'autoloader.php';

    use connection\Connection;

    // Cria intancia de conexão com banco de dados
    $connection = new Connection();

    // Armazena conexão do banco de dados em GLOBALS
    $GLOBALS['connection'] = $connection->getInstance();

    // Inclui rota da aplicação
    require_once 'route.php';
?>