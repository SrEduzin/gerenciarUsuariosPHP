<?php
    require_once('../config/conexao.php');
    
    function listarUsuarios($conexao){

        $stmt = $conexao->prepare("SELECT id, nome, idade FROM usuarios");
        $stmt->execute();
        $usuarios = $stmt->fetchAll();
        return $usuarios;

    }

    function buscarNomeDeUsuario($nome, $conexao){

        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE nome LIKE ?");
        $pesquisa = '%'.$nome.'%';
        $stmt->execute([$pesquisa]);
        return $stmt->fetchAll();

    };

    function buscarIdDeUsuario($id,$conexao){

        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();

    };

    function atualizarUsuario ($id, $nome, $idade, $conexao){

        $stmt = $conexao->prepare("UPDATE usuarios SET nome = ?, idade = ? WHERE id = ?");
        return $stmt->execute([$nome, $idade, $id]);

    };

    function salvarUsuario($nome, $idade, $conexao){

        $stmt = $conexao->prepare("INSERT INTO usuarios(nome,idade) VALUES (?,?)");
        return $stmt->execute([$nome,$idade]);

    };

    function apagarUsuario($id, $conexao){

        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);

    };

    function validarUsuario($nome, $idade){
        if(empty($nome)){
            return 'erroNomeVazio';
        };
        if(strlen($nome) < 3){
            return 'erroCaractere';
        };
        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/u", $nome)){
            return "erroEspeciais";
        };
        if(empty($idade)){
            return 'erroVazioIdade';
        };
        if($idade < 0 || $idade > 120){
            return "erroIdadeInvalida";
        };
        return null;

    }

    function limparPost($dado){
        $dado = htmlspecialchars($dado);
        $dado = trim($dado);
        $dado = strip_tags($dado);

        return $dado;
    };
?>