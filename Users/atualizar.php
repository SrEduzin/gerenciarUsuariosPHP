<?php

require_once('../bootstrap.php');

$usuarioRepository = new UsuarioRepository($conexao);
$usuarioValidation = new UsuarioValidation();
$UsuarioService = new UsuarioService($usuarioRepository, $usuarioValidation);

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    $resultado = $UsuarioService->atualizar($id, $nome, $idade);
    
    if($resultado == "sucesso"){

        header('location: listar.php');

    }else{

        header('location:editar.php');

    }


?>