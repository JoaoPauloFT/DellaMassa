<?php
    class acaiDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM acai WHERE id_acai = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new acai();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_acai($campo["id_acai"]);
                $a->setNome($campo["nome"]);
                $a->setingrediente($campo["ingrediente"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM acai WHERE id_acai = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $ingrediente, $valor) {    
            $comando = "INSERT INTO acai (nome, ingrediente, valor) VALUES ('$nome', '$ingrediente', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $ingrediente, $valor) {    
            $comando = "UPDATE acai SET nome = '$nome', ingrediente = '$ingrediente', valor = '$valor' WHERE id_acai = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>