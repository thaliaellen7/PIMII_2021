<?php require_once '../../../Model/Gerente/Produto/modelProduto.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../../';
	</SCRIPT>");
	}  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylehomeProduto.css">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/navbar/header-2.css" />
</head>
<body>
	    <!-- Header Start -->
		<header class="site-header">
      <div class="wrapper site-header__wrapper">
        <a href="#" class="brand">Brand</a>
        <nav class="nav">
          <a href="../../logout.php"><button class="nav__toggle" aria-expanded="false" type="button">
            Logout
          </button></a>
          <ul class="nav__wrapper">
            <li class="nav__item"><a href="../homeGerente.php">Início</a></li>
            <li class="nav__item nav__item--end"><a href="../../logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- Header End -->
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Id</th>
								<th class="column2">Nome</th>
								<th class="column4">Qtd Total</th>
								<th class="column4">Qts Utilizada</th>
								<th class="column5">Valor Total(R$)</th>
								<th class="column6">Data de cadastro</th>
								<th class="column6">Fornecedor</th>
								<th class="column6" colspan="2">Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach (controlProduto::listarProdutosMes() as $fila) { ?>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column2"><?= $fila[2] ?></td>
									<td class="column4"><?= $fila[5] ?></td>
									<td class="column4"><?= $fila[6] ?></td>
									<td class="column5"><?= $fila[4] ?></td>
									<td class="column6"><?= $fila[3] ?></td>
									<td class="column6"><?= $fila[7] ?></td>
									<td class="column5"><a href="../../../Control/Gerente/Produto/controlProduto.php?a=excluir&idEstoque=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar produto?')"><img width="30px" src="../../../img/excluir.png"/></a><a href="editPedidoProduto.php?idEstoque=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a></td>
									
								
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="cadPedidoProduto.php"><button class="main">
  </button></a>
  <ul>
  </ul>
</div>
    <script src="css/navbar/header-2.js"></script>
</body>
</html>