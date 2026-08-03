<?php

    require_once __DIR__ . '../../../bootstrap.php';
    use Eduzin\Atlas\Models\Usuario;

    $id = limparpost($_POST["id"]);
    $nome = limparPost($_POST["nome"]);
    $idade = limparPost( $_POST["idade"]);
    $usuario = new Usuario(
        $id,
        $nome,
        $idade
    );

    $resultado = $usuarioService->atualizar($usuario);
    
    if($resultado == "sucesso"){

        header('location: listar.php');

    }else{

        header('location:editar.php');

    }


?>