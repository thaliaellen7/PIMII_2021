<?php
session_start();
if (isset($_GET['idItem'])) {
    $idItem = (int) base64_decode($_GET['idItem']);
    $nomeItem = base64_decode($_GET['nomeItem']);
    $nomeEmpresa = base64_decode($_GET['nomeEmpresa']);
    $precoItem = base64_decode($_GET['precoItem']);
    $idEmpresa = (int) base64_decode($_GET['idEmpresa']);
    $acaoItem = $_GET['acaoItem'];
    $local = $_GET['local'];
    $_SESSION['empresaUtilizada'] = $idEmpresa;
if($acaoItem == "adicionar"){
    if(isset($_SESSION['carrinho'][$idItem])){
        $_SESSION['carrinho'][$idItem]['quantidade']++;
    } else {
        $_SESSION['carrinho'][$idItem] = array('idProduto'=>$idItem, 'quantidade'=>1, 'nome'=>$nomeItem, 'preco'=>$precoItem);
    }
} else if($acaoItem == "remover") {
    $_SESSION['carrinho'][$idItem]['quantidade']--;

    if($_SESSION['carrinho'][$idItem]['quantidade'] <= 0){
        unset($_SESSION['carrinho'][$idItem]);
    }
}
} else {
    print "deu ruim";
}
 
   if(($local == "carrinho" & $acaoItem == "adicionar") || ($local == "carrinho" & $acaoItem == "remover") ){
    header('Location: ../../View/Cardapio/carrinho.php?idEmpresa='.$idEmpresa.'&nomeEmpresa='.$nomeEmpresa.'');
} else if($local == "carrinho" & $acaoItem == "continuarComprando"){
    header('Location: ../../View/Cardapio/homeCardapio.php?idEmpresa='.$idEmpresa.'&nomeEmpresa='.$nomeEmpresa.'');
}else if($local == "cardapio" & $acaoItem == "adicionar") {
    header('Location: ../../View/Cardapio/homeCardapio.php?idEmpresa='.$idEmpresa.'&nomeEmpresa='.$nomeEmpresa.'');
}   
 
?>