<?php
    class itemCarrinhoDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id_carrinho) {
            require "../classes/itemCarrinho.php";
            $comando = "SELECT * FROM itemcarrinho WHERE id_carrinho = '$id_carrinho';";
            $result = mysqli_query($this->conn, $comando);
            $listItemCarrinho = [];
            while ($campo=mysqli_fetch_array($result)){
                $itemCarrinho = new itemCarrinho();
                $itemCarrinho->setNumero($campo["id_item_carrinho"]);
                $itemCarrinho->setId_item($campo["id_item"]);
                $itemCarrinho->setId_item2($campo["id_item2"]);
                $itemCarrinho->setId_item3($campo["id_item3"]);
                $itemCarrinho->setId_carrinho($campo["id_carrinho"]);
                $itemCarrinho->setQuantidade($campo["quantidade"]);
                $itemCarrinho->setDescricao($campo["descricao"]);
                $itemCarrinho->setId_borda($campo["id_borda"]);
                $itemCarrinho->setValorUnit($campo["valorUnit"]);
                $itemCarrinho->setValorTotal($campo["valorTotal"]);
                $itemCarrinho->setTipo($campo["tipo"]);
                $listItemCarrinho[] = $itemCarrinho;
            }
            return $listItemCarrinho;
        }

        public function pesquisaNome($id, $tipo) {
            $comando = "SELECT * FROM $tipo WHERE id_$tipo = '$id';";
            $result = mysqli_query($this->conn, $comando);
            while ($campo=mysqli_fetch_array($result)){
                $nome = $campo["nome"];
            }
            return $nome;
        }
    }
