<?php
    require_once __DIR__ . '/../../bootstrap.php';

    use Eduzin\Atlas\Models\Usuario;
        
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