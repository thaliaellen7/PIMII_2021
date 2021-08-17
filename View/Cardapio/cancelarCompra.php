<?php
session_start();
session_destroy();
header('Location: acompanharPedido.php?pTelefone=null');
exit();