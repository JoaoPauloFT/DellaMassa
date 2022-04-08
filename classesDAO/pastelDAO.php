<?php
    class pastelDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM pastel WHERE id_pastel = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new pastel();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_pastel($campo["id_pastel"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM pastel WHERE id_pastel = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor, $status) {    
            $comando = "INSERT INTO pastel (nome, valor, status) VALUES ('$nome', '$valor', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor, $status) {    
            $comando = "UPDATE pastel SET nome = '$nome', valor = '$valor', status = '$status' WHERE id_pastel = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>