<?php require_once '../../../Model/Gerente/OutrosGastos/modelOutrosGastos.php';
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
	<link rel="stylesheet" type="text/css" href="css/stylehomeOutrosGastos.css">
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
								<th class="column1">Descrição</th>
								<th class="column1">Valor</th>
								<th class="column1">Data</th>
								<th class="column1">Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach (controlOutrosGastos::listarGastos() as $fila) { ?>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[4] ?></td>
									<td class="column1"><a href="editGasto.php?idGasto=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a><a href="../../../Control/Gerente/OutrosGastos/controlOutrosGastos.php?a=excluir&idGasto=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="30px" src="../../../img/excluir.png"/></a></td>

						
								</tr>
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="cadOutrosGastos.php"><button class="main">
  </button></a>
  <ul>
  </ul>
</div>
    <script src="css/navbar/header-2.js"></script>
</body>
</html>