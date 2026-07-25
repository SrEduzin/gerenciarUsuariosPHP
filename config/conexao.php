<?php

    $host = "localhost";
    $banco = "cadastro";
    $usuario = "root";
    $senha = "";


    $conexao = new PDO(

        "mysql:host=$host;dbname=$banco",
        $usuario,
        $senha
        
    );

?>