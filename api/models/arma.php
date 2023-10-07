<?php
require_once('./config/database.php');
class ArmaModel{
  private $pdo;
  private $table = "tblArma"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function getAllArmas($id){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM $this->table
              WHERE idFuerza = ? ;";
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