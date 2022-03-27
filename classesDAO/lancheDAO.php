<?php
    class lancheDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM lanche WHERE id_lanche = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new lanche();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_lanche($campo["id_lanche"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setIngrediente($campo["ingrediente"]);
                $a->setValorDuplo($campo["valorDuplo"]);
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM lanche WHERE id_lanche = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $ingrediente, $valor, $valorDuplo, $status) {    
            $comando = "INSERT INTO lanche (nome, valor, ingrediente, valorDuplo, status) VALUES ('$nome', '$valor', '$ingrediente', '$valorDuplo', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $ingrediente, $valor, $valorDuplo, $status) {    
            $comando = "UPDATE lanche SET nome = '$nome', ingrediente = '$ingrediente', valor = '$valor', status = '$status', valorDuplo = '$valorDuplo' WHERE id_lanche = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>