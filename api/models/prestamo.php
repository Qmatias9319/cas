<?php
require_once('./config/database.php');
require_once('./models/garante.php');
class PrestamoModel{
  private $pdo;
  private $table = "tblPrestamo"; 

  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function createPrestamo($data){
    try {
      session_start();
      $id = $_SESSION['idUsuario'];
      if($id != $data['idg2'] && $id != $data['idg1']){
        $sql = "INSERT INTO $this->table (idSocio, tipo, monto, motivo, plazo, numeroCuenta, estado) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $data['tipoPrestamo'], $data['monto'], $data['motivo'], $data['plazo'], $data['nroCta'], 'SOLICITUD']);
        $lastInsert = $this->pdo->lastInsertId();
        if($lastInsert != false){
          if(isset($data['idg1'])){
            $garante = new GaranteModel();
            $res = $garante->createGarantes($lastInsert, $data['idg1'], $data['idg2']);
            if($res > 0){
              return $lastInsert;
            }else{
              return -1;
            }
          }
          return $lastInsert;
        }else{
          return -1;
        }
      }else{
        return -10;
      }
    } catch (\Throwable $th) {
      print_r($th);
      return -1;
    }
  }

  public function getPrestamoUser($idUser){
    $res = null;
    try {
      $sql = "SELECT * FROM $this->table WHERE idSocio = ?;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$idUser]);
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


  public function getByCI($ci){
    $res = null;
    try {
      $sql = "SELECT ci FROM tblCliente WHERE ci LIKE '$ci';";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (\Throwable $th) {
      print_r($th);
    }
    return $res;

  }

  public function getSolicitudes(){
    $res = null;
    try {
      $sql = "SELECT tp.*, concat(ts.nombre, ' ', ts.paterno, ' ', ts.materno) as usuario, concat(ts.ci,' ',te.detalle) as ci
      FROM tblPrestamo tp
      INNER JOIN tblSocio ts ON tp.idSocio = ts.idSocio
      INNER JOIN tblExpedicion te ON ts.idExpedicion = te.idExpedicion
      WHERE tp.estado LIKE 'SOLICITUD'; ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }
  public function getGarantes($idPrestamo){
    $res = null;
    try {
      $sql = "SELECT tp.tipo, ts.nombre, concat(ts.paterno, ' ', ts.materno) as apellidos FROM tblPrestamo tp
      LEFT JOIN tblGarante tg ON tp.idPrestamo = tg.idPrestamo
      LEFT JOIN tblSocio ts ON ts.idSocio = tg.idSocio
      WHERE tp.idPrestamo = ?;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$idPrestamo]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }

  public function getDetalle($idPrestamo){
    $res = null;
    try {
      $sql = "SELECT * FROM $this->table WHERE idPrestamo = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$idPrestamo]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($res) > 0){
        if($res[0]['tipo'] == 'REGULAR'){
          return array('REGULAR', self::prestamoData($idPrestamo, $this->pdo), self::prestamoGarantes($idPrestamo, $this->pdo));
        }else{
          return array('COMUN', self::prestamoData($idPrestamo, $this->pdo));
        }
      }
    }catch (\Throwable $th) {
      //throw $th;
    }
    return $res;
  }
  public static function prestamoRegular(){

  }
  public static function prestamoData($idPrestamo, $pdo){
    $res = null;
    $sql = "SELECT tp.*, ts.nombre, ts.paterno, ts.materno, ts.celular, ts.correo, tr.fechaAceptacion, tg.detalle AS grado 
    FROM tblPrestamo tp INNER JOIN tblSocio ts ON ts.idSocio = tp.idSocio
    INNER JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
    INNER JOIN tblDetalleMilitar tdm ON tdm.idSocio = ts.idSocio
    INNER JOIN tblGrado tg ON tg.idGrado = tdm.grado
    WHERE tp.idPrestamo = $idPrestamo;";
    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $res[0];
    }catch(\Throwable $th){
      print_r($th);
      return null;
    }
  }
  public static function prestamoGarantes($idPrestamo, $pdo){
    $res = null;
    try {
      $sql1 = "SELECT tg.idSocio, concat(ts.paterno, ' ', ts.materno, ' ', ts.nombre) as nombre, ts.ci, tr.fechaAceptacion, tgg.detalle
      FROM tblgarante tg INNER JOIN tblSocio ts ON tg.idSocio = ts.idSocio
      INNER JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
      INNER JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
      INNER JOIN tblGrado tgg ON tgg.idGrado = td.grado
      WHERE tg.idPrestamo = $idPrestamo;";
      $stmt = $pdo->prepare($sql1);
      $stmt->execute();
      $garantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $garantes;
    } catch (\Throwable $th) {
      return null;
    }
  }
  public function esGarante($idSocio){
    $sql = "SELECT concat(ts.paterno, ' ', ts.nombre) as nombre FROM tblPrestamo tp
    INNER JOIN (
      SELECT idSocio, idPrestamo FROM tblGarante
      WHERE idSocio = $idSocio
    ) tmp
    ON tp.idPrestamo = tmp.idPrestamo
    INNER JOIN tblSocio ts
    ON ts.idSocio = tp.idSocio;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}
?>