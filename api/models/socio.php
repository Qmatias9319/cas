<?php
require_once('./config/database.php');
class SocioModel{
  private $pdo;

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createSocio($data){
    try {
      $vals = self::cadenaInsert($data);
      $sql = "INSERT INTO tblCliente".$vals[0]." VALUES".$vals[1];
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($vals[2]);
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

  public static function cadenaInsert($arr){
    $cadena = '';
    $nombresCad = '';
    $values = [];
    foreach ($arr as $key => $val) {
      $nombresCad .= $key . ',';
      $cadena .= '?,';
      $values[] = $val;
    }
    $nombresCad = rtrim($nombresCad, ',');
    $cadena = rtrim($cadena, ',');
    $nombresCad = '('.$nombresCad.')';
    $cadena = '('.$cadena.')';
    return [$nombresCad,$cadena, $values];
  }

  public function getSocio($correo, $pass){
    $res = null;
    try {
      $sql = "SELECT * FROM tblCliente WHERE correoElec = ? AND password = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$correo, $pass]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }


  public function getSociosEspera(){
    $sql = "SELECT idUsuario, concat(paterno, ' ', materno) as apellidos, nombres, concat(ci,' ',expedido) as ci, fechaNac, celular, provieneFuerza FROM tblCliente WHERE aceptado LIKE 'NO';";
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function getSociosAceptados(){
    $sql = "SELECT idUsuario, concat(paterno, ' ', materno) as apellidos, nombres, concat(ci,' ',expedido) as ci, fechaNac, celular, provieneFuerza, observacion, fechaAceptado FROM tblCliente WHERE aceptado LIKE 'SI';";
    try {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function getDetallesById($id){
    $res = array();
    try {
      $sql = "SELECT concat(paterno, ' ', materno, ' ', nombres) as nombre, estadoCivil, correoElec, ciudad, localidad, concat(avenida,' ',nroDir) as direccion, provieneFuerza, fechaIncorporacion, carnetMilitar, carnetCossmil, arma, concat(ci,' ', expedido) as ci, codBoleta, fechaNac, grado, celular  FROM tblCliente WHERE idUsuario = ? ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$id]);
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function deleteSocioEspera($id){
    $res = null;
    try {
      $sql = "DELETE FROM tblCliente WHERE idUsuario = ?";
      $stmt = $this->pdo->prepare($sql);
      if($stmt->execute([$id])){
        $res = 1;
      }
    } catch (\Throwable $th) {
      return null;
    }
    return $res;
  }

  public function aceptarSocio($id, $observacion){
    $res = null;
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d H:i:s');
    $sql = "UPDATE tblCliente SET aceptado = 'SI', observacion = ?, fechaAceptado = ? WHERE idUsuario = ?";
    try {
      $stmt = $this->pdo->prepare($sql);
      if($stmt->execute([$observacion, $fecha, $id])){
        $res = 1;
      }
    } catch (\Throwable $th) {
      print_r($th);
      return null;
    }
    return $res;
  }

  public function getByCI($ci){
    $res = null;
    try {
      $sql = "SELECT idUsuario FROM tblCliente WHERE ci LIKE '$ci';";
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