<?php
    class esfiha {
        private $id_esfiha;
        private $nome;
        private $tipo;
        private $valor;

        public function setId_esfiha($id_esfiha) {
            $this->id_esfiha = $id_esfiha;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getId_esfiha() {
            return $this->id_esfiha;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getValor() {
            return $this->valor;
        }


    }
?>