<?php 
require_once '../../Model/Garcon/modelGarcon.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Garcom") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 
$rol = controlGarcon::buscarEmpresaPorId($_SESSION['idEmpresa']);
header("refresh: 50;");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />	
	<link rel="stylesheet" href="css/stylehomeGarson.css">
	<title>Garçons</title>
</head>

<body>
	      <!-- Header Start -->
		  <header class="site-header">
      <div class="wrapper site-header__wrapper">
        <div class="site-header__start">
          <a href="#" class="brand"><img id="logo" 
                    width="60px"
                    src="../../img/logo.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a>QueroCumê<br>
                    Empresa: <?=$rol[0]?>
        
        </div>
        <div class="site-header__end">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
			<a href="../logout.php"><img
                    width="30px"
                    src="../../img/logout.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    > </a>
            </button>
            <ul class="nav__wrapper">
              <li class="nav__item">
              <a href="../logout.php">
                    <img
                    width="30px"
                    src="../../img/logout.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- Header End -->
	<br>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
							<th class="column1">N° Pedido</th>
								<th class="column1">Cliente</th>
								<th class="column1">Pedido</th>
								<th class="column1">Observação</th>
								<th class="column1">Preço</th>
								<th class="column1">Pagamento</th>
								<th class="column1">Troco para</th>
								<th class="column1">Entrega</th>
								<th class="column1">Data</th>
								<th class="column1">Status</th>
								<th class="column1" colspan="3">Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach (controlGarcon::listarPedidosConcluidos() as $fila) { ?>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
									<td class="column1"><?=nl2br($fila[3]); ?></td>
									<td class="column1"><?= $fila[4] ?></td>
									<td class="column1"><?= $fila[5] ?></td>
									<td class="column1"><?= $fila[7] ?></td>
									<td class="column1"><?= $fila[6] ?></td>
									<td class="column1"><?= $fila[8] ?></td>
									<td class="column1"><?= $fila[17] ?></td>
									<td class="column1"><?= $fila[18] ?></td>
									<td class="column1"><br><a href="editPedidoGarcon.php?idPedidos=<?=base64_encode($fila[0])?>"><img width="30px" src="../../img/editar-arquivo.png"/></a>
									<a href="../../Control/Garcon/controlGarcon.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar pedido?')"><img width="30px" src="../../img/excluir.png"/></a>
									<a href="localDeEntregaGarcon.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../img/mapa.png"/></a>
								</td>
									

								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="cadPedidoGarcon.php"><button class="main">
  </button></a>
  <ul>
  </ul>
</div>
</body>
</html>