<?php
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
	$rol = controlEntregador::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />	
	<link rel="stylesheet" href="css/stylehomeGarsonLocal.css">
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
</body>
</html>