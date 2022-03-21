<?php
    class itemCarrinho {
        private $numero;
        private $id_item;
        private $id_item2;
        private $id_item3;
        private $id_carrinho;
        private $quantidade;
        private $descricao;
        private $id_borda;
        private $valorUnit;
        private $valorTotal;
        private $tipo;

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function setId_item($id_item) {
            $this->id_item = $id_item;
        }

        public function setId_item2($id_item2) {
            $this->id_item2 = $id_item2;
        }

        public function setId_item3($id_item3) {
            $this->id_item3 = $id_item3;
        }

        public function setId_carrinho($id_carrinho) {
            $this->id_carrinho = $id_carrinho;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setId_borda($id_borda) {
            $this->id_borda = $id_borda;
        }

        public function setValorUnit($valorUnit) {
            $this->valorUnit = $valorUnit;
        }

        public function setValorTotal($valorTotal) {
            $this->valorTotal = $valorTotal;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getNumero() {
            return $this->numero;
        }
        
        public function getId_item() {
            return $this->id_item;
        }
        
        public function getId_item2() {
            return $this->id_item2;
        }
        
        public function getId_item3() {
            return $this->id_item3;
        }
        
        public function getId_numero() {
            return $this->id_carrinho;
        }
        
        public function getQuantidade() {
            return $this->quantidade;
        }
        
        public function getDescricao() {
            return $this->descricao;
        }
        
        public function getId_borda() {
            return $this->id_borda;
        }
        
        public function getValorUnit() {
            return $this->valorUnit;
        }
        
        public function getValorTotal() {
            return $this->valorTotal;
        }
        
        public function getTipo() {
            return $this->tipo;
        }       
        
    }
?>