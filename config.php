<?php
// Configurações do banco de dados

$db_host = 'localhost';//IP do servidor
$db_name = 'todolist';
$db_user = 'root';
$db_pass = '';

// Configuração do DSN (Data Source Name)
$dsn = "mysql:host=$db_host;dbname=$db_name;";

// Opções PDO
$options = [
       PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,
   ];

 
// Criação da instância PDO
$pdo = new PDO($dsn, $db_user, $db_pass, $options);
   