<?php
    class esfihaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
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
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM esfiha WHERE id_esfiha = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor, $tipo, $status) {    
            $comando = "INSERT INTO esfiha (nome, valor, tipo, status) VALUES ('$nome', '$valor', '$tipo', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor, $tipo, $status) {    
            $comando = "UPDATE esfiha SET nome = '$nome', valor = '$valor', tipo = '$tipo', status = '$status' WHERE id_esfiha = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>