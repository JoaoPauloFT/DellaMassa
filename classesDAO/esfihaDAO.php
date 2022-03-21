<?php
    class esfihaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM esfiha WHERE id_esfiha = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new esfiha();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_esfiha($campo["id_esfiha"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setTipo($campo["tipo"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM esfiha WHERE id_esfiha = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor, $tipo) {    
            $comando = "INSERT INTO esfiha (nome, valor, tipo) VALUES ('$nome', '$valor', '$tipo')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor, $tipo) {    
            $comando = "UPDATE esfiha SET nome = '$nome', valor = '$valor', tipo = '$tipo' WHERE id_esfiha = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>