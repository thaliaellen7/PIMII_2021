<?php
	require_once '../../Model/Gerente/modelGerente.php';
$rol = controlGerente::buscarEmpresaPorId($_SESSION['idEmpresa']);
if ($_SESSION['autenticado'] != true){
  header('Location: ../../');
  } else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
    session_destroy();
    echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Você não tem permissão para acessar esta página!');
  window.location.href='../../';
  </SCRIPT>");
  } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Headers - 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/reset.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header-4.css" />
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
                    Empresa: <?=$rol[0]?>
        
        </div>
        <div class="site-header__end">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
              menu
            </button>
            <ul class="nav__wrapper">
              
              <li class="nav__item">
              <a href="Funcionario/homeFuncionario.php">
                    <img
                    width="30px"
                    src="../../img/funcionário.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Funcionários</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="Pedido/homePedido.php">
                    <img
                    width="33px"
                    src="../../img/pedidos.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Pedidos</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="OutrosGastos/homeOutrosGastos.php">
                    <img
                    width="38px"
                    src="../../img/gastos.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Gastos</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="OutrosGanhos/homeOutrosGanhos.php">
                    <img
                    width="34px"
                    src="../../img/ganhos.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Ganhos</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="Financeiro/pesquisarPorPeriodo.php?data1=null&data2=null&assunto=null">
                    <img
                    width="30px"
                    src="../../img/financeiro.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Financeiro</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="Cardapio/homeCardapio.php">
                    <img
                    width="30px"
                    src="../../img/cardapio.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Cardápio</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="Produto/homeProduto.php">
                    <img
                    width="30px"
                    src="../../img/produtos.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Estoque</span>
                </a>
              </li>
              <li class="nav__item">
              <a href="../logout.php">
                    <img
                    width="30px"
                    src="../../img/logout.png"
                      class="active-item"
                      style="fill-opacity: 1"
                    >
                  <br>
                  <span>Logout</span>
                </a>
              </li>
              
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!-- Header End -->
    
    <script src="css/header-4.js"></script>
  </body>
</html>
