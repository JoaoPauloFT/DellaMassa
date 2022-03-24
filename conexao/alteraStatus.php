<?php
    include_once("conexao.php");
    $pedido = $_POST['pedido'];
    $comando = "SELECT status FROM carrinho WHERE NumPedido = $pedido";
    $result = mysqli_query($conn, $comando);
    while ($campo=mysqli_fetch_array($result)){
        $status = $campo["status"];
    }
    if ($status == "Aguardando aprovação") {
        $mudar = "Preparando";
    } else if ($status == "Preparando") {
        $mudar = "Saiu para entrega";
    } else {
        $mudar = "Finalizado";
    }
    if(isset($_POST['resp'])) {
        if($_POST['resp'] == "sim") {
            $comando = "UPDATE carrinho SET status = '$mudar' WHERE numPedido = '$pedido'";
            $result = mysqli_query($conn, $comando);
		    header("Location: ../view/pedido.php");
        }
    } else { 
        echo "<form action='alteraStatus.php' method='post'>
            <input type='hidden' name='pedido' value='$pedido'>
            <input type='hidden' name='resp' value='sim'>
            <input id='alterar' type='submit' value='Alterar'>
        </form>
        <script type='text/javascript'>
            if (confirm('Deseja alterar o Status do pedido $pedido para $mudar?')) {
                document.getElementById('alterar').click()
            } else {
                window.close();
            }
        </script>";
    }
    
?>