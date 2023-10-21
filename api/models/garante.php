<?php
require_once('./config/database.php');
class GaranteModel{
  private $pdo;
  private $table = "tblGarante"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createGarantes($idPrestamo, $idGarante1, $idGarante2){
    try {
      $sql = "INSERT INTO $this->table (idPrestamo, idSocio) VALUES(?, ?), (?, ?);";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$idPrestamo, $idGarante1, $idPrestamo, $idGarante2]);
      $lastInsert = $this->pdo->lastInsertId();
      if($lastInsert != false){
        return $lastInsert;
      }else{
        return -1;
      }
    } catch (\Throwable $th) {
      print_r($th);
      return -1;
    }
  }
}
?>