<?php

    namespace Eduzin\Atlas\Services;

    use Eduzin\Atlas\Contracts\UsuarioRepositoryInterface;
    use Eduzin\Atlas\Models\Usuario;
    use Eduzin\Atlas\Validations\UsuarioValidation;

    //GERENCIADOR DE USUARIO
    class UsuarioService{

        //REQUERE OUTROS OBJETOS
        public function __construct(
            private UsuarioRepositoryInterface $usuarioRepository, 
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
            
            return $this->usuarioRepository->atualizar($usuario)
            ? 'sucesso'
            : 'erro';

        }

        //PEDE PARA O BANCO APAGAR USUARIO
        public function deletar(Usuario $usuario){

            return $this->usuarioRepository->apagar($usuario)
            ? 'sucesso'
            : 'erro';
            
        }

        public function editar(Usuario $usuario){

            return $this->usuarioRepository->atualizar($usuario);
        }

        public function listar(){

            return $this->usuarioRepository->listar();

        }

        public function buscarNome($nome){

            return $this->usuarioRepository->buscarNome($nome);

        }

        public function buscarId($id){

            return $this->usuarioRepository->buscarId($id);

        }
    }

?>