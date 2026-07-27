<?php

    require_once("functions.php");

    if(isset($_POST["nome"]) && isset($_POST["idade"])){
        $nome = limparPost($_POST["nome"]);
        $idade = limparPost($_POST["idade"]);

        $erro = validarUsuario($nome,$idade);
        if($erro){
            direcionamento($erro);
        };
        
        salvarUsuario($nome, $idade, $conexao);
        header("location: listar.php?resultado=sucesso");

    }else{
        direcionamento('erroCampo');
    }

    function direcionamento($valor){
        header("location: cadastrar.php?resultado=$valor");
        exit(); 
    }
?>