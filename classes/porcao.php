<?php
    class porcao {
        private $id_porcao;
        private $nome;
        private $ingrediente;
        private $valor;

        public function setId_porcao($id_porcao) {
            $this->id_porcao = $id_porcao;
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

        public function getId_porcao() {
            return $this->id_porcao;
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