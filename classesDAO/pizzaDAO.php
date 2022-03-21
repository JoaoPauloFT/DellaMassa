<?php
    class pizzaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM pizza WHERE id_pizza = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new pizza();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_pizza($campo["id_pizza"]);
                $a->setNome($campo["nome"]);
                $a->setIngrediente($campo["ingrediente"]);
                $a->setTipoPizza($campo["tipoPizza"]);
                $a->setBroto($campo["valorBroto"]);
                $a->setGrande($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM pizza WHERE id_pizza = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $ingrediente, $tipoPizza, $broto, $grande) {    
            $comando = "INSERT INTO pizza (nome, valorBroto, ingrediente, valor, tipoPizza) VALUES ('$nome', '$broto', '$ingrediente', '$grande', '$tipoPizza')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $ingrediente, $tipoPizza, $broto, $grande) {    
            $comando = "UPDATE pizza SET nome = '$nome', ingrediente = '$ingrediente', tipoPizza = '$tipoPizza', valor = '$grande', valorBroto = '$broto' WHERE id_pizza = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>