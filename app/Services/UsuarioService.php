<?php

    namespace Eduzin\Atlas\Services;

    use Eduzin\Atlas\Models\Usuario;
    use Eduzin\Atlas\Repositories\UsuarioRepository;
    use Eduzin\Atlas\Validations\UsuarioValidation;

    //GERENCIADOR DE USUARIO
    class UsuarioService{

        //REQUERE OUTROS OBJETOS
        public function __construct(
            private UsuarioRepository $usuarioRepository, 
            private UsuarioValidation $usuarioValidation
            ){}

        //PEDE PARA O BANCO SALVAR USUARIO
        public function cadastrar(Usuario $usuario){

                $resultado = $this->usuarioValidation->validarUsuario($usuario);

                if($resultado != 'validado'){

                    return $resultado;

                };
                
                return $this->usuarioRepository->salvar($usuario)
                ? 'sucesso'
                : 'erro';

        }

        //PEDE PRO BANCO PARA ATUALIZAR USUARIO
        public function atualizar(Usuario $usuario){

            $resultado = $this->usuarioValidation->validarUsuario($usuario);

            if($resultado != 'validado'){

                return $resultado;

            }
            
            $atualizou = $this->usuarioRepository->atualizar($usuario);

            if ($atualizou){

                return "sucesso";
                
            }

            return 'erro';
        }

        //PEDE PARA O BANCO APAGAR USUARIO
        public function deletar(Usuario $usuario){

            $resultado = $this->usuarioRepository->apagar($usuario);
            
            if($resultado){

                return 'sucesso';

            }

            return 'erro';
        }
    }

?>