<?php
    class funcionario {
        
        private $id_func;
        private $nome;
        private $login;
        private $senha;

        public function setId_func($id_func) {
            $this->id_func = $id_func;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setLogin($login) {
            $this->login = $login;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getId_func() {
            return $this->id_func;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getLogin() {
            return $this->login;
        }

        public function getSenha() {
            return $this->senha;
        }

    }
?>