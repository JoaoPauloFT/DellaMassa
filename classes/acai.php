<?php
    class acai {
        private $id_acai;
        private $nome;
        private $ingrediente;
        private $valor;

        public function setId_acai($id_acai) {
            $this->id_acai = $id_acai;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setingrediente($ingrediente) {
            $this->ingrediente = $ingrediente;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_acai() {
            return $this->id_acai;
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


    }
?>