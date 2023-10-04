<?php
require_once('./config/database.php');
class RegistroModel{
  private $pdo;
  private $table = "tblRegistro"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function create($data){
    try {
        $sql = "INSERT INTO $this->table
                (estado,idSocio)
                VALUES
                ('PENDIENTE',".$data['idSocio'].");";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $lastInsert = $this->pdo->lastInsertId();
        if($lastInsert != false){
          return $lastInsert;
        }else{
          return -1;
        }      
      } catch (\Throwable $th) {
        return -1;
      }
  }

  public function getAllRegistros(){
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