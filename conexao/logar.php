<?php
session_start();
include_once("conexao.php");
$login = $_POST['login'];
$senha = $_POST['senha'];
$comando = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
$result = mysqli_query($conn, $comando);
if ($campo = mysqli_fetch_array($result)) {
    echo "sim";
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    echo "<a id='apertar' href='https://".$_SERVER['HTTP_HOST']."/view/pedido.php'>Apertar</a>";
} else {
    echo "nao";
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo "<a id='apertar' href='https://".$_SERVER['HTTP_HOST']."/index.html'>Apertar</a>";
}
echo "<script>document.getElementById('apertar').click()</script>";
