<?php

require_once('../config/conexao.php');
require_once('../Repositories/UsuarioRepository.php');
$usuarioRepository = new UsuarioRepository($conexao);

if(empty($_POST["nome"]) or empty($_POST["idade"])){
    
    echo("Preencha todos os campos!");

}else{
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    $usuarioRepository->atualizar($id, $nome, $idade, $conexao);
    
    echo(" Usuário Atualizado com Sucesso!");
    header('location: listar.php');

    };

?>