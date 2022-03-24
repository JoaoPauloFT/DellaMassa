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
    header("Location: ../view/pedido.php");
} else {
    echo "nao";
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header("Location: ../index.html");
}
