<?php
require_once('./config/database.php');
class MunicipioModel{
  private $pdo;
  private $table = "tblMunicipio"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createMunicipio($data){

  }

  public function getAllMunicipios($id){
    $res = null;
    try {
      $sql = "SELECT * 
              FROM tblMunicipio
              WHERE idProvincia = ?;";
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