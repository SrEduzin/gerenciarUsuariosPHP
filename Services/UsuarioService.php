<?php

    class UsuarioService{

        public function __construct(
            private UsuarioRepository $usuarioRepository, 
            private UsuarioValidation $usuarioValidation
            ){}

        public function cadastrar($nome, $idade){

                $resultado = $this->usuarioValidation->validarUsuario($nome, $idade);

                if($resultado != 'validado'){

                    return $resultado;

                };
                
                $salvou = $this->usuarioRepository->salvar($nome, $idade);

                if($salvou){

                    return 'sucesso';

                };

                return 'erro';

        }

        public function atualizar($id, $nome, $idade){

            $resultado = $this->usuarioValidation->validarUsuario($nome,$idade);

            if($resultado != 'validado'){

                return $resultado;

            }
            
            $atualizou = $this->usuarioRepository->atualizar($id, $nome, $idade);

            if ($atualizou){

                return "sucesso";
                
            }

            return 'erro';
        }

        public function deletar($id){

            $resultado = $this->usuarioRepository->apagar($id);
            
            if($resultado){

                return 'sucesso';

            }

            return 'erro';
        }
    }

?>