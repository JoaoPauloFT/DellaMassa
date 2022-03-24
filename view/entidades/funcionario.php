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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imagens/logo.ico" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../estilo/principal.css">
    <meta http-equiv="refresh" content="10">
    <title>Funcionários - Della Massa</title>
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
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Entidades</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cliente.php">Clientes</a></li>
                            <li><a style="background-color: grey; color: white;" class="dropdown-item" href="funcionario.php">Funcionário</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Alimentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../alimentos/pizza.php">Pizza</a></li>
                            <li><a class="dropdown-item" href="../alimentos/esfiha.php">Esfiha</a></li>
                            <li><a class="dropdown-item" href="../alimentos/lanche.php">Lanche</a></li>
                            <li><a class="dropdown-item" href="../alimentos/pastel.php">Pastel</a></li>
                            <li><a class="dropdown-item" href="../alimentos/porcao.php">Porção</a></li>
                            <li><a class="dropdown-item" href="../alimentos/bebida.php">Bebida</a></li>
                            <li><a class="dropdown-item" href="../alimentos/acai.php">Açai</a></li>
                            <li><a class="dropdown-item" href="../alimentos/ingrediente.php">Ingrediente</a></li>
                            <li><a class="dropdown-item" href="../alimentos/sobremesa.php">Sobremesa</a></li>
                            <li><a class="dropdown-item" href="../alimentos/borda.php">Borda</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pedido.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config.php">Configurações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div>
            <form action="cliente.php" method="GET">
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
                        <th>Código</th>
                        <th style="width: 50%;">Nome</th>
                        <th>Login</th>
                        <th colspan="3">Ação</th>
                    </tr>
                </thead>
                <?php
                    $base2 = 5;
                    $base = $pag * $base2;
                    if($pesquisar == "") {
                        $comando = "SELECT * FROM usuario ORDER BY id_usuario LIMIT $base, $base2";
                        $comandoCount = "SELECT COUNT(*) FROM usuario";
                    } else {
                        $comando = "SELECT * FROM usuario WHERE nome LIKE '%".$pesquisar."%' ORDER BY id_usuario LIMIT $base, $base2";
                        $comandoCount = "SELECT COUNT(*) FROM usuario WHERE nome LIKE '%".$pesquisar."%' LIMIT $base, $base2";
                    }
                    // Parte do código que faz a paginação de tabela
                    $resultCount = mysqli_query($conn, $comandoCount);
                    $contador_total = intval(mysqli_fetch_array($resultCount)[0]);
                    $num_pages = $contador_total % $base2? intval($contador_total/$base2)+1 : $contador_total/$base2;
                    // Mostra os pedidos
                    $result = mysqli_query($conn, $comando);
                    $contador = 0;		    
                    while ($campo=mysqli_fetch_array($result)){
                        $tabela->insere_linha($contador);
                        $tabela->insere_coluna($campo["id_usuario"],$contador,0);
                        $tabela->insere_coluna($campo["nome"],$contador,1);
                        $tabela->insere_coluna($campo["login"],$contador,2);
                    $tabela->insere_coluna3("",$contador,3,"Inserir", "formFuncionario","");
                        $tabela->insere_coluna3($campo["id_usuario"],$contador,4,"Editar", "formFuncionario","");
                        $tabela->insere_coluna3($campo["id_usuario"],$contador,6,"Excluir", "formFuncionario","");
                        $tabela->fecha_linha();
                        $contador++;
                    }
                ?>
            </table>
            <div class="btn-group">
                <form action="funcionario.php" method="GET">
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