<?php

    require_once('../bootstrap.php');


    $usuarioRepository = new UsuarioRepository($conexao);
    $usuarioValidation = new UsuarioValidation();
    $usuarioService = new UsuarioService($usuarioRepository, $usuarioValidation);

    $nome = limparPost($_POST["nome"]);
    $idade = limparPost($_POST["idade"]);

    $resultado = $usuarioService->cadastrar($nome, $idade);

    if($resultado == 'sucesso'){
        
        header('location:listar.php?resultado=sucesso');
        exit();

    }else{
        
        header("location:cadastrar.php?resultado=$resultado");
        exit();
    }


?>