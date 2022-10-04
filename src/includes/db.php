<?php


    require_once("../../vendor/autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable('../../');
    $dotenv->load();    
 
    $db_host = $_ENV['HOST'];
    $db_name = $_ENV['DB_DATABASE'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASS'];

    $dsn = "mysql:host=$db_host;dbname=$db_name";
    $db = new PDO($dsn, $db_user, $db_pass);
    
?>