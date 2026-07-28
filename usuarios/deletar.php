<?php
    require_once('../config/conexao.php');
    require_once('../Repositories/UsuarioRepository.php');
    $usuarioRepository = new UsuarioRepository($conexao);
    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        
        $usuarioRepository->apagar($id, $conexao);

        header('location: listar.php');
        exit();
    };

?>