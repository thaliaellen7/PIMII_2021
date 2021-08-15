<?php
	require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
	$rol = controlFuncionario::buscarPorId(base64_decode($_GET['idFuncionario']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylehomeFuncionario.css">
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
								<th class="column1">Rua</th>
								<th class="column1">N°</th>
								<th class="column1">Bairro</th>
								<th class="column1">Complemento</th>
								<th class="column1">Referência</th>
								<th class="column1">Estado</th>
								<th class="column1">Cidade</th>
								<th class="column1">Telefone</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1"><?= $rol[7] ?></td>
									<td class="column1"><?= $rol[8] ?></td>
									<td class="column1"><?= $rol[9] ?></td>
									<td class="column1"><?= $rol[10] ?></td>
									<td class="column1"><?= $rol[11] ?></td>
									<td class="column1"><?= $rol[12] ?></td>
									<td class="column1"><?= $rol[13] ?></td>
									<td class="column1"><?= $rol[16] ?></td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    <script src="css/navbar/header-2.js"></script>
</body>
</html>