<?php

    namespace Eduzin\Atlas\Core;

    use PDO;
    use Eduzin\Atlas\Contracts\UsuarioRepositoryInterface;
use Eduzin\Atlas\Repositories\UsuarioRepository;
use Eduzin\Atlas\Validations\UsuarioValidation;
    use Eduzin\Atlas\Services\UsuarioService;

    class Container {

        private PDO $conexao;
        private ?UsuarioRepositoryInterface $usuarioRepository = null;
        private ?UsuarioValidation $usuarioValidation = null;
        private ?UsuarioService $usuarioService = null;

        function __construct(PDO $conexao){
            $this->conexao = $conexao;
        }

        function getUsuarioService(){

            if($this->usuarioService === null){

                $this->usuarioRepository = new UsuarioRepository($this->conexao);
                $this->usuarioValidation = new UsuarioValidation();
                $this->usuarioService = new UsuarioService($this->usuarioRepository, $this->usuarioValidation);

            }
            
            return $this->usuarioService;
        }

    }


?>