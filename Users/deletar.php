<?php
    require_once('../bootstrap.php');

    $usuarioRepository = new UsuarioRepository($conexao);
    $usuarioValidation = new UsuarioValidation();
    $usuarioService = new UsuarioService($usuarioRepository, $usuarioValidation);
        
    $id = limparPost($_GET['id']);

    $usuario = new Usuario(
        $id,
        $nome  = '',
        $idade = 0
    );
        
    $resultado = $usuarioService->deletar($usuario);

    if($resultado == 'sucesso'){

        header('location: listar.php');
        exit();

    }else{
        header('location: listar.php?resultado=erro');
    }

?>