<?php
require_once('./config/database.php');
class ViviendaModel{
  private $pdo;
  private $table = "tblVivienda"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function create($data){
    try {
        $sql = "INSERT INTO $this->table 
                (calle,zona,numero,localidad,ciudad,idSocio)
                VALUES
                ('".$data['avenida']."','".$data['zona']."','".$data['nroDir']."','".$data['localidad']."','".$data['ciudad']."',".$data['idSocio'].");";
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

  public function getAllViviendas($id){
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