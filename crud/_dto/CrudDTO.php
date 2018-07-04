<?php

    // Classe Crud
    class CrudDTO {

        // Variaveis
        private $id;
        private $nome;
        private $sobrenome;
        private $idade;

        public function __construct() {}

        // GET id
        public function getId(){
            return $this->id;
        }

        // SET id
        public function setId($id) {
            $this->id = $id;
        }

        // GET nome
        public function getNome(){
            return $this->nome;
        }

        // SET nome
        public function setNome($nome) {
            $this->nome = $nome;
        }

        // GET sobrenome
        public function getSobrenome(){
            return $this->sobrenome;
        }

        // SET sobrenome
        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }

        // GET idade
        public function getIdade(){
            return $this->idade;
        }

        // SET idade
        public function setIdade($idade) {
            $this->idade = $idade;
        }

    } 

?>