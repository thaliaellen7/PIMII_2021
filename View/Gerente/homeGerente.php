<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Gerente</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stylehomeGerente.css">
  </head>
  
<body>
  <header>
      <div class="nav">
        <img title= "Atualizar Pedido" width="60px" height="70px" src="../../img/logo.png"/>
        <div class="empresa">
        <p>Pizzaria Borda de Ouro</p>
        </div>
        <div class="nome">
        <p><?php echo $_SESSION['nomeFuncionario'];?></p>
        </div>
        <div id="link_logout">
          <a href="../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../img/logout.png"/>
          <br> sair</a>
        </div>
      </div>   
  </header>
  
    <div class="container">
      <a id= "link_produtos" href="Produto/homeProduto.php"><img title= "Atualizar Pedido" width="130px" src="../../img/produtos.png"/><h4>Gerenciar <br> Produtos</h4></a>
      <a id= "link_funcionarios" href="Funcionario/homeFuncionario.php"><img title= "Atualizar Pedido" width="130px" src="../../img/funcionário.png"/><h4>Gerenciar <br> Funcionários</h4></a>
      <a id= "link_pedidos" href="Pedido/homePedido.php"><img title= "Atualizar Pedido" width="140px" src="../../img/pedidos.png"/><h4>Gerenciar <br> Pedidos</h4></a>  
    </div>
    <div class="container-a">
      <a id= "link_gastos" href="OutrosGastos/homeOutrosGastos.php"><img title= "Atualizar Pedido" width="160px" src="../../img/gastos.png"/> <br> <h4>Gastos +</h4></a>
      <a id= "link_financeiro" href="Financeiro/pesquisarPorPeriodo.php?data1=null&data2=null&assunto=null"><img width="150px" src="../../img/financeiro.png"/><br><h4>Financeiro</h4></a>
      <a id= "link_ganhos" href="OutrosGanhos/homeOutrosGanhos.php"><img title= "Atualizar Pedido" width="150px" src="../../img/ganhos.png"/> <br> <h4>Ganhos +</h4></a>
    </div>
    <div class="container-b">
      <a id= "link_cardapio" href="Cardapio/homeCardapio.php"><img width="120px" src="../../img/cardapio.png"/><br><h4>Gerenciar <br> Cardápio </h4></a>
      <div><br></div>
    </div>
  </body>
</html>