<?php
    class pastelDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM pastel WHERE id_pastel = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new pastel();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_pastel($campo["id_pastel"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM pastel WHERE id_pastel = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor) {    
            $comando = "INSERT INTO pastel (nome, valor) VALUES ('$nome', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor) {    
            $comando = "UPDATE pastel SET nome = '$nome', valor = '$valor' WHERE id_pastel = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>