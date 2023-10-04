<?php
require_once('./config/database.php');
class DepartamentoModel{
  private $pdo;
  private $table = "tblDepartamento"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createDepartamento($data){

  }

  public function getAllDepartamentos(){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblDepartamento;";
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