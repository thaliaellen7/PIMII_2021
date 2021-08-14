<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stylehomeGerente.css">
  </head>
  
  <style>
        body{
        background-color: brown;
    }

    header{
      text-align:center;
      color:#FAF3D8;
    }
    .container{
        background-color: brown;
        width: 99vw;
        height: 70vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .link_logout {
        float: left;
        border-radius: 8px;
        text-align: right;
        padding: 10px;
        margin-left: 9%;
    }

    #link_clientes {
        border-radius: 8px;
        text-align: center;
        padding: 20px;
        background-color: rgb(240, 77, 77);
        margin: 5%;
        height: 300px;
    }

    #link_funcionarios {
        border-radius: 8px;
        text-align: center;
        padding: 20px;
        background-color: rgb(240, 77, 77);
        margin: 5%;
        height: 300px;
    }

    a:link, a:visited {
      text-decoration: none;
        color: #FAF3D8;
        font-size: large;
      }
    h1{
      font-size: 40px;
    }
    h4{
      font-size:20px;
    }    
    a:hover {
      text-decoration: underline;
        font-size: 105%;
      }
    a:active {
      text-decoration: none
      }
  </style>

  <header>  
  <h1>Bem Vindo ao Querocumê</h1> 
  </header>

  <body>
    
    <div class="container">
      <a id= "link_clientes" href="View/Cliente/homeCliente.php"> <h4>Você é cliente?<br><br></h4> <img width="100px" src="img/pedidos.png"/><h4><br><br>Fazer pedido</h4></a>
      <a id= "link_funcionarios" href="View/Login/homeLogin.php"> <h4>Você é funcionário?<br><br></h4> <img width="100px" src="img/funcionário.png"/><h4><br><br>Acessar Sistema</h4></a>
    </div>
    
  </body>
</html>