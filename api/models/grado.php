<?php
require_once('./config/database.php');
class GradoModel{
  private $pdo;
  private $table = "tblGrado"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createGrado($data){

  }

  public function getAllGrados($id){
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