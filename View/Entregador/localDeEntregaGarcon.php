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
	$rol = controlGarcon::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
	<link rel="stylesheet" href="css/stylelocalDeEntregaGarcon.css">
	<link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/navbar/header-2.css" />
</head>

<body>
<header class="site-header">
      <div class="wrapper site-header__wrapper">
        <a href="#" class="brand"><img id="logo" 
                    width="60px"
                    src="../../img/logo.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a>
        <nav class="nav">
		<a href="../Garcon/homeGarcon.php"><button class="nav__toggle_2" aria-expanded="false" type="button">
		  <img
				width="25px"
				src="../../img/back.png"
					class="active-item"
					style="fill-opacity: 1"
				>
				<br>
				<span>Voltar</span>
          </button></a>

          <a href="../logout.php"><button class="nav__toggle" aria-expanded="false" type="button">
		  <img
				width="25px"
				src="../../img/logout.png"
					class="active-item"
					style="fill-opacity: 1"
				>
				<br>
				<span>Logout</span>
          </button></a>
          <ul class="nav__wrapper">
            <li class="nav__item"><a href="../Garcon/homeGarcon.php">
			<img
				width="70px"
				src="../../img/back.png"
					class="active-item"
					style="fill-opacity: 1"
				>
				<br>
				<span>Voltar</span>
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
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Rua</th>
								<th class="column2">N°</th>
								<th class="column3">Bairro</th>
								<th class="column4">Complemento</th>
								<th class="column5">Referência</th>
								<th class="column6">Estado</th>
								<th class="column6">Cidade</th>
								<th class="column6">Telefone</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1"><?= $rol[8] ?></td>
									<td class="column2"><?= $rol[9] ?></td>
									<td class="column3"><?= $rol[10] ?></td>
									<td class="column4"><?= $rol[11] ?></td>
									<td class="column6"><?= $rol[12] ?></td>
									<td class="column6"><?= $rol[13] ?></td>
									<td class="column6"><?= $rol[14] ?></td>
									<td class="column6"><?= $rol[15] ?></td>
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