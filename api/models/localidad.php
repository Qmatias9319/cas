<?php
require_once('./config/database.php');
class LocalidadModel{
  private $pdo;
  private $table = "tblLocalidad"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createLocalidad($data){

  }

  public function getAllLocalidades($id){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblLocalidad
              WHERE idMunicipio = ?;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$id]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

}
?>