<?php
    require('functions.php');
    
    $id = $_GET['id'];

    $user = buscarIdDeUsuario($id,$conexao);
    
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <h1>Editar</h1>
    <form action="atualizar.php" method="post">
        <input name="id" type="hidden" value="<?= $user['id']?>" >
        <label for="nome">Nome</label>
        <input name="nome" value="<?= $user['nome']?>" id="nome" type="text" placeholder="Digite seu nome" >
        <label for="idade">Idade</label>
        <input name="idade" value="<?= $user['idade']?>" id="idade" type="number" placeholder="Digite sua idade" >
        <button type="submit">editar</button>
    </form>

    <a href="listar.php">lista de Usuários</a>
</body>
</html>