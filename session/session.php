<?php 
session_start();
if(isset($_SESSION['idUsuario'])){
    $datos_sesion = array(
      'nombre' => $_SESSION['nombre'],
      'id' => $_SESSION['idUsuario'],
      'celular' => $_SESSION['celular'],
      'email' => $_SESSION['email']
    );
    echo json_encode($datos_sesion);
}else{
    echo -1;
}
?>