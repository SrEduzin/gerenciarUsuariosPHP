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
?>