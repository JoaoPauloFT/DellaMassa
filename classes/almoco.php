<?php
    class almoco {
        private $id_almoco;
        private $nome;
        private $ingrediente;
        private $valor;

        public function setId_almoco($id_almoco) {
            $this->id_almoco = $id_almoco;
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

        public function getId_almoco() {
            return $this->id_almoco;
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