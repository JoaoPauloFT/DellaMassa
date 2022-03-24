<?php
    class configDAO {
        protected $conn;
        public function __construct() {
            require "../conexao/conexao.php";
	        $this->conn = mysqli_connect($config['host'], $config['dbuser'], $config['dbpass'], $config['dbname']);
        }

        public function pesquisar() {
            include_once("../classes/config.php");
            $comando = "SELECT * FROM config WHERE id_config = 1;";
            $result = mysqli_query($this->conn, $comando);
            $a = new config();
            while ($campo=mysqli_fetch_array($result)){
                $a->setHia($campo["hora_inicio_almoco"]);
                $a->setHij($campo["hora_inicio_janta"]);
                $a->setHta($campo["hora_termino_almoco"]);
                $a->setHtj($campo["hora_termino_janta"]);
            }
            return $a;
        }
        
        public function editar($hia, $hij, $hta, $htj) {    
            $comando = "UPDATE config SET hora_inicio_almoco = '$hia', hora_inicio_janta = '$hij', hora_termino_almoco = '$hta', hora_termino_janta = '$htj' WHERE id_config = 1";
            $result = mysqli_query($this->conn, $comando);
        }
    }
?>