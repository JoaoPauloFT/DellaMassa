<?php
    class ingredienteDAO {
        protected $conn;
        public function __construct() {
            include "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM ingrediente WHERE id_ingrediente = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new ingrediente();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_ingrediente($campo["id_ingrediente"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }

        public function pesquisarImprimir($id, $conex) {    
            $comando = "SELECT * FROM ingrediente WHERE id_ingrediente = '$id';";
            $result = mysqli_query($conex, $comando);
            $a = new ingrediente();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_ingrediente($campo["id_ingrediente"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM ingrediente WHERE id_ingrediente = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor) {    
            $comando = "INSERT INTO ingrediente (nome, valor) VALUES ('$nome', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor) {    
            $comando = "UPDATE ingrediente SET nome = '$nome', valor = '$valor' WHERE id_ingrediente = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>