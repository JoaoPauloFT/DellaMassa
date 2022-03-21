<?php
    class pizza {
        private $id_pizza;
        private $nome;
        private $ingrediente;
        private $tipoPizza;
        private $broto;
        private $grande;

        public function setId_pizza($id_pizza) {
            $this->id_pizza = $id_pizza;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function setIngrediente($ingrediente) {
            $this->ingrediente = $ingrediente;
        }

        public function setBroto($broto) {
            $this->broto = $broto;
        }

        public function setTipoPizza($tipoPizza) {
            $this->tipoPizza = $tipoPizza;
        }

        public function setGrande($grande) {
            $this->grande = $grande;
        }

        public function getId_pizza() {
            return $this->id_pizza;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getIngrediente() {
            return $this->ingrediente;
        }

        public function getBroto() {
            return $this->broto;
        }

        public function getTipoPizza() {
            return $this->tipoPizza;
        }

        public function getGrande() {
            return $this->grande;
        }


    }
?>