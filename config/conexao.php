<?php

    //ARQUIVA DADOS DO BANCO NAS VARIAVEIS

    $host = "localhost";
    $banco = "cadastro";
    $usuario = "root";
    $senha = "";

    //FAZ CONEXÃO COM O BANCO

    $conexao = new PDO(

        "mysql:host=$host;dbname=$banco",
        $usuario,
        $senha
        
    );

?>