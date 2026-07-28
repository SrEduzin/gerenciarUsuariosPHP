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

            return $stmt->execute([$nome, $idade, $id]);

        }

        public function salvar($nome, $idade){

            $stmt = $this->conexao->prepare("INSERT INTO usuarios(nome,idade) VALUES (?,?)");

            return $stmt->execute([$nome,$idade]);
    
        }

        public function apagar($id){

            $stmt = $this->conexao->prepare("DELETE FROM usuarios WHERE id = ?");
            
            return $stmt->execute([$id]);
    
        }
    }

?>