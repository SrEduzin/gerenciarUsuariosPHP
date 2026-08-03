<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/config/conexao.php';
    require_once __DIR__ . '/app/Helpers/Helper.php';

    use Eduzin\Atlas\Repositories\UsuarioRepository;
    use Eduzin\Atlas\Services\UsuarioService;
    use Eduzin\Atlas\Validations\UsuarioValidation;


    $usuarioRepository = new UsuarioRepository($conexao);
    $usuarioValidation = new UsuarioValidation();

    $usuarioService = new UsuarioService(

        $usuarioRepository,
        $usuarioValidation

    );
?>