<?php
require_once('./config/database.php');
class DetalleMilitarModel{
  private $pdo;
  private $table = "tblDetalleMilitar"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function create($data){
    try {
      $sql = "INSERT INTO $this->table
              (codigoBoleta,grado,carnetMilitar,carnetCossmil,idArma,fechaIncorporacion,idFuerza,idSocio)
              VALUES
              ('".$data['codBoleta']."',".$data['grado'].",'".$data['carnetMilitar']."','".$data['carnetCossmil']."','".$data['arma']."','".$data['fechaIncorporacion']."',".$data['provieneFuerza'].",".$data['idSocio'].");";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $lastInsert = $this->pdo->lastInsertId();
      if($lastInsert != false){
        return $lastInsert;
      }else{
        return -1;
      }      
    } catch (\Throwable $th) {
      return -1;
    }
  }

  public function getDetalleMilitar(){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM $this->table;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

}
?>