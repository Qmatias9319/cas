<?php
require_once('./config/database.php');
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
      $sql = "SELECT  tp.idPrestamo, tp.tipoPrestamo, tp.monto, tp.plazo, tp.estado, tp.fechaSolicitud, tp.fechaPrestamo, tp.motivo,
      concat(tc.paterno,' ',tc.materno, ' ', tc.nombres) as g1, concat(tc1.paterno, ' ',tc1.materno, ' ',tc1.nombres) as g2 FROM $this->table as tp 
      LEFT JOIN tblSocio as tc
      ON tp.garante1 = tc.idUsuario
      LEFT JOIN tblCliente as tc1 
      ON tc1.idUsuario = tp.garante2
      WHERE tp.idSocio = ?;";
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
      $sql = "SELECT concat(tc.paterno,' ', tc.materno, ' ', tc.nombres) as usuario, concat(tc.ci, ' ', tc.expedido) as ci, tp.* FROM $this->table as tp
      INNER JOIN tblCliente as tc
      ON tp.idCliente = tc.idUsuario
      WHERE estado like 'SOLICITUD';";
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