<?php
require 'parametros.php';

    try {
        $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8mb4";
        $pdo= new PDO($dsn, $username, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("ERRO no banco de dados: ".$e->getMessage());
    }
?>