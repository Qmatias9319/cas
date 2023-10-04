<?php
require_once('./config/database.php');
class FuerzaModel{
  private $pdo;
  private $table = "tblFuerza"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createFuerza($data){

  }

  public function getAllFuerzas(){
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