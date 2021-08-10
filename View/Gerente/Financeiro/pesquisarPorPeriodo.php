<?php $saldoBruto = 0; require_once '../../../Model/Gerente/Financeiro/modelFinanceiro.php' ?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadPedidoGarcon.css">
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
		<form action="#" method="post">
			<fieldset>
			<legend><b>Calcular gastos e ganhos por período</b></legend>
			<br>
			<div class="inputBox">
				De: <input id= "inputUser" name="data1" placeholder="00/00/0000" required autofocus maxlength="10" OnKeyPress="formatar(##/##/###, this)" />
                Até: <input id= "inputUser" name="data2" placeholder="00/00/0000" required autofocus maxlength="10" OnKeyPress="formatar(##/##/###, this)" />
                Sobre: <select id= "inputUser" name="assunto" >
							<option value="Funcionários">Funcionários</option>
							<option value="Produtos">Produtos</option>
							<option value="Pedidos">Pedidos</option>
							<option value="Outros Gastos">Outros Gastos</option>
							<option value="Orçamento Geral">Orçamento Geral</option>
				</select>
                <input id= "submit" name="a" type="submit" value="Calcular"/>
			</div>
			<br>
			</fieldset>
	</div><!--CONTAINER-A-->
	</form>
    <br>
    <?php
    $data1 = $_POST['data1'];
    $data2 = $_POST['data2'];
    $assunto = $_POST['assunto'];
    $tituloFuncionario = 0;
    $tituloProdutos = 0;
    $tituloPedidos = 0;
    $tituloOutros = 0;
    $tituloGeral = 0;
    $funcionarios = 0;
    $pedidos = 0;
    $produtos = 0;
    $outros = 0;
    if($data1!= null && $assunto == "Funcionários"){
        foreach (controlFuncionario::listarFuncionarios($data1, $data2) as $fila) { 
             $tituloFuncionario++; if($tituloFuncionario == 1){ echo "<h3>Funcionários</h3>";}?>
             <table>
             <tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
        </tr>
        </table>
    <?php $saldoBruto+= (double) $fila[3]; $funcionarios+= (double) $fila[3];} print "<h3>Gasto Total com funcionários (R$) | $funcionarios reais |</h3"; $funcionarios = 0 ;$tituloFuncionario = 0;}
    if($data1!= null && $assunto == "Produtos"){
        foreach (controlFuncionario::listarProdutos($data1, $data2) as $fila) { 
             $tituloProdutos++; if($tituloProdutos == 1){ echo "<h3>Produtos</h3>";} ?>
             <table>
             <tr>
                    <td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
                    </tr>
        </table>
    <?php $saldoBruto+= (double) $fila[3]; $produtos+= (double) $fila[3];} print "<h3>Gasto Total com produtos (R$) | $produtos reais |</h3"; $produtos = 0 ;$tituloProdutos = 0;}
    if($data1!= null && $assunto == "Pedidos"){
        foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
             $tituloPedidos++; if($tituloPedidos == 1){ echo "<h3>Pedidos</h3>";}?>
             <table>
             <tr>
              <td><?= $fila[0] ?></td>
              <td><?=nl2br($fila[1]); ?></td>
			  <td><?= $fila[2] ?></td>
			 </tr>
        </table>
    <?php $saldoBruto+= (double) $fila[2]; $pedidos+= (double) $fila[2];} print "<h3>Ganho Total com Pedidos (R$) | $pedidos reais |</h3"; $pedidos = 0 ;$tituloPedidos = 0;}
    if($data1!= null && $assunto == "Outros Gastos"){
        foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
             $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
             <td><?= $fila[0] ?></td>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
    <?php $saldoBruto+= (double) $fila[2]; $outros+= (double) $fila[2];} print "<h3>Gasto Total com outros setores (R$) | $outros reais |</h3"; $outros = 0 ;$tituloOutros = 0;}?>

    <?php if($data1!= null && $assunto == "Orçamento Geral"){
         foreach (controlFuncionario::listarOutros($data1, $data2) as $fila) { 
            $tituloOutros++; if($tituloOutros == 1){ echo "<h3>Outros Gastos</h3>";}?>
            <td><?= $fila[0] ?></td>
            <td><?= $fila[1] ?></td>
            <td><?= $fila[2] ?></td>
<?php $saldoBruto+= (double) $fila[2]; $outros+= (double) $fila[2];} print "<h3>Gasto Total com outros setores (R$) | $outros reais |</h3"; $outros = 0 ;$tituloOutros = 0;?>
<?php foreach (controlFuncionario::listarPedidos($data1, $data2) as $fila) { 
            $tituloPedidos++; if($tituloPedidos == 1){ echo "<h3>Pedidos</h3>";}?>
             <table>
             <tr>
            <td><?= $fila[0] ?></td>
            <td><?=nl2br($fila[1]); ?></td>
            <td><?= $fila[2] ?></td>
            </tr>
        </table>
<?php $saldoBruto+= (double) $fila[2]; $pedidos+= (double) $fila[2];} print "<h3>Ganho Total com pedidos (R$) | $pedidos reais |</h3"; $pedidos = 0 ;$tituloPedidos = 0;}?>
</body>
</html>