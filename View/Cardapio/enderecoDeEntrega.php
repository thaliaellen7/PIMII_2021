<?php session_start();?>
<!DOCTYPE html>
<html lang="br">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styleenderecoDeEntrega.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form id= "form" action="../../Control/Cliente/controlCliente.php" method="post">
			<fieldset>
			<legend><b>Adicionar Pedido</b></legend>
			<br>
			<p id= "required">Pedido</p> 
			<div id="pedido">
			<textarea id= "inputUsertext" name="descricao" rows="15" cols="30" required readonly>
				<?php $total = 0;
                 foreach ($_SESSION['carrinho'] as $key => $value){ $total += $value['quantidade'] * $value['preco']?>
                <?= $value['quantidade'] ?> <?= $value['nome'] ?>
                <?php } ?> 
			</textarea>

				</div>
				<div class="inputBox" >
				
				<input  name="idEmpresa" type="hidden"  value="<?= $_SESSION['empresaUtilizada'] ?>"/>

				<textarea name="descricao" style="display:none" readonly>
                <?php $total = 0;
                 foreach ($_SESSION['carrinho'] as $key => $value){ $total += $value['quantidade'] * $value['preco']?>
                             <?= $value['quantidade'] ?> <?= $value['nome'] ?> 
                <?php } $val_total = number_format($total, 2);?>  
                </textarea>
			</div>
			<p >Observação</p>
			<div class="inputBox">
				<input id= "inputUser" name="observacao" placeholder="Observação"/>
			</div>
			<br>
			<p  id= "required">Valor</p>
			<div class="inputBox">
				<input id= "inputUser" name="preco" placeholder="Preço" value="<?=$val_total?>" readonly required autofocus />
			</div>
			<br>
			<div class="inputBox" >
				<p id= "required">Forma de pagamento</p>
				<select id= "pagamento" name="formaDePagamento" required>
					<option value="Crédito/Débito">Crédito/Débito</option>
					<option value="Dinheiro">Dinheiro</option>
					<option value="Pix">Pix</option>
				</select>
			</div>
			<div id="troco">
				<label for="troco"></label>
				<input id="inputUser" type="text" name="troco" value="0" placeholder="Troco para quanto?">
			</div>
			<br>
			<div class="inputBox" >
				<p id= "required">Forma de entrega</p>
				<select id= "entrega" name="formaDeEntrega" required >
							<option value="Balcão">Balcão</option>
							<option value="Delivery">Delivery</option>
				</select>
			</div>
			<br>
			<p id= "required">Nome</p>
			<div class="inputBox" >
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p id="required">Telefone para Contato</p>
			<div >
				<label for="telefone"></label>
				<input id= "telefone" placeholder= "(00) 00000-0000" name="telefone" required autofocus maxlength="15" >
			</div>

			<div id="submit01">
			<input  id="submit0" name="a" type="submit" value="Finalizar Pedido"/>
			</div>
		</fieldset> <!--PEDIDO-->
		<br>
		<div id="endereço">
		<fieldset>
			<legend><b>Endereço</b></legend>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua" />
			</div>
			<p >N°</p>
			<div class="inputBox">
				<input id= "inputUser" name="numero" placeholder="Numero"  />
			</div>
			<p >Bairro</p>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" placeholder="Bairro"  />
			</div>
			<p >Complemento</p>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" placeholder="Complemento"  />
			</div>
			<p >Ponto de Referência</p>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência"  />
			</div>
			<p >Estado</p>
			<div class="inputBox">
				<input id= "inputUser" id="estado" value="CE" name="estado" placeholder="Estado"  />
			</div>
			<p >Cidade</p>
			<div class="inputBox">
				<input id= "inputUser" id="cidade" value="Canindé" name="cidade" placeholder="Cidade"  />
			</div>
			<br>
			
			<input id= "submit02" name="a" type="submit" value="Finalizar Pedido"/>
			<br>
			<br>
			</div>
	</fieldset>
	</div>

	</div><!--CONTAINER-A-->
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
	<script type= "text/javascript" src= "js/mostrartroco.js"></script>
	<script type= "text/javascript" src= "js/mostrarendereço.js"></script>
</body>
</html>