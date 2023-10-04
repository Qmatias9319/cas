<?php
require_once('./config/database.php');
class EstadoCivilModel{
  private $pdo;
  private $table = "tblEstadoCivil"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createEstadoCivil($data){

  }

  public function getAllEstadosCiviles(){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblEstadoCivil;";
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