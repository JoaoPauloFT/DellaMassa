<?php
    class sobremesa {
        private $id_sobremesa;
        private $nome;
        private $valor;
        private $status;

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setId_sobremesa($id_sobremesa) {
            $this->id_sobremesa = $id_sobremesa;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_sobremesa() {
            return $this->id_sobremesa;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getValor() {
            return $this->valor;
        }

    }
?>