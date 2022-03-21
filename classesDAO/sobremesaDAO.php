<?php
    class sobremesaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM sobremesa WHERE id_sobremesa = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new sobremesa();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_sobremesa($campo["id_sobremesa"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM sobremesa WHERE id_sobremesa = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor) {    
            $comando = "INSERT INTO sobremesa (nome, valor) VALUES ('$nome', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor) {    
            $comando = "UPDATE sobremesa SET nome = '$nome', valor = '$valor' WHERE id_sobremesa = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>