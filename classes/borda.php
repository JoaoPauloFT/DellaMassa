<?php
    class borda {
        private $id_borda;
        private $nome;
        private $valor;
        private $status;

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setId_borda($id_borda) {
            $this->id_borda = $id_borda;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_borda() {
            return $this->id_borda;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getValor() {
            return $this->valor;
        }


    }
?>