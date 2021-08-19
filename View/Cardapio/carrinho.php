<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Headers - 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/reset.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />
    <link rel="stylesheet" href="css/stylecarrinho.css" />
  </head>
  <body>
    <!-- Header Start -->
    <header class="site-header">
      <div class="wrapper site-header__wrapper">
        <div class="site-header__start">
          <a href="homeCardapio.php?idEmpresa=<?= $_GET['idEmpresa']?>&acaoItem=continuarComprando&nomeEmpresa=<?=$_GET['nomeEmpresa']?>" class="brand"><img id="logo" 
                    width="45px"
                    src="../../img/backstore.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    ></a> 
        
        </div>
      </div>
    </header>
    <!-- Header End -->
    <br>
	<table border="0" collapse>
		
		<tbody>
			<?php $total = 0; if(isset($_SESSION['carrinho'])){ echo"<thead>
			<tr>
				<th>Item</th>
				<th>Qtt</th>
				<th>Preço</th>
			</tr>
		</thead>"; foreach ($_SESSION['carrinho'] as $key => $value){ $total+= $value['quantidade'] * $value['preco']; ?>
				<tr>
					<td><?= $value['nome'] ?></td>
					<td> <?= $value['quantidade'] ?></td>
					<td><?= $value['preco'] ?></td>
					<td>
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=remover&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Retirar um item do carrinho?')"><img width="30px" src="../../img/menos.png"/></a>					
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Adicionar um item ao carrinho?')"><img width="30px" src="../../img/mais.png"/></a>
					</td>
				</tr>
			<?php }} else{ echo'<div class="img">
									<img id="carrinho" width="20%" src="../../img/carrinho-vazio.png" /><br><div class="texto"><h4>Seu carrinho está vazio!</h4></div></div><br>'
								
									;}?>
		</tbody>
	</table>
	<br>
	<?php if(isset($_SESSION['carrinho'])){ $val_total = number_format($total, 2); echo"<h2>Valor Total R$ $val_total reais</h2>";} ?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php if(isset($_SESSION['carrinho'])){ echo'<div class="link_local_right">
		<a href="enderecoDeEntrega.php"> <img id="img" src="../../img/point.png" alt="point" width=	"50px" > <h3>Adicionar endereço para Concluir</h3> </a>
	</div>'; }?><br>
  <?php if(isset($_SESSION['carrinho'])){ echo'<div class="link_local">
		<a href="cancelarCompra.php"> <img id="img" src="../../img/cancelarcompra.png" alt="point" width=	"50px" > <h3>Cancelar Compra</h3> </a>
	</div>'; }
	?>
	
    <script src="css/header-4.js"></script>
  </body>
</html>
