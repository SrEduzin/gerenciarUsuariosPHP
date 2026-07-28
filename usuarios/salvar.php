<?php

    require_once("../config/conexao.php");
    require_once("../Repositories/UsuarioRepository.php");
    require_once("../validation/validation.php");
    require_once("../helpers/helpers.php");
    $usuarioRepository = new UsuarioRepository($conexao);

    if(isset($_POST["nome"]) && isset($_POST["idade"])){
        $nome = limparPost($_POST["nome"]);
        $idade = limparPost($_POST["idade"]);

        $erro = validarUsuario($nome,$idade);
        if($erro){
            direcionamento($erro);
        };
        
        $usuarioRepository->salvar($nome, $idade);
        header("location: listar.php?resultado=sucesso");

    }else{
        direcionamento('erroCampo');
    }

    function direcionamento($valor){
        header("location: cadastrar.php?resultado=$valor");
        exit(); 
    }
?>