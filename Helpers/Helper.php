<?php
    function limparPost($dado){
        $dado = trim($dado);
        $dado = strip_tags($dado);
        $dado = htmlspecialchars($dado);

        return $dado;
    };

?>