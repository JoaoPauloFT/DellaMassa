<?php
    class bordaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM borda WHERE id_borda = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new borda();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_borda($campo["id_borda"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM borda WHERE id_borda = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor) {    
            $comando = "INSERT INTO borda (nome, valor) VALUES ('$nome', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor) {    
            $comando = "UPDATE borda SET nome = '$nome', valor = '$valor' WHERE id_borda = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>