<?php
session_start();
session_destroy();
header('Location: ../Cliente/acompanharPedido.php');
exit();