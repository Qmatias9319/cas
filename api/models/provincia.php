<?php
require_once('./config/database.php');
class ProvinciaModel{
  private $pdo;
  private $table = "tblProvincia"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createProvincia($data){

  }

  public function getAllProvincias($id){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblProvincia
              WHERE idDepartamento = ?;";
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