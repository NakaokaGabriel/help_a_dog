<?php
    try
    {
        $conn = new PDO('mysql:host='.HOST.';dbname='.BANCO.'', USUARIO, SENHA);
        $conn->exec("set names utf8");
    }
    catch(PDOException $e)
    {
        echo 'Erro: '.$e->getMessage();
    }
?>