<?php
    class clienteDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id_cliente) {    
            $comando = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente';";
            $result = mysqli_query($this->conn, $comando);
            $cliente = new cliente();
            while ($campo=mysqli_fetch_array($result)){
                $cliente->setId_cliente($campo["id_cliente"]);
                $cliente->setNome($campo["nome"]);
                $cliente->setEmail($campo["email"]);
                $cliente->setCelular($campo["celular"]);
            }
            return $cliente;
        }

        public function editar($id, $nome, $email, $celular) {
            $comando = "UPDATE cliente SET nome = '$nome', email = '$email', celular = '$celular' WHERE id_cliente = '$id';";
            $result = mysqli_query($this->conn, $comando);
            
        }
        
        public function excluir($id_cliente) {    
            $comando = "DELETE FROM cliente WHERE id_cliente = '$id_cliente';";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>