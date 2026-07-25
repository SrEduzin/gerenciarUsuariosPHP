<?php
    require('functions.php');

    if(isset($_GET['id'])){
        
        $id = $_GET['id'];
        
        apagarUsuario($id, $conexao);

        header('location: listar.php');
        exit();
    };

?>