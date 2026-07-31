<?php

    class UsuarioRepository{
        
        function __construct(private $conexao){}

        public function listar(){

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios");
            $stmt->execute();

            $lista = $stmt->fetchAll();;
            $usuario = [];

            foreach ($lista as $dadosUsuario) {

                $usuario[] = new Usuario($dadosUsuario['id'], $dadosUsuario['nome'], $dadosUsuario['idade']);

            }

            return $usuario;

        }

        public function buscarNome($nome){

            $pesquisa = '%'.$nome.'%';

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios WHERE nome LIKE ?");

            $stmt->execute([$pesquisa]);

            $lista = $stmt->fetchAll();;
            $usuario = [];

            foreach ($lista as $dadosUsuario) {

                $usuario[] = new Usuario($dadosUsuario['id'], $dadosUsuario['nome'], $dadosUsuario['idade']);

            }

            return $usuario;
    
        }

        public function buscarId($id){

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios WHERE id = ?");
            $stmt->execute([$id]);
            $usuario = $stmt->fetch();

            return new Usuario($usuario['id'], $usuario['nome'], $usuario['idade']);
    
        }

        
        public function atualizar (Usuario $usuario){

            $stmt = $this->conexao->prepare("UPDATE usuarios SET nome = ?, idade = ? WHERE id = ?");
            $resultado = $stmt->execute([$usuario->getNome(), $usuario->getIdade(), $usuario->getId()]);

            return $this->validarResultado($resultado);

        }

        public function salvar(Usuario $usuario){

            $stmt = $this->conexao->prepare("INSERT INTO usuarios(nome,idade) VALUES (?,?)");
            $resultado = $stmt->execute([$usuario->getNome(),$usuario->getIdade()]);

            return $this->validarResultado($resultado);
    
        }

        public function apagar(Usuario $usuario){

            $stmt = $this->conexao->prepare("DELETE FROM usuarios WHERE id = ?");
            $resultado = $stmt->execute([$usuario->getId()]);

            return $this->validarResultado($resultado);
    
        }

        private function validarResultado($resultado){

            if($resultado){

                return true;

            }

            return false;
        }
    }

?>