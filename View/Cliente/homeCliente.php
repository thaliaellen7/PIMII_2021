<?php require_once '../../Model/Cliente/modelCliente.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Clientes </title>
	<link rel="stylesheet" href="css/stylehomeCliente.css">
</head>

<body>
<header>
      <div class="nav">
        <img  width="120px" height="140px" src="../../img/logo.png"/>
<!-- 		<div class="querocume">
			<h1>QueroCumê</h1>
		</div> -->
		<div class="form">
		<form action="pesquisarPedido.php" method="post">
			<div>
			<h4>Buscar seu pedido</h4>
			<br>
			<label for="telefone"></label>
			<input id= "telefone" placeholder= "Insira seu N° de telefone" name="pTelefone" required autofocus maxlength="15" >
			<br>
			<br>
			<input id= "submit" type="submit" value="pesquisar">			
			</div>
		</form> 
		</div>		
		</div>
      </div>   
  </header>

		<h1>  <b></b> </h1>
	<br>
	<br>
	<table border="1" collapse>
		<tbody>
			<?php foreach (controlCliente::listarEmpresas() as $fila) { $_SESSION['nomeEmpresaUtilizada']=$fila[1]; ?>
				<tr>
				<td><?php echo'<img width="30%" src="upload/'.$fila[11].'" />'; ?></td>
					<td id= "td_2"><a href = "../Cardapio/homeCardapio.php?idEmpresa=<?=$fila[0]?>&nomeEmpresa=<?=$fila[1]?>" > Pedir no(a) <?= $fila[1] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
</body>
</html>