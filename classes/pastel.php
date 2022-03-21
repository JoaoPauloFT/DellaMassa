<?php
    class pastel {
        private $id_pastel;
        private $nome;
        private $valor;

        public function setId_pastel($id_pastel) {
            $this->id_pastel = $id_pastel;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_pastel() {
            return $this->id_pastel;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getValor() {
            return $this->valor;
        }

    }
?>