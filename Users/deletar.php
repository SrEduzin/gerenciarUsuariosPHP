<?php
    require_once('../bootstrap.php');

    $usuarioRepository = new UsuarioRepository($conexao);
    $usuarioValidation = new UsuarioValidation();
    $usuarioService = new UsuarioService($usuarioRepository, $usuarioValidation);
        
    $id = limparPost($_GET['id']);
        
    $resultado = $usuarioService->deletar($id);

    if($resultado == 'sucesso'){

        header('location: listar.php');
        exit();

    }else{
        header('location: listar.php?resultado=erro');
    }

?>