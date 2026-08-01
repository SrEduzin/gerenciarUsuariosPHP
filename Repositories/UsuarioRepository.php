<?php

    //FUNÇÕES PARA INJEÇÃO NO BANCO DE DADOS
    class UsuarioRepository{
        
        //PEGA CONEXÃO NO CONSTRUCT
        function __construct(private $conexao){}

        //LISTA OS USUARIOS
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

        //BUSCA PELO NOME DO USUÁRIO
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

        //BUSCA PELO ID DO USUARIO
        public function buscarId($id){

            $stmt = $this->conexao->prepare("SELECT id, nome, idade FROM usuarios WHERE id = ?");
            $stmt->execute([$id]);
            $usuario = $stmt->fetch();

            return new Usuario($usuario['id'], $usuario['nome'], $usuario['idade']);
    
        }

        //ATUALIZA OS DADOS DO USUÁRIO
        public function atualizar (Usuario $usuario){

            $stmt = $this->conexao->prepare("UPDATE usuarios SET nome = ?, idade = ? WHERE id = ?");
            $resultado = $stmt->execute([$usuario->getNome(), $usuario->getIdade(), $usuario->getId()]);

            return $resultado;

        }

        //SALVA UM USUARIO
        public function salvar(Usuario $usuario){

            $stmt = $this->conexao->prepare("INSERT INTO usuarios(nome,idade) VALUES (?,?)");
            $resultado = $stmt->execute([$usuario->getNome(),$usuario->getIdade()]);

            return $resultado;
    
        }

        //APAGA UM USUARIO
        public function apagar(Usuario $usuario){

            $stmt = $this->conexao->prepare("DELETE FROM usuarios WHERE id = ?");
            $resultado = $stmt->execute([$usuario->getId()]);

            return $resultado;
    
        }

    }

?>