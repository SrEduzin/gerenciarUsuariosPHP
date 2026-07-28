<?php
    
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

?>