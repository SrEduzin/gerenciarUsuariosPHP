<?php

    class UsuarioService{

        public function __construct(
            private UsuarioRepository $usuarioRepository, 
            private UsuarioValidation $usuarioValidation
            ){}

        public function cadastrar(Usuario $usuario){

                $resultado = $this->usuarioValidation->validarUsuario($usuario);

                if($resultado != 'validado'){

                    return $resultado;

                };
                
                $salvou = $this->usuarioRepository->salvar($usuario);

                if($salvou){

                    return 'sucesso';

                };

                return 'erro';

        }

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

        public function deletar(Usuario $usuario){

            $resultado = $this->usuarioRepository->apagar($usuario);
            
            if($resultado){

                return 'sucesso';

            }

            return 'erro';
        }
    }

?>