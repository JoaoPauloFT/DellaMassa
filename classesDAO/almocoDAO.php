<?php
    class almocoDAO {
        protected $conn;
        public function __construct() {
            include "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM almoco WHERE id_almoco = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new almoco();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_almoco($campo["id_almoco"]);
                $a->setNome($campo["nome"]);
                $a->setingrediente($campo["ingrediente"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function pesquisarImprimir($id, $conex) {    
            $comando = "SELECT * FROM almoco WHERE id_almoco = '$id';";
            $result = mysqli_query($conex, $comando);
            $a = new almoco();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_almoco($campo["id_almoco"]);
                $a->setNome($campo["nome"]);
                $a->setingrediente($campo["ingrediente"]);
                $a->setValor($campo["valor"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM almoco WHERE id_almoco = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $ingrediente, $valor) {    
            $comando = "INSERT INTO almoco (nome, ingrediente, valor) VALUES ('$nome', '$ingrediente', '$valor')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $ingrediente, $valor) {    
            $comando = "UPDATE almoco SET nome = '$nome', ingrediente = '$ingrediente', valor = '$valor' WHERE id_almoco = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>