<?php
    include_once("conexao.php");
    include_once("../classes/acai.php");
    include_once("../classes/ingrediente.php");
    include_once("../classesDAO/itemCarrinhoDAO.php");
    include_once("../classesDAO/acaiDAO.php");
    include_once("../classesDAO/ingredienteDAO.php");
    $pedido = $_POST["pedido"];
    $comando = "SELECT *, CA.id_carrinho, CA.NumPedido, CA.DataPedido, CL.nome, CL.celular, E.rua, E.cep, E.numero, E.bairro, E.complemento
    FROM carrinho AS CA
    INNER JOIN cliente AS CL ON CA.id_cliente = CL.id_cliente
    INNER JOIN endereco AS E ON CA.id_endereco = E.id_endereco
    WHERE CA.NumPedido = $pedido;";
    $result = mysqli_query($conn, $comando);
    while ($campo=mysqli_fetch_array($result)){
        echo "<p>Pedido App Della Massa</p>";
        echo "<p>===========================</p>";
        echo "<p>Pedido: ".$campo['NumPedido']."</p>";
        echo "<p>Data: ".$campo['DataPedido']."</p>";
        echo "<p>Telefone: ".$campo['celular']."</p>";
        echo "<p>Rua: ".$campo['rua']."</p>";
        echo "<p>CEP: ".$campo['cep']." - Num: ".$campo['numero']."</p>";
        echo "<p>Bairro: ".$campo['bairro']."</p>";
        echo "<p>Comp.: ".$campo['complemento']."</p>";
        echo "<p>===========================</p>";
        $IC = new itemCarrinhoDAO();
        foreach ($IC->pesquisar($campo['id_carrinho']) as $string) {
            $itemCar = new itemCarrinho();
            $itemCar = $string;
            echo "<p>".$itemCar->getTipo()."</p>";
            echo "<p>Quantidade: ".$itemCar->getQuantidade()."</p>";
            if($itemCar->getTipo() == "acai") {
                $acaiDAO = new acaiDAO();
                $acai = new acai();
                $acai = $acaiDAO->pesquisarImprimir($itemCar->getId_item(), $conn);
                echo "<p>1 - ".$acai->getNome( )."</p>";
                $divisor = explode(";",$itemCar->getDescricao());
                for($i = 0; $i < count($divisor)-1; $i++) {
                    $most = $i + 1;
                    $ingredienteDAO = new ingredienteDAO();
                    $ingrediente = new ingrediente(); 
                    $ingrediente = $ingredienteDAO->pesquisarImprimir($divisor[$i], $conn);
                    echo "<p>&emsp;&emsp;".$most." - ".$ingrediente->getNome()."</p>"; 
                }
            } else if ($itemCar->getId_item3() != "") {
                echo "<p>1/3 - ".$IC->pesquisaNome($itemCar->getId_item(), $itemCar->getTipo())."</p>";
                echo "<p>1/3 - ".$IC->pesquisaNome($itemCar->getId_item2(), $itemCar->getTipo())."</p>";
                echo "<p>1/3 - ".$IC->pesquisaNome($itemCar->getId_item3(), $itemCar->getTipo())."</p>";
                echo "<p>Obs.: ".$itemCar->getDescricao()."</p>";
            } else if ($itemCar->getId_item2() != "") {
                echo "<p>1/2 - ".$IC->pesquisaNome($itemCar->getId_item(), $itemCar->getTipo())."</p>";
                echo "<p>1/2 - ".$IC->pesquisaNome($itemCar->getId_item2(), $itemCar->getTipo())."</p>";
                echo "<p>Obs.: ".$itemCar->getDescricao()."</p>";
            } else {
                echo "<p>1 - ".$IC->pesquisaNome($itemCar->getId_item(), $itemCar->getTipo())."</p>";
                echo "<p>Obs.: ".$itemCar->getDescricao()."</p>";
            }
            echo "<p>----------------------------------------------</p>";
        }
        
        echo "<p>Subtotal: ".$campo['subTotal']."</p>";
        echo "<p>Taxa de Entrega: ".$campo['taxaEntrega']."</p>";
        echo "<p>Total Geral: ".$campo['valorTotal']."</p>";
        echo "<p>Forma de Pag: ".$campo['formaPag']."</p>";
        echo "<p>Troco: ".$campo['troco']."</p>";
    }

    echo "<script type='text/javascript'>window.print();</script>";
?>