<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/config/conexao.php';
    require_once __DIR__ . '/app/Helpers/Helper.php';

    use Eduzin\Atlas\Core\Container;

    $container = new Container($conexao);

    $usuarioService = $container->getUsuarioService();


?>