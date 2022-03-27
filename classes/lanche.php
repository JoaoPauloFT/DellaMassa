<?php
    class lanche {
        private $id_lanche;
        private $nome;
        private $ingrediente;
        private $valor;
        private $valorDuplo;
        private $status;

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setId_lanche($id_lanche) {
            $this->id_lanche = $id_lanche;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setIngrediente($ingrediente) {
            $this->ingrediente = $ingrediente;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setValorDuplo($valorDuplo) {
            $this->valorDuplo = $valorDuplo;
        }

        public function getId_lanche() {
            return $this->id_lanche;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getIngrediente() {
            return $this->ingrediente;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getValorDuplo() {
            return $this->valorDuplo;
        }


    }
?>