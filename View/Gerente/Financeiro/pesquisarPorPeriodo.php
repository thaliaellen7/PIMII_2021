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
	<link rel="stylesheet" href="css/stylefinanceiro.css">
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
	


	<div id= "container-a">
    <header>
            <img  width="60px" height="70px" src="../../../img/logo.png"/>
            <h1>Calcular Gastos/Ganhos por período</h1>
            <div id="link_logout">
            <a href="../../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/logout.png"/>
            <br> sair</a>
            </div>
        </header>

		<form action="#" method="get">
        <br><br>
			<div class="inputBox">
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
    foreach (controlFuncionario::listarProdutos($data1, $data2) as $fila) { 
    $tituloProdutos++; if($tituloProdutos == 1){ echo "<h3>Produtos</h3>";} ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Unidades</th>
                    <th>Utilizado</th>
                    <th>Valor Total</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fila[0] ?></td>
                    <td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[4] ?></td>
                    <td><?= $fila[5] ?></td>
                </tr>
            </tbody>
            
        </table>
    <?php  $produtos+= (double) $fila[4];} print "<h4>Gasto Total com produtos (R$) | $produtos reais |</h4"; $produtos = 0 ;$tituloProdutos = 0;}
    
    if($data1!= null && $assunto == "Pedidos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
    $tituloPedidos++; if($tituloPedidos == 1){ echo "<h3>Pedidos</h3>";}?>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Pedido</th>
                        <th>Valor</th>
                        <th>data</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td><?= $fila[0] ?></td>
                        <td><?=nl2br($fila[1]); ?></td>
                        <td><?= $fila[2] ?></td>
                        <td><?= $fila[3] ?></td>
                    </tr>
                </tbody>
            </table>
    <?php  $pedidos+= (double) $fila[2];} print "<h4>Ganho Total com Pedidos (R$) | $pedidos reais |</h4"; $pedidos = 0 ;$tituloPedidos = 0;}
   
    if($data1!= null && $assunto == "Outros Gastos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
    $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Gasto</th>
                    <th>Valor</th>
                    <th>data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fila[0] ?></td>
                    <td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                </tr>
            </tbody>
        </table>
    <?php  $outros+= (double) $fila[2];} print "<h4>Gasto Total com outros setores (R$) | $outros reais |</h4"; $outros = 0 ;$tituloOutros = 0;}
    
    if($data1!= null && $assunto == "Outros Ganhos"){
    echo "<h4>De: $data1 Até:  $data2</h4>";
    foreach (controlFuncionario::listarOutrosGanhos($data1, $data2) as $fila) { 
    $tituloOutrosGanhos++; if($tituloOutrosGanhos == 1){ echo "<h3>Outros Ganhos</h3>";}?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ganho</th>
                    <th>Valor</th>
                    <th>data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
                </tr>
            </tbody>
        </table>

    <?php  $outrosGanhos+= (double) $fila[2];} print "<h4>Ganho Total com outros setores (R$) | $outrosGanhos reais |</h4"; $outrosGanhos = 0 ;$tituloOutrosGanhos = 0;}?>
    
    <?php 
    if($data1!= null && $assunto == "Orçamento Geral"){ 
    echo "<h4>De: $data1 Até:  $data2</h4>";
    foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
    $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
            <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ganho</th>
                    <th>Valor</th>
                    <th>data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
                </tr>
            </tbody>
        </table>
    <?php  $outros+= (double) $fila[2];} echo "<h4>Gasto Total com outros setores (R$) | $outros reais |</h4"; $tituloOutros = 0;?>
    <br>
    
    <?php foreach (controlFuncionario::listarOutrosGanhos($data1, $data2) as $fila) { 
             $tituloOutrosGanhos++; if($tituloOutrosGanhos == 1){ echo "<h3>Outros Ganhos</h3>";}?>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Ganho</th>
                        <th>Valor</th>
                        <th>data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $fila[0] ?></td>
                        <td><?= $fila[1] ?></td>
                        <td><?= $fila[2] ?></td>
                        <td><?= $fila[3] ?></td>
                    </tr>
                </tbody>
            </table>
    <?php  $outrosGanhos+= (double) $fila[2];} print "<h4>Ganho Total com outros setores (R$) | $outrosGanhos reais |</h3"; $outrosGanhos = 0 ;$tituloOutrosGanhos = 0;?>
    <br>
   
   <?php foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
    $tituloPedidos++;  if($tituloPedidos < 2 ){ echo "<br><h3>Pedidos</h3>";}?>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Pedido</th>
                        <th>Valor</th>
                        <th>data</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td><?= $fila[0] ?></td>
                        <td><?=nl2br($fila[1]); ?></td>
                        <td><?= $fila[2] ?></td>
                        <td><?= $fila[3] ?></td>
                    </tr>
                </tbody>
            </table>
    <?php  $pedidos+= (double) $fila[2];} print "<h4>Ganho Total com pedidos (R$) | $pedidos reais |</h4"; $tituloPedidos = 0;?>
    <br>
    
    <?php foreach (controlFuncionario::listarProdutos($data1, $data2) as $fila) { 
    $tituloProdutos++; if($tituloProdutos < 2){ echo "<br><h3>Produtos</h3>";} ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Unidades</th>
                    <th>Utilizado</th>
                    <th>Valor Total</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $fila[0] ?></td>
                    <td><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[4] ?></td>
                    <td><?= $fila[5] ?></td>
                </tr>
            </tbody>
        </table>
    <?php  $produtos+= (double) $fila[4];} print "<h4>Gasto Total com produtos (R$) | $produtos reais |</h4"; $tituloProdutos = 0;?>
    <br>
    <br> 
    <?php $saldogasto = $outros+$funcionarios+$produtos; $saldoganho = $pedidos; $bruto = $saldoganho - $saldogasto;
    echo "<table>
            <thead>
            <tr>
            <th colspan ='3'><h2>Resumo Geral</h2></th>
        </tr>
            </thead>
            <tbody>
            <tr>
                    <th>Total Gasto</th>
                    <th>Ganho Total</th>
                    <th>Resultado do Período</th>
                </tr>
                <tr>
                    <td>$saldogasto</td>
                    <td>$pedidos</td>
                    <td>$bruto</td>
                </tr>
            </tbody>
        </table>";} 
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