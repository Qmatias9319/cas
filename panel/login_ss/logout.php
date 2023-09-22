<?php
session_start();
unset($_SESSION['nombre']);
unset($_SESSION['idUsuario']);
header('Location: index.php');
?>
