<?php

require('functions.php');

if(empty($_POST["nome"]) or empty($_POST["idade"])){
    
    echo("Preencha todos os campos!");

}else{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    atualizarUsuario($id, $nome, $idade, $conexao);
    
    echo(" Usuário Atualizado com Sucesso!");
    header('location: listar.php');

    };

?>