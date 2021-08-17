<?php session_start();?>
<!DOCTYPE html>
<html lang="br">
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
				

				<textarea name="descricao" style="display:none" readonly>
                <?php $total = 0;
                 foreach ($_SESSION['carrinho'] as $key => $value){ $total += $value['quantidade'] * $value['preco']?>
                             <?= $value['quantidade'] ?> <?= $value['nome'] ?> 
                <?php } ?>  
                </textarea>
			</div>
			<p >Observação</p>
			<div class="inputBox">
				<input id= "inputUser" name="observacao" placeholder="Observação"/>
			</div>
			<br>
			<p  id= "required">Valor</p>
			<div class="inputBox">
				<input id= "inputUser" name="preco" placeholder="Preço" value="<?=$total?>" readonly required autofocus />
			</div>
			<br>
			<div class="inputBox" >
				<p id= "required">Forma de pagamento</p>
				<select id= "inputUser" name="formaDePagamento" requied>
					<option value="Crédito/Débito">Crédito/Débito</option>
					<option value="Dinheiro">Dinheiro</option>
					<option value="Pix">Pix</option>
				</select>
			</div>
			<br>
			<div class="inputBox" >
				<p id= "required">Forma de entrega</p>
				<select id= "inputUser" name="formaDeEntrega" required >
							<option value="Delivery">Delivery</option>
							<option value="Balcão">Balcão</option>
				</select>
			</div>
			<br>		
		</fieldset> <!--PEDIDO-->
		<br>
		<fieldset>
			<legend><b>Endereço</b></legend>
			<br>
			<p id= "required">Nome</p>
			<div class="inputBox" >
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua"  />
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
				<input id= "inputUser" id="estado" name="estado" placeholder="Estado"  />
			</div>
			<p >Cidade</p>
			<div class="inputBox">
				<input id= "inputUser" id="cidade" name="cidade" placeholder="Cidade"  />
			</div>
			<br>
			<p id="required">Telefone para Contato</p>
			<div >
				<label for="telefone"></label>
				<input id= "telefone" type= "text" name="telefone" placeholder="Ex.: (00) 00000-0000"  maxlenght= "9"/>
			</div>
			
			<input id= "submit" name="a" type="submit" value="Finalizar Pedido"/>
			<br>
			<br>
			</div>
	</fieldset>
	</div><!--CONTAINER-A-->
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
</body>
</html>