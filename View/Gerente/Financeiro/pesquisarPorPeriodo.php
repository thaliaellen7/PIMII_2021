<?php $saldoBruto = 0;
 require_once '../../../Model/Gerente/Financeiro/modelFinanceiro.php';
 if ($_SESSION['autenticado'] != true){
	header('Location: ../../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
        session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../../';
	</SCRIPT>");
	} 
  ?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/stylefinanceiro.css">
    <link rel="stylesheet" href="css/navbar/style.css" />
    <link rel="stylesheet" href="css/navbar/header-2.css" />
	<title>Financeiro</title>
    <script>
        function formatar(mascara, documento){
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i);

            if(texto.substring(0 ,1) != saida){
                documento.value += texto.substring(0, 1);

            }
        }
    </script>
</head>
<body>
<!-- Header Start -->
<header class="site-header">
      <div class="wrapper site-header__wrapper">
        <a  class="brand">Brand</a>
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
	<div id= "container-a">
		<form action="#" method="get">
        <br><br>
			<div class="inputBox" id="formulario">
                <p>De</p>
                <input id= "inputUser" name="data1" placeholder="00/00/0000" required autofocus maxlength="10" OnKeyPress="formatar('##/##/###', this)" />
                <br>
                <p>Até</p>
               <input id= "inputUser" name="data2" placeholder="00/00/0000" required autofocus maxlength="10" OnKeyPress="formatar('##/##/###', this)" />
                <br>
                <p>Sobre</p>
                <select id= "inputUser" name="assunto" >
							<option value="Produtos">Produtos</option>
							<option value="Pedidos">Pedidos</option>
							<option value="Outros Gastos">Outros Gastos</option>
							<option value="Outros Ganhos">Outros Ganhos</option>
							<option value="Orçamento Geral">Orçamento Geral</option>
				</select>
                <input id= "submit" name="a" type="submit" value="Calcular"/>
			</div>
			<br>
            <br>
            <br>
<div class="calcular">
    <?php
    $data1 = $_GET['data1'];
    $data2 = $_GET['data2'];
    $assunto = $_GET['assunto'];
    $tituloFuncionario = 0;
    $tituloProdutos = 0;
    $tituloPedidos = 0;
    $tituloOutros = 0;
    $tituloOutrosGanhos = 0;
    $tituloGeral = 0;
    $funcionarios = 0;
    $pedidos = 0;
    $produtos = 0;
    $outros = 0;
    $outrosGanhos = 0;
       
    if($data1!= null && $assunto == "Produtos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Produto</th>
                            <th class="column1">Unidades</th>
                            <th class="column1">Utilizado</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>';
    foreach (controlFuncionario::listarProdutos($data1, $data2) as $fila) { 
    $tituloProdutos++; if($tituloProdutos == 1){ echo "<h3>Produtos</h3><br>";} ?>
        
						<tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[5] ?></td>
									<td class="column1"><?= $fila[4] ?></td>
								</tr>
						</tbody>
					
    <?php  $produtos+= (double) $fila[4];}  echo'</table>
    </div>
</div>
</div>
</div>'; print "<h4>Gasto Total com produtos (R$) | $produtos reais |</h4"; $produtos = 0 ;$tituloProdutos = 0; }
  
    if($data1!= null && $assunto == "Pedidos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Pedido</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>';
    foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
    $tituloPedidos++; if($tituloPedidos == 1){ echo "<h3>Pedidos</h3>";}?>
						<tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= nl2br($fila[1]) ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
					
    <?php  $pedidos+= (double) $fila[2];}    echo'</table>
    </div>
</div>
</div>
</div>';
print "<h4>Ganho Total com Pedidos (R$) | $pedidos reais |</h4"; $pedidos = 0 ;$tituloPedidos = 0;}


    if($data1!= null && $assunto == "Outros Gastos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Gasto</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>';
    foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
    $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
        	<tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
					
    <?php  $outros+= (double) $fila[2];}   echo'</table>
    </div>
</div>
</div>
</div>';
print "<h4>Gasto Total com outros setores (R$) | $outros reais |</h4"; $outros = 0 ;$tituloOutros = 0;}
  
    if($data1!= null && $assunto == "Outros Ganhos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Gasto</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>';
    foreach (controlFuncionario::listarOutrosGanhos($data1, $data2) as $fila) { 
    $tituloOutrosGanhos++; if($tituloOutrosGanhos == 1){ echo "<h3>Outros Ganhos</h3>";}?>
        <tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
    <?php  $outrosGanhos+= (double) $fila[2];}  echo'</table>
    </div>
</div>
</div>
</div>'; print "<h4>Ganho Total com outros setores (R$) | $outrosGanhos reais |</h4"; $outrosGanhos = 0 ;$tituloOutrosGanhos = 0;}?>
    
    <?php 
    if($data1!= null && $assunto == "Orçamento Geral"){ 
    echo "<h4>De: $data1 Até:  $data2</h4>";
    echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Gasto</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>';
    foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
    $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
           <tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
					
    <?php  $outros+= (double) $fila[2];} echo'</table>
    </div>
</div>
</div>
</div>'; echo "<h4>Gasto Total com outros setores (R$) | $outros reais |</h4"; $tituloOutros = 0;?>
    <br>
    
    <?php echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column1">Ganho</th>
                            <th class="column1">Data</th>
                            <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>'; foreach (controlFuncionario::listarOutrosGanhos($data1, $data2) as $fila) { 
             $tituloOutrosGanhos++; if($tituloOutrosGanhos == 1){ echo "<h3>Outros Ganhos</h3>";}?>
               <tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
    <?php  $outrosGanhos+= (double) $fila[2];} echo'</table>
    </div>
</div>
</div>
</div>';  print "<h4>Ganho Total com outros setores (R$) | $outrosGanhos reais |</h3"; $outrosGanhos = 0 ;$tituloOutrosGanhos = 0;?>
    <br>
   
   <?php  echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                        <th class="column1">Id</th>
                        <th class="column1">Pedido</th>
                        <th class="column1">Data</th>
                        <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>'; foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
    $tituloPedidos++;  if($tituloPedidos < 2 ){ echo "<br><h3>Pedidos</h3>";}?>
            	<tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= nl2br($fila[1]) ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
								</tr>
						</tbody>
    <?php  $pedidos+= (double) $fila[2];} echo'</table>
    </div>
</div>
</div>
</div>'; print "<h4>Ganho Total com pedidos (R$) | $pedidos reais |</h4"; $tituloPedidos = 0;?>
    <br>
    
    <?php echo '  	<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                        <th class="column1">Id</th>
                        <th class="column1">Produto</th>
                        <th class="column1">Unidades</th>
                        <th class="column1">Utilizado</th>
                        <th class="column1">Data</th>
                        <th class="column1">Valor Total(R$)</th>
                        </tr>
                    </thead>'; foreach (controlFuncionario::listarProdutos($data1, $data2) as $fila) { 
    $tituloProdutos++; if($tituloProdutos < 2){ echo "<br><h3>Produtos</h3>";} ?>
        
						<tbody>
								<tr>
									<td class="column1"><?= $fila[0] ?></td>
									<td class="column1"><?= $fila[1] ?></td>
									<td class="column1"><?= $fila[2] ?></td>
									<td class="column1"><?= $fila[3] ?></td>
									<td class="column1"><?= $fila[5] ?></td>
									<td class="column1"><?= $fila[4] ?></td>
								</tr>
						</tbody>
					
    <?php  $produtos+= (double) $fila[4];} echo'</table>
    </div>
</div>
</div>
</div>'; print "<h4>Gasto Total com produtos (R$) | $produtos reais |</h4"; $tituloProdutos = 0;?>
    <br>
    <br> 
    <?php $saldogasto = $outros+$funcionarios+$produtos; $saldoganho = $pedidos; $bruto = $saldoganho - $saldogasto;
    echo '<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Gasto Geral</th>
                            <th class="column1">Ganho Geral</th>
                            <th class="column1">Resultado do Período</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="column1">$saldogasto</td>
                                <td class="column1">$pedido</td>
                                <td class="column1">$ganho</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>';} 
    $saldogasto = 0;
    $saldoganho = 0;
    $bruto = 0;
    $funcionarios = 0;
    $pedidos = 0;
    $produtos = 0;
    $outros = 0;
    ?>
    </div>
	</div>
	</form>
    <br>
    <br>
    <br>
</body>
</html>