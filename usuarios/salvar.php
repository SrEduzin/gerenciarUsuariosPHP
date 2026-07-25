<?php

require_once("functions.php");

if(empty($_POST["nome"]) or empty($_POST["idade"])){
    
    header("location: listar.php?resultado=erro");

}else{

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    salvarUsuario($nome,$idade, $conexao);
    
    header("location: listar.php?resultado=sucesso");
    exit();
};

?>