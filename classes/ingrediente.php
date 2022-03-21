<?php
    class ingrediente {
        private $id_ingrediente;
        private $nome;
        private $valor;

        public function setId_ingrediente($id_ingrediente) {
            $this->id_ingrediente = $id_ingrediente;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_ingrediente() {
            return $this->id_ingrediente;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getValor() {
            return $this->valor;
        }

    }
?>