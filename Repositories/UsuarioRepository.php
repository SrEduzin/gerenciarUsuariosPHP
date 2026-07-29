<?php

    class UsuarioRepository{
        
        function __construct(private $conexao){}

        public function listar(){

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios");
            $stmt->execute();

            return $stmt->fetchAll();;

        }

        public function buscarNome($nome){

            $pesquisa = '%'.$nome.'%';

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios WHERE nome LIKE ?");

            $stmt->execute([$pesquisa]);

            return $stmt->fetchAll();
    
        }

        public function buscarId($id){

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
    
        }

        
        public function atualizar ($id, $nome, $idade){

            $stmt = $this->conexao->prepare("UPDATE usuarios SET nome = ?, idade = ? WHERE id = ?");
            $resultado = $stmt->execute([$nome, $idade, $id]);

            return $this->validarResultado($resultado);

        }

        public function salvar($nome, $idade){

            $stmt = $this->conexao->prepare("INSERT INTO usuarios(nome,idade) VALUES (?,?)");
            $resultado = $stmt->execute([$nome,$idade]);

            return $this->validarResultado($resultado);
    
        }

        public function apagar($id){

            $stmt = $this->conexao->prepare("DELETE FROM usuarios WHERE id = ?");
            $resultado = $stmt->execute([$id]);

            return $this->validarResultado($resultado);
    
        }

        private function validarResultado($resultado){

            if($resultado){

                return 'sucesso';

            }

            return 'erro';
        }
    }

?>