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
}
?>