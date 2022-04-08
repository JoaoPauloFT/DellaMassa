<?php
    class ingredienteDAO {
        protected $conn;
        public function __construct() {
            include "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id) {    
            $comando = "SELECT * FROM ingrediente WHERE id_ingrediente = '$id';";
            $result = mysqli_query($this->conn, $comando);
            $a = new ingrediente();
            while ($campo=mysqli_fetch_array($result)){
                $a->setId_ingrediente($campo["id_ingrediente"]);
                $a->setNome($campo["nome"]);
                $a->setValor($campo["valor"]);
                $a->setStatus($campo["status"]);
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
                $a->setStatus($campo["status"]);
            }
            return $a;
        }
        
        public function excluir($id) {    
            $comando = "DELETE FROM ingrediente WHERE id_ingrediente = '$id';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $valor, $status) {    
            $comando = "INSERT INTO ingrediente (nome, valor, status) VALUES ('$nome', '$valor', '$status')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $valor, $status) {    
            $comando = "UPDATE ingrediente SET nome = '$nome', valor = '$valor', status = '$status' WHERE id_ingrediente = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>