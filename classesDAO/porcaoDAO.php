<?php
    class porcaoDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM porcao WHERE id_porcao = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new porcao();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_porcao($campo["id_porcao"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setIngrediente($campo["ingrediente"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM porcao WHERE id_porcao = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $ingrediente, $valor) {    
            $comando = "INSERT INTO porcao (nome, valor, ingrediente) VALUES ('$nome', '$valor', '$ingrediente')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $ingrediente, $valor) {    
            $comando = "UPDATE porcao SET nome = '$nome', ingrediente = '$ingrediente', valor = '$valor' WHERE id_porcao = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>