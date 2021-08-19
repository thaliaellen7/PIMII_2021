<?php require_once '../../Model/Cliente/modelCliente.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Clientes </title>
	<link rel="stylesheet" href="css/stylehomeCliente.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<br><br><br>
		<div class="container">
		<div class="row slider">
			<?php foreach (controlCliente::listarEmpresas() as $fila) { $_SESSION['nomeEmpresaUtilizada']=$fila[1]; ?>
				
				<div class="col-md-12">
        <div class="details">
           
			<a href = "../Cardapio/homeCardapio.php?idEmpresa=<?=$fila[0]?>&nomeEmpresa=<?=$fila[1]?>" > <p><?php echo'<img width="100%" src="upload/'.$fila[11].'" />'; ?></p></a>
        </div>
    </div>
	
			<?php } ?>
</div>
</div>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$('.slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>
</body>
</html>