<?php

    namespace Eduzin\Atlas\Models;
    
    //OBJETO USUARIO || CONTÉM PROPRIEDADES DO USUARIO
    class Usuario{

        //DECLARA MÉTODOS A CADA OBJETO RECÉM CRIADO

        function __construct(
            private ?int $id,
            private string $nome,
            private int $idade
        ){}

        //PEGA O ID
        function getId(){

            return $this->id;

        }

        //PEGA O NOME
        function getNome(){

            return $this->nome;
            
        }

        //PEGA A IDADE
        function getIdade(){

            return $this->idade;
            
        }

        //DEFINE ID
        function setId($id){

            $this->id = $id;

        }

        //DEFINE NOME
        function setNome($nome){

            $this->nome = $nome;
            
        }

        //DEFINE IDADE
        function setIdade($idade){

            $this->idade = $idade;
            
        }
    }


?>