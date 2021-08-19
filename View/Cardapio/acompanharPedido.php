<?php require_once '../../Model/Cliente/modelCliente.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />	
	<link rel="stylesheet" href="css/stylehomePesquisarPedido.css">
	<title>Acompanhar Pedido</title>
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
					<h3> Acompanhe seu pedido através do seu telefone cadastrado</h3><br>
                    <div class="form">
		<form action="#" method="get">
			<div>
			<label for="telefone"></label>
			<input id= "telefone" placeholder= "Insira seu N° de telefone" name="pTelefone" required autofocus maxlength="15" >
			<br>
			<br>
			<input id= "submit" type="submit" value="pesquisar">			
			</div>
		</form> 
		</div>
        <br>
					<table>
						
                    <?php foreach (controlCliente::listarPedidos($_GET['pTelefone']) as $fila) { ?>
					<thead >
							<tr>
								<th id ='column1'>N° do pedido</th>
								<th id ='column1'>Cliente</th>
								<th id ='column1'>Descrição</th>
								<th id ='column1'>Observação</th>
								<th id ='column1'>Preço</th>
								<th id ='column1'>Pagamento</th>
								<th id ='column1'>troco</th>
								<th id ='column1'>Entrega</th>
								<th id ='column1'>Data/hora</th>
								<th id ='column1'>Status</th>
							</tr>
							</thead>
				<tbody>
                <td id= "column1"><?= $fila[0] ?></td>
                <td id= "column1"><?= $fila[2] ?></td>
					<td id= "column1"><?=nl2br($fila[3]); ?></td>
					<td id= "column1"><?= $fila[4] ?></td>
					<td id= "column1"><?= $fila[5] ?></td>
					<td id= "column1"><?= $fila[7] ?></td>
					<td id= "column1"><?= $fila[6] ?></td>
					<td id= "column1"><?= $fila[8] ?></td>
					<td id= "column1"><?= $fila[17] ?></td>
					<td id= "column1"><?= $fila[18] ?></td>
					<td id= "column1">
                    </tbody>
						<?php } ?>
					</table>
					<br>
				</div>
			</div>
		</div>
	</div>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>

</body>
</html>