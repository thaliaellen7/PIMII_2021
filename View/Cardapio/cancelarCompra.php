<?php
session_start();
session_destroy();
header('Location: ../Cliente/homeCliente.php');
exit();