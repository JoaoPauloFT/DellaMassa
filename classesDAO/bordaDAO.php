<?php
    class bordaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM borda WHERE id_borda = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new borda();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_borda($campo["id_borda"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM borda WHERE id_borda = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor, $status) {    
            $comando = "INSERT INTO borda (nome, valor, status) VALUES ('$nome', '$valor', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor, $status) {    
            $comando = "UPDATE borda SET nome = '$nome', valor = '$valor', status = '$status' WHERE id_borda = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>