<?php
include_once("../../conexao/conexao.php");
require "../../classes/tabela.php";
$tabela = new Tabela();
$pesquisar = "";

if(isset($_GET['pesquisa'])) {
    $pesquisar = $_GET['pesquisa'];
}

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
    header('location:../../index.html');
}
$pag = 0;
if(isset($_GET["qntd_Pag"])){
    $pag = intval($_GET["qntd_Pag"]);
}
$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imagens/logo.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../estilo/principal.css">
    <meta http-equiv="refresh" content="10">
    <title>Sobremesas - Della Massa</title>
</head>
<body id="padrao">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pizzaria Della Massa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Entidades</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../entidades/cliente.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="../entidades/funcionario.php">Funcion??rio</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Alimentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pizza.php">Pizza</a></li>
                            <li><a class="dropdown-item" href="esfiha.php">Esfiha</a></li>
                            <li><a class="dropdown-item" href="lanche.php">Lanche</a></li>
                            <li><a class="dropdown-item" href="pastel.php">Pastel</a></li>
                            <li><a class="dropdown-item" href="porcao.php">Por????o</a></li>
                            <li><a class="dropdown-item" href="bebida.php">Bebida</a></li>
                            <li><a class="dropdown-item" href="acai.php">A??ai</a></li>
                            <li><a class="dropdown-item" href="ingrediente.php">Ingrediente</a></li>
                            <li><a style="background-color: grey; color: white;" class="dropdown-item" href="sobremesa.php">Sobremesa</a></li>
                            <li><a class="dropdown-item" href="borda.php">Borda</a></li>
                            <li><a class="dropdown-item" href="almoco.php">Almo??o</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pedido.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config.php">Configura????es</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div>
            <form action="sobremesa.php" method="GET">
                <div style="padding: 0px 20px 0px 20px;"  class="form-floating mb-3 mt-3">
                    <?php echo "<input type='text' class='form-control' id='pesquisa' placeholder='Pesquisar' name='pesquisa' value ='$pesquisar'>"; ?>
                    <label  style="padding-left: 30px;" for="pesquisa">Pesquisar</label>
                </div>
                <div style="padding: 0px 20px 0px 20px;" class="d-grid">
                    <input class="btn btn-danger" type="submit" value="Pesquisar">
                </div>
            </form>
            <table class="table table-striped" id='conteudo'>
                <thead>
                    <tr>
                        <th>C??digo</th>
                        <th style="width: 50%;">Nome</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th colspan="3">A????o</th>
                    </tr>
                </thead>
                <?php
                    $base2 = 5;
                    $base = $pag * $base2;
                    if($pesquisar == "") {
                        $comando = "SELECT * FROM sobremesa ORDER BY id_sobremesa DESC LIMIT $base, $base2";
                        $comandoCount = "SELECT COUNT(*) FROM sobremesa";
                    } else {
                        $comando = "SELECT * FROM sobremesa WHERE nome LIKE '%".$pesquisar."%' ORDER BY id_sobremesa DESC LIMIT $base, $base2";
                        $comandoCount = "SELECT COUNT(*) FROM sobremesa WHERE nome LIKE '%".$pesquisar."%' LIMIT $base, $base2";
                    }
                    // Parte do c??digo que faz a pagina????o de tabela
                    $resultCount = mysqli_query($conn, $comandoCount);
                    $contador_total = intval(mysqli_fetch_array($resultCount)[0]);
                    $num_pages = $contador_total % $base2? intval($contador_total/$base2)+1 : $contador_total/$base2;
                    // Mostra os pedidos
                    $result = mysqli_query($conn, $comando);
                    $contador = 0;		    
                    while ($campo=mysqli_fetch_array($result)){
                        if($campo['status'] == 0) {
                            $status = "N??o";
                        } else {
                            $status = "Sim";
                        }
                        $tabela->insere_linha($contador);
                        $tabela->insere_coluna($campo["id_sobremesa"],$contador,0);
                        $tabela->insere_coluna($campo["nome"],$contador,1);
                        $tabela->insere_coluna($campo["valor"],$contador,2);
                        $tabela->insere_coluna($status,$contador,3);
                        $tabela->insere_coluna3("",$contador,4,"Inserir", "formSobremesa","");
                        $tabela->insere_coluna3($campo["id_sobremesa"],$contador,5,"Editar", "formSobremesa","");
                        $tabela->insere_coluna3($campo["id_sobremesa"],$contador,6,"Excluir", "formSobremesa","");
                        $tabela->fecha_linha();
                        $contador++;
                    }
                ?>
            </table>
            <div class="btn-group">
                <form action="sobremesa.php" method="GET">
                    <?php
                        for($i = 0; $i < $num_pages; $i++) {
                            if($i == $pag) {
                                echo "<input style='background-color: #000000; border-radius: 100%;' class='page-item btn text-light' type='submit' value='$i' name='qntd_Pag'>&nbsp;";
                            } else {
                                echo "<input style='background-color: #BB2D3B; border-radius: 100%;' class='page-item btn text-light' type='submit' value='$i' name='qntd_Pag'>&nbsp;";
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>