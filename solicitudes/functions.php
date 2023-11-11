<?php

include('../api/config/database.php');
function querySql($sql){
  try {
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result){
      return $result[0];
    }
  } catch (\Throwable $th) {
    print_r($th);
  }
  return array();
}

function antiguedad($id){
  $pdo = connectToDatabase();
  try {
    $sql = "SELECT fechaAceptacion FROM tblRegistro WHERE idSocio = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $fechaInicio = new DateTime($result[0]['fechaAceptacion']);
    $fechaActual = new DateTime();
    $diferencia = $fechaInicio->diff($fechaActual);
    $meses = ($diferencia->y * 12) + $diferencia->m;
    return $meses;
  } catch (\Throwable $th) {
    print_r($th);
  }
  return null;
}



?>