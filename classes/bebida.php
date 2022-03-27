<?php
    class bebida {
        private $id_bebida;
        private $nome;
        private $quantidade;
        private $valor;
        private $status;

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setId_bebida($id_bebida) {
            $this->id_bebida = $id_bebida;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_bebida() {
            return $this->id_bebida;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function getValor() {
            return $this->valor;
        }


    }
?>