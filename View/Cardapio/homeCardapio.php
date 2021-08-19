<?php require_once '../../Model/Cardapio/modelCardapio.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />	
	<link rel="stylesheet" href="css/stylehomeGarson.css">
	<title>Cardápio</title>
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
                    ></a>QueroCumê<br>Empresa:<?= $_GET['nomeEmpresa']?>
        
        </div>
        <div class="site-header__end">
          <nav class="nav">
		  <button class="nav__toggle" aria-expanded="false" type="button">
		  <a href="acompanharPedido.php?pTelefone=null" class="brand"><img id="logo" 
                    width="45px"
                    src="../../img/pedidos.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a>
            </button>
            <ul class="nav__wrapper">
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
					<h1> Cardápio da <?= $_GET['nomeEmpresa']?></h1><br>
					<table>
						
					<?php foreach (controlCardapio::listarCategorias($_GET['idEmpresa']) as $fila) { 
					echo "<tr style='background-color: #6377E7 ; color: white; font-size: 20px;'>
					<th colspan='9'>$fila[0]</th>
				<tr>
					<thead >
							
							<tr>
								<th id ='column1'>Nome</th>
								<th id ='column1'>Descrição</th>
								<th id ='column1'>Preço</th>
								<th id ='column1'>Adicionar</th>
							</tr>
							</thead>
						";

						foreach (controlCardapio::listarItem($fila[0], $_GET['idEmpresa']) as $fila) { ?>	
						<tbody>
						<tr>
					<td id= "column1"><?= $fila[1] ?></td>
					<td id= "column1"><?=nl2br($fila[2]); ?></td>
					<td id= "column1"><?= $fila[3] ?></td>
					<td id= "column1">
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&idItem=<?=base64_encode($fila[0])?>&nomeItem=<?=base64_encode($fila[1])?>&precoItem=<?=base64_encode($fila[3])?>&idEmpresa=<?=base64_encode($fila[4])?>&local=cardapio&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja adicionar este item ao carrinho?')"><img width="30px" src="../../img/adicionar.png"/></a>
					</td>
				</tr>

						</tbody>
						<?php	}} ?>
					</table>
					<br>
				</div>
			</div>
		</div>
	</div>
	<div class="fab">
	<a href="carrinho.php?nomeEmpresa=<?= $_GET['nomeEmpresa']?>&idEmpresa=<?= $_GET['idEmpresa']?>"><button class="main"><?php $qttItens = 0; 
					if(isset($_SESSION['carrinho'])){
						foreach ($_SESSION['carrinho'] as $key => $value){
							$qttItens += $value['quantidade'];
							}
					} else { $qttItens = 0;}
								echo $qttItens;?>
  </button></a>
  <ul>
  </ul>
</div>
</body>
</html>