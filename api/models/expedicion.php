<?php
require_once('./config/database.php');
class ExpedicionModel{
  private $pdo;
  private $table = "tblExpedicion"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createExpedicion($data){

  }

  public function getAllExpediciones(){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblExpedicion;";
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