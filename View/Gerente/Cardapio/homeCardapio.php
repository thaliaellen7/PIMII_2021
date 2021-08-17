<?php require_once '../../../Model/Gerente/Cardapio/modelCardapio.php' ?>

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
                    src="../../../img/logo.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a>QueroCumê<br>
        
        </div>
        <div class="site-header__end">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
			<a href="../../logout.php"><img
                    width="30px"
                    src="../../../img/logout.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    > </a>
            </button>
            <ul class="nav__wrapper">
              <li class="nav__item">
              <a href="../../logout.php">
                    <img
                    width="30px"
                    src="../../../img/logout.png"
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
						
						<?php foreach (controlFinanceiro::listarCategorias() as $fila) { 
					echo "<thead style='background-color: #006D78; !important'>
							<tr style='background-color: #36304A ; color: white;'>
								<th colspan='9'>$fila[0]</th>
							<tr>
							<tr>
								<th id ='column1'>ID</th>
								<th id ='column1'>nome</th>
								<th id ='column1'>descrição</th>
								<th id ='column1'>preço</th>
								<th id ='column1'>disponibilidade</th>
								<th id ='column1'>Tornar Disponível</th>
								<th id ='column1'>Tornar Indiponível</th>
								<th id ='column1' colspan='2'>Ações</th>
							</tr>
							</thead>
						";

						foreach (controlFinanceiro::listarItem($fila[0]) as $fila) { ?>
						<tbody>
						<tr>
					<td id= "column1"><?= $fila[0] ?></td>
					<td id= "column1" ><?= $fila[1] ?></td>
					<td id= "column1"><?=nl2br($fila[2]); ?></td>
					<td id= "column1"><?= $fila[3] ?></td>
					<td id= "column1">
						<?php if($fila[4] == 1){echo"disponível";}else{echo"indisponível";} ?>
					</td>
					<td id= "column1">
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Disponivel&idItem=<?=base64_encode($fila[0])?>"><img width="40px" src="../../../img/comendo.png"/></a>
					</td >
					<td id= "column1">
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Indisponivel&idItem=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../../img/sem-comida.png"/></a>
					</td>
					<td id= "column1">
						<a href="editItem.php?idItem=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td id= "column1"> 
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=excluir&idItem=<?=base64_encode($fila[0])?>" onclick="return confirm('Apagar Item')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>

						</tbody>
						<?php	}echo"<tr>&nbsp</tr>";} ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="cadItem.php"><button class="main">
  </button></a>
  <ul>
  </ul>
</div>
</body>
</html>