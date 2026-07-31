<?php

require_once('../bootstrap.php');

$usuarioRepository = new UsuarioRepository($conexao);
$usuarioValidation = new UsuarioValidation();
$UsuarioService = new UsuarioService($usuarioRepository, $usuarioValidation);

    $id = limparpost($_POST["id"]);
    $nome = limparPost($_POST["nome"]);
    $idade = limparPost( $_POST["idade"]);

    $resultado = $UsuarioService->atualizar($id, $nome, $idade);
    
    if($resultado == "sucesso"){

        header('location: listar.php');

    }else{

        header('location:editar.php');

    }


?>