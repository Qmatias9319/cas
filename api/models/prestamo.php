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
  public function aceptarPrestamo($idPrestamo, $obs){
    date_default_timezone_set("America/La_Paz");
    $fecha = date('Y-m-d');
    try {
      $sql = "UPDATE $this->table SET estado = 'ACEPTADO', observacion = ?, fechaAceptacion = ? WHERE idPrestamo = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$obs, $fecha, $idPrestamo]);
      return $stmt->rowCount();
    } catch (\Throwable $th) {
      return -1;
    }
  }
  public function rechazarPrestamo($idPrestamo, $obs){
    try {
      $sql = "UPDATE $this->table SET estado = 'RECHAZADO', observacion = ? WHERE idPrestamo = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$obs, $idPrestamo]);
      return $stmt->rowCount();
    }catch (\Throwable $th) {
      return -1;
    }
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
  public function antiguedad($fecha){
    date_default_timezone_set("America/La_Paz");
    $f_fin = date_create(date('Y-m-d'));
    $res = date_diff(date_create($fecha), $f_fin);
    return $res->format("%y años %m meses %d dias");
  }
  public static function prestamoGarantes($idPrestamo, $pdo){
    try {
      $sql1 = "SELECT tg.idPrestamo, tg.idSocio, concat(ts.paterno, ' ', ts.materno, ' ', ts.nombre) as nombre, ts.ci, tr.fechaAceptacion, tgg.detalle
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
  public function esGarante($idSocio, $idPrestamo){
    $sql = "SELECT concat(ts.paterno, ' ', ts.nombre) as nombre FROM tblPrestamo tp
    INNER JOIN (
      SELECT idSocio, idPrestamo FROM tblGarante
      WHERE idSocio = $idSocio
    ) tmp
    ON tp.idPrestamo = tmp.idPrestamo
    INNER JOIN tblSocio ts
    ON ts.idSocio = tp.idSocio
    WHERE tp.idPrestamo != $idPrestamo;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cad = '';
    if(count($res) > 0){
      foreach($res as $r){
        $cad .= ' | '.$r['nombre'];
      }
    }
    return array('cantidad'=>count($res), 'cad'=>$cad);
  }

  public function getAceptados(){
    $res = null;
    try {
      $sql = "SELECT tp.*, concat(ts.nombre, ' ', ts.paterno, ' ', ts.materno) as usuario, concat(ts.ci,' ',te.detalle) as ci
      FROM tblPrestamo tp
      INNER JOIN tblSocio ts ON tp.idSocio = ts.idSocio
      INNER JOIN tblExpedicion te ON ts.idExpedicion = te.idExpedicion
      WHERE tp.estado LIKE 'ACEPTADO'; ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      print_r($th);
    }
    return $res;
  }
}
?>