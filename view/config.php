<?php
include_once("../conexao/conexao.php");
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
    header('location: ../index.html');
}

include_once("../classesDAO/configDAO.php");
$cDAO = new configDAO();

if (isset($_POST['hia'])) {
    $c = $cDAO->editar($_POST['hia'], $_POST['hij'], $_POST['hta'], $_POST['htj']);
    echo "<script>alert('Salvo com sucesso!')</script>";
}

$c = $cDAO->pesquisar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="imagem/x-icon" href="../imagens/logo.ico" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../estilo/principal.css">
    <title>Configurações - Della Massa</title>
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
                            <li><a class="dropdown-item" href="entidades/cliente.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="entidades/funcionario.php">Funcionário</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Alimentos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="alimentos/pizza.php">Pizza</a></li>
                            <li><a class="dropdown-item" href="alimentos/esfiha.php">Esfiha</a></li>
                            <li><a class="dropdown-item" href="alimentos/lanche.php">Lanche</a></li>
                            <li><a class="dropdown-item" href="alimentos/pastel.php">Pastel</a></li>
                            <li><a class="dropdown-item" href="alimentos/porcao.php">Porção</a></li>
                            <li><a class="dropdown-item" href="alimentos/bebida.php">Bebida</a></li>
                            <li><a class="dropdown-item" href="alimentos/acai.php">Açai</a></li>
                            <li><a class="dropdown-item" href="alimentos/ingrediente.php">Ingrediente</a></li>
                            <li><a class="dropdown-item" href="alimentos/sobremesa.php">Sobremesa</a></li>
                            <li><a class="dropdown-item" href="alimentos/borda.php">Borda</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedido.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="config.php">Configurações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <h1>Configurações</h1>
            <hr>
            <form action="config.php" method="post">
                <h2>Almoço</h2>
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label" for="hia">Hora de Inicio:</label>
                        <input class="form-control" type="time" name="hia" id="hia" value="<?php echo $c->getHia(); ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="hta">Hora de Término:</label>
                        <input class="form-control"type="time" name="hta" id="hta" value="<?php echo $c->getHta(); ?>">
                    </div>
                </div>
                <br />
                <h2>Janta</h2>
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label" for="hij">Hora de Inicio:</label>
                        <input class="form-control" type="time" name="hij" id="hij" value="<?php echo $c->getHij(); ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="htj">Hora de Término:</label>
                        <input class="form-control" type="time" name="htj" id="htj" value="<?php echo $c->getHtj(); ?>">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col"><input class="btn btn-danger" type="submit" value="Salvar"></div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>