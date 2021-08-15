<?php 
require_once '../../../Model/Gerente/Pedido/modelPedido.php';
header("refresh: 50;");
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
	<link rel="stylesheet" type="text/css" href="css/stylehomePedido.css">
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
								<th class="column2">Cliente</th>
								<th class="column3">Pedido</th>
								<th class="column4">Observação</th>
								<th class="column5">Preço</th>
								<th class="column6">Entrega</th>
								<th class="column6">Pagamento</th>
								<th class="column6">Data</th>
								<th class="column6">Status</th>
								<th class="column6" colspan="3">Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach (controlPedido::listarPedidosConcluidos() as $fila) { ?>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column2"><?= $fila[2] ?></td>
									<td class="column3"><?=nl2br($fila[3]); ?></td>
									<td class="column3"><?= $fila[4] ?></td>
									<td class="column4"><?= $fila[5] ?></td>
									<td class="column6"><?= $fila[7] ?></td>
									<td class="column6"><?= $fila[6] ?></td>
									<td class="column6"><?= $fila[16] ?></td>
									<td class="column6"><?= $fila[17] ?></td>
									<td class="column5"><a href="editPedidoGerente.php?idPedidos=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a></td>
									<td class="column5"><a href="../../../Control/Gerente/Pedido/controlPedido.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar pedido?')"><img width="30px" src="../../../img/excluir.png"/></a></td>
									<td class="column5"><a href="localDeEntregaGerente.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../../img/mapa.png"/></a></td>
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="cadPedidoGerente.php"><button class="main">
  </button></a>
  <ul>
  </ul>
</div>
    <script src="css/navbar/header-2.js"></script>
</body>
</html>