<?php
    class borda {
        private $id_borda;
        private $nome;
        private $valor;

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