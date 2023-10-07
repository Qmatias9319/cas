<?php
require_once('./config/database.php');
class SocioModel{
  private $pdo;
  private $table = "tblSocio";

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createSocio($data){
    try {
      //$vals = self::cadenaInsert($data);
      //$sql = "INSERT INTO tblSocio ".$vals[0]." VALUES".$vals[1];
      $sql = "INSERT INTO tblSocio 
              (nombre,paterno,materno,ci,idExpedicion,fechaNacimiento,idEstadoCivil,celular,correo,password,idMunicipio)
              VALUES
              ('".$data['nombres']."','".$data['paterno']."','".$data['materno']."','".$data['ci']."',".$data['expedido'].",'".$data['fechaNac']."',
              ".$data['estadoCivil'].",'".$data['celular']."','".$data['correoElec']."','".$data['password']."',".$data['municipio'].");";
      $stmt = $this->pdo->prepare($sql);
      //$stmt->execute($vals[2]);
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
  public function updateFks($idSocio, $idVivienda, $idDetalle, $idRegistro){
    try {
      $sql = "UPDATE $this->table SET idVivienda = ?, idDetalleMilitar = ?, idRegistro = ? WHERE idSocio = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$idVivienda, $idDetalle, $idRegistro, $idSocio]);
      return $stmt->rowCount();
    } catch (\Throwable $th) {
      print_r($th);
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
      // $sql = "SELECT * FROM $this->table WHERE correo = ? AND password = ?";
      $sql = "SELECT * FROM $this->table WHERE correo = ? AND password = ? ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$correo, $pass]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function getAllData($id){
    $res = null;
    try {
      $sql = "SELECT ts.*, te.detalle as expedido, tec.detalle as estadoCivil, tv.*, tdd.detalle as ciudad, td.*, tf.detalle as fuerza, tg.detalle as grado, tp.*, taa.detalle as arma
      FROM tblSocio as ts
      LEFT JOIN tblExpedicion te ON te.idExpedicion = ts.idExpedicion
      LEFT JOIN tblEstadoCivil tec ON tec.idEstadoCivil = ts.idEstadoCivil
      LEFT JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
      LEFT JOIN tblDepartamento tdd ON tdd.idDepartamento = tv.idDepartamento
      LEFT JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
      LEFT JOIN tblFuerza tf ON tf.idFuerza = td.idFuerza
      LEFT JOIN tblGrado tg ON tg.idFuerza = tf.idFuerza
      LEFT JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
      LEFT JOIN tblPrestamo tp ON tp.idSocio = ts.idSocio
      LEFT JOIN tblArma taa ON taa.idArma = td.idArma
      WHERE ts.idSocio = ?;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$id]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function getAllDataPrestamo($id){
    $res = null;
    try {
      $sql = "SELECT ts.*, te.detalle as expedido, tec.detalle as estadoCivil, tv.*, td.*, tf.detalle as fuerza, tg.detalle as grado, tp.*
              FROM $this->table ts
              LEFT JOIN tblExpedicion te ON te.idExpedicion = ts.idExpedicion
              LEFT JOIN tblEstadoCivil tec ON tec.idEstadoCivil = ts.idEstadoCivil
              LEFT JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
              LEFT JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
              LEFT JOIN tblFuerza tf ON tf.idFuerza = td.idFuerza
              LEFT JOIN tblGrado tg ON tg.idFuerza = tf.idFuerza
              LEFT JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
              LEFT JOIN tblPrestamo tp ON tp.idSocio = ts.idSocio
              WHERE tp.prestamo = ? ;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$id]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }


  public function getSociosEspera(){
    $sql = "SELECT idUsuario, concat(paterno, ' ', materno) as apellidos, nombres, concat(ci,' ',expedido) as ci, fechaNac, celular, provieneFuerza FROM $this->table WHERE aceptado LIKE 'NO';";
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
    $sql = "SELECT idUsuario, concat(paterno, ' ', materno) as apellidos, nombres, concat(ci,' ',expedido) as ci, fechaNac, celular, provieneFuerza, observacion, fechaAceptado FROM $this->table WHERE aceptado LIKE 'SI';";
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
      $sql = "SELECT concat(paterno, ' ', materno, ' ', nombres) as nombre, estadoCivil, correoElec, ciudad, localidad, concat(avenida,' ',nroDir) as direccion, provieneFuerza, fechaIncorporacion, carnetMilitar, carnetCossmil, arma, concat(ci,' ', expedido) as ci, codBoleta, fechaNac, grado, celular  FROM $this->table WHERE idUsuario = ? ";
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
      $sql = "DELETE FROM $this->table WHERE idUsuario = ?";
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
    $sql = "UPDATE $this->table SET aceptado = 'SI', observacion = ?, fechaAceptado = ? WHERE idUsuario = ?";
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
      $sql = "SELECT idSocio FROM $this->table WHERE ci LIKE '$ci';";
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