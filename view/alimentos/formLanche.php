<?php
include_once("../../conexao/conexao.php");
include_once("../../classes/lanche.php");
require "../../classes/tabela.php";
$tabela = new Tabela();
$c = new lanche();

if(isset($_POST['pedido'])) {
    include_once("../../classesDAO/lancheDAO.php");
    $cDAO = new lancheDAO();
    if($_POST['action']=="Editar") {
        $c = $cDAO->pesquisar($_POST['pedido']);
    } elseif($_POST['action']=="Excluir") {
        $cDAO->excluir($_POST['pedido']);
        header('location:lanche.php');
    }
}

if (isset($_POST['id'])) {
    if($_POST['id'] != "") {
        include_once("../../classesDAO/lancheDAO.php");
        $cDAO = new lancheDAO();
        $cDAO->editar($_POST['id'], $_POST['nome'], $_POST['ingrediente'], $_POST['valor'], $_POST['valorDuplo'], $_POST['status']);
        header('location:lanche.php');
    } else {
        include_once("../../classesDAO/lancheDAO.php");
        $fDAO = new lancheDAO();
        $fDAO->inserir($_POST['nome'], $_POST['ingrediente'], $_POST['valor'], $_POST['valorDuplo'], $_POST['status']);
        header('location:lanche.php');
    }
}


session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
    header('location:../../index.html');
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../estilo/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../../estilo/jquery.mask.min.js"></script>
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imagens/logo.ico" />
    <link rel="stylesheet" href="../../estilo/principal.css">
    <title>Lanche - Della Massa</title>
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
                            <li><a class="dropdown-item" href="../entidades/cliente.php">Cliente</a></li>
                            <li><a class="dropdown-item" href="../entidades/funcionario.php">Funcion??rio</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Alimentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pizza.php">Pizza</a></li>
                            <li><a class="dropdown-item" href="esfiha.php">Esfiha</a></li>
                            <li><a style="background-color: grey; color: white;" class="dropdown-item" href="lanche.php">Lanche</a></li>
                            <li><a class="dropdown-item" href="pastel.php">Pastel</a></li>
                            <li><a class="dropdown-item" href="porcao.php">Por????o</a></li>
                            <li><a class="dropdown-item" href="bebida.php">Bebida</a></li>
                            <li><a  class="dropdown-item" href="acai.php">A??ai</a></li>
                            <li><a class="dropdown-item" href="ingrediente.php">Ingrediente</a></li>
                            <li><a class="dropdown-item" href="sobremesa.php">Sobremesa</a></li>
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
    <main style="text-align: left; padding: 15px 30px 30px 30px;">
        <div>
            <form action="formLanche.php" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $_POST['pedido']; ?>">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $c->getNome(); ?>">
                </div>
                <div class="mb-3">
                    <label for="ingrediente" class="form-label">Ingrediente:</label>
                    <input type="text" class="form-control" id="ingrediente" placeholder="Ingrediente" name="ingrediente" value="<?php echo $c->getIngrediente(); ?>">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" placeholder="Valor" name="valor" value="<?php echo $c->getValor(); ?>">
                    </div>
                    <div class="col-6">
                        <label for="valorDuplo" class="form-label">Duplo:</label>
                        <input type="text" class="form-control" id="valorDuplo" placeholder="Valor Duplo" name="valorDuplo" value="<?php echo $c->getValorDuplo(); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="status" class="form-label">Ativo:</label>
                        <select class="form-control" name="status" id="status">
                            <?php if ($c->getStatus() == 0) { ?>
                                <option value="1">Sim</option>
                                <option value="0" selected>N??o</option>
                            <?php } else { ?>
                                <option value="1" selected>Sim</option>
                                <option value="0">N??o</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-9"><input class="btn btn-danger" type="submit" value="Salvar"></div>
                    <div class="col-3"><input class="btn btn-danger right" type="button" value="Voltar" onclick="voltar()"></div>
                </div>
            </form>
        </div>
    </main>
    <script>
        function voltar() {
            window.location.href = 'lanche.php';
        }
        $(document).ready(function(){
                $('#valor').mask('9999.99', { reverse:true});
                $('#valorDuplo').mask('9999.99', { reverse:true});
            });
    </script>
</body>
</html>