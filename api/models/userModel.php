<?php
require_once('./config/database.php');
class UserModel{
  private $pdo;

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createSocio($data){
    try {
      return 1;
    } catch (\Throwable $th) {
      return -1;
    }
  }

  public function getUser($correo, $pass){
    $res = null;
    try {
      $sql = "SELECT idUsuario, usuario, nombres, rol FROM tblUsuario WHERE usuario = ? AND password = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$correo, $pass]);
      // ver cntidad
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }
}
?>