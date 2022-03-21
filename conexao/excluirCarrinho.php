<?php
    include_once("conexao.php");
    $pedido = $_POST['pedido'];
    $comando = "SELECT id_carrinho FROM carrinho WHERE NumPedido = $pedido";
    $result = mysqli_query($conn, $comando);
    while ($campo=mysqli_fetch_array($result)){
        $id = $campo["id_carrinho"];
    }

    $comando = "DELETE FROM carrinho WHERE NumPedido = ".$pedido;
    $result = mysqli_query($conn, $comando);

    $comando = "DELETE FROM itemcarrinho WHERE id_carrinho = ".$id;
    $result = mysqli_query($conn, $comando);
    echo "<script>window.close();</script>";
?>