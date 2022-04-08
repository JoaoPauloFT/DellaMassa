<?php
    class bebidaDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM bebida WHERE id_bebida = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new bebida();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_bebida($campo["id_bebida"]);
                $a->setNome($campo["nome"]);
                $a->setQuantidade($campo["quantidade"]);
                $a->setValor($campo["valor"]);
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM bebida WHERE id_bebida = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $quantidade, $valor, $status) {    
            $comando = "INSERT INTO bebida (nome, quantidade, valor, status) VALUES ('$nome', '$quantidade', '$valor', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $quantidade, $valor, $status) {    
            $comando = "UPDATE bebida SET nome = '$nome', quantidade = '$quantidade', valor = '$valor', status = '$status' WHERE id_bebida = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>