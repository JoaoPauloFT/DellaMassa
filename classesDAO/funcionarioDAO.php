<?php
    class funcionarioDAO {
        protected $conn;
        public function __construct() {
            require "../../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
            $this->conn->set_charset('utf8');
        }

        public function pesquisar($id_func) {    
            $comando = "SELECT * FROM usuario WHERE id_usuario = '$id_func';";
            $result = mysqli_query($this->conn, $comando);
            $func = new funcionario();
            while ($campo=mysqli_fetch_array($result)){
                $func->setId_func($campo["id_usuario"]);
                $func->setNome($campo["nome"]);
                $func->setLogin($campo["login"]);
                $func->setSenha($campo["senha"]);
            }
            return $func;
        }
        
        public function excluir($id_func) {    
            $comando = "DELETE FROM usuario WHERE id_usuario = '$id_func';";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function inserir($nome, $login, $senha) {    
            $comando = "INSERT INTO usuario (nome, login, senha) VALUES ('$nome', '$login', '$senha')";
            $result = mysqli_query($this->conn, $comando);
        }
        
        public function editar($id, $nome, $login) {    
            $comando = "UPDATE usuario SET nome = '$nome', login = '$login' WHERE id_usuario = '$id'";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>