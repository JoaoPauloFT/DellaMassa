<?php
    class cliente {
        private $id_cliente;
        private $nome;
        private $celular;
        private $email;

        public function setId_cliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setCelular($celular) {
            $this->celular = $celular;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getId_cliente() {
            return $this->id_cliente;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getCelular() {
            return $this->celular;
        }

        public function getEmail() {
            return $this->email;
        }

    }
?>