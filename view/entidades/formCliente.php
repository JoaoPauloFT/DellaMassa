<?php
include_once("../../conexao/conexao.php");
include_once("../../classes/cliente.php");
require "../../classes/tabela.php";
$tabela = new Tabela();
$c = new cliente();

if(isset($_POST['pedido'])) {
    include_once("../../classesDAO/clienteDAO.php");
    $cDAO = new clienteDAO();
    $c = $cDAO->pesquisar($_POST['pedido']);
    if($_POST['action']=="Excluir") {
        $cDAO->excluir($_POST['pedido']);
        header('location:cliente.php');
    }
}

if (isset($_POST['nome'])) {
    include_once("../../classesDAO/clienteDAO.php");
    $cDAO = new clienteDAO();
    $c = $cDAO->editar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['celular']);
    header('location:cliente.php');
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
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imagens/logo.ico" />
    <link rel="stylesheet" href="../../estilo/principal.css">
    <title>Clientes - Della Massa</title>
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
                            <li><a style="background-color: grey; color: white;" class="dropdown-item" href="cliente.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="funcionario.php">Funcionário</a></li>
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
    <main style="text-align: left; padding: 15px 30px 30px 30px;">
        <div>
            <form action="formCliente.php" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $_POST['pedido']; ?>">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $c->getNome(); ?>">
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular:</label>
                    <input type="celular" class="form-control" id="celular" placeholder="Celular" name="celular" value="<?php echo $c->getCelular(); ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $c->getEmail(); ?>">
                </div>
                <div class="row">
                    <div class="col-9"><input class="btn btn-danger" type="submit" value="Salvar"></div>
                    <div class="col-3"><input class="btn btn-danger right" type="button" value="Voltar" onclick="voltar()"></div>
                </div>
            </form>
        </div>
    </main>
    <script>
        function voltar() {
            window.location.href = 'cliente.php';
        }
    </script>
</body>
</html>