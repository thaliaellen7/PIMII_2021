<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            
            <div class="first-column">
                <div>
                    <img src="../../img/logo.png" width="170" height="200" >
                </div>
                <h2 class="title title-primary">Bem-vindo <br> ao <br> Querocumê!</h2>
                <p class="description description-primary"> <u>O sistema administrativo do seu restaurante!</u> </p>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Login</h2>
                
                <p class="description description-second">Use seu email e senha para efetuar o login:</p>
                <form action="../../Model/Login/modelLogin.php" method="post" class="form">

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input name= "email" type="email" placeholder="Email" required autofocus>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input name= "senha" type="password" placeholder="Password" required autofocus>
                    </label>
                    <button class="btn">login</button>        
                </form>

            </div>
        </div>
    </div>
</body>
</html>