<?php

    class Usuario{

        

        function __construct(
            private ?int $id,
            private string $nome,
            private int $idade
        ){}

        function getId(){

            return $this->id;

        }

        function getNome(){

            return $this->nome;
            
        }

        function getIdade(){

            return $this->idade;
            
        }

        function setId($id){

            $this->id = $id;

        }

        function setNome($nome){

            $this->nome = $nome;
            
        }

        function setIdade($idade){

            $this->idade = $idade;
            
        }
    }


?>