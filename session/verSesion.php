<?php
session_start();
if(isset($_SESSION['idUsuario'])){
    echo 1;
}else{
    echo -1;
}
?>