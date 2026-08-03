<?php

    require_once __DIR__ . '../../../bootstrap.php';

    use Eduzin\Atlas\Models\Usuario;


    $nome = limparPost($_POST["nome"]);
    $idade = limparPost($_POST["idade"]);

    $usuario = new Usuario(

        null,
        $nome,
        $idade

    );

    $resultado = $usuarioService->cadastrar($usuario);

    if($resultado == 'sucesso'){
        
        header('location:listar.php?resultado=sucesso');
        exit();

    }else{
        
        header("location:cadastrar.php?resultado=$resultado");
        exit();
    }


?>