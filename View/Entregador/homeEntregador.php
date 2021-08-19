<?php 
header("refresh: 50;");
require_once '../../Model/Entregador/modelEntregador.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Entregador") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 

$rol = controlEntregador::buscarEmpresaPorId($_SESSION['idEmpresa']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar/style.css" />
	<link rel="stylesheet" href="css/style.css" />
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
                    width="70px"
                    src="../../img/logo.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a>QueroCumê<br>
                    Empresa: <?=$rol[0]?> <br>
					Funcionário: <?php echo $_SESSION['nomeFuncionario'];?>
		  </div>
        
        <nav class="nav">
				
          <a href="../logout.php"><button class="nav__toggle" aria-expanded="false" type="button">
		  <img
				width="30px"
				src="../../img/logout.png"
					class="active-item"
					style="fill-opacity: 1"
				>
				<br>
				<span>Logout</span>
          </button></a>

          <ul class="nav__wrapper">
			</a></li>
            <li class="nav__item nav__item--end"><a href="../logout.php">
			<img
				width="40px"
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
    </header>
	<br>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
						<tr class="table100-head">
								<th class="column1">Nº Pedido</th>
								<th class="column2">Pedido</th>
								<th class="column1">Horário</th>
								<th class="column1">Preço (R$)</th>
								<th class="column1">Pagamento</th>
								<th class="column1">Troco para</th>
								<th class="column1">Status</th>
								<th class="column1">Atualizar <br>Status</th>
								<th class="column1">Local de<br>Entrega</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach (controlEntregador::listarPedidosProntos() as $fila) { ?>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?=nl2br($fila[3]); ?></td>
									<td class="column1"><?= $fila[17] ?></td>
									<td class="column1"><?= $fila[5] ?></td>
									<td class="column1"><?= $fila[7] ?></td>
									<td class="column1"><?= $fila[6] ?></td>
									<td class="column1"><?= $fila[18] ?></td>
									<td class="column5">
									<a href="../../Control/Entregador/controlEntregador.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>&statusPedidos=<?=base64_encode($fila[18])?>" onclick="return confirm('Deseja definir o pedido como \'Entregue'?')"><img title = "Marcar pedido como Entregue" width="30px" src="../../img/tarefas-concluidas.png"/></a>
                   					 </td>
									<td class="column5">
										<a href="localDeEntregaEntregador.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../img/mapa.png"/></a>
									</td>
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>