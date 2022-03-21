<?php
    class bebidaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM bebida WHERE id_bebida = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new bebida();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_bebida($campo["id_bebida"]);
                $a->setNome($campo["nome"]);
                $a->setQuantidade($campo["quantidade"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM bebida WHERE id_bebida = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $quantidade, $valor) {    
            $comando = "INSERT INTO bebida (nome, quantidade, valor) VALUES ('$nome', '$quantidade', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $quantidade, $valor) {    
            $comando = "UPDATE bebida SET nome = '$nome', quantidade = '$quantidade', valor = '$valor' WHERE id_bebida = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>