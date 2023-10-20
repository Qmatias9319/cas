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
              (nombre,paterno,materno,ci,idExpedicion,fechaNacimiento,idEstadoCivil,celular,correo,password)
              VALUES
              ('".$data['nombres']."','".$data['paterno']."','".$data['materno']."','".$data['ci']."',".$data['expedido'].",'".$data['fechaNac']."',
              ".$data['estadoCivil'].",'".$data['celular']."','".$data['correoElec']."','".$data['password']."');";
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
      $sql = "SELECT * FROM tblSocio ts
      INNER JOIN tblRegistro tr on ts.idSocio = tr.idSocio
      WHERE tr.estado like 'ACEPTADO'
      AND ts.correo like ? AND ts.password like ?;";
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


  public function getSocios($where = ''){
    $condition = '';
    if($where != ''){
      $condition = "WHERE $where";
    }
    $sql = "SELECT ts.*, tdm.idArma, tdm.idFuerza, tdm.grado, tr.estado, tr.fechaAceptacion, tr.observacion,
    ta.detalle as detalleArma, tf.detalle as detalleFuerza, tg.detalle as detalleGrado
    FROM tblsocio ts
    LEFT JOIN tblDetalleMilitar tdm ON ts.idSocio = tdm.idSocio
    LEFT JOIN tblRegistro tr ON ts.idSocio = tr.idSocio 
    LEFT JOIN tblFuerza tf ON tf.idFuerza = tdm.idFuerza
    LEFT JOIN tblGrado tg ON tg.idGrado = tdm.grado 
    LEFT JOIN tblArma ta ON ta.idArma = tdm.idArma 
    ".$condition." ;";
    $res = null;
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
      $sql = "SELECT ts.*, tdm.idArma, tdm.idFuerza, tdm.grado, tdm.carnetCossmil, tdm.carnetMilitar, tdm.codigoBoleta, tdm.fechaIncorporacion, te.detalle as estadoCivil,
      ta.detalle as detalleArma, tf.detalle as detalleFuerza, tg.detalle as detalleGrado, tv.calle, tv.localidad, tv.zona, tv.numero, td.detalle as departamento
      FROM tblsocio ts
      LEFT JOIN tblDetalleMilitar tdm ON ts.idSocio = tdm.idSocio
      LEFT JOIN tblFuerza tf ON tf.idFuerza = tdm.idFuerza
      LEFT JOIN tblGrado tg ON tg.idGrado = tdm.grado 
      LEFT JOIN tblArma ta ON ta.idArma = tdm.idArma
      LEFT JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
      LEFT JOIN tblDepartamento td ON tv.idDepartamento = td.idDepartamento
      LEFT JOIN tblEstadoCivil te ON te.idEstadoCivil = ts.idEstadoCivil
      WHERE ts.idSocio = ?;";
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
      $sql = "UPDATE tblRegistro SET estado = 'RECHAZADO' WHERE idSocio = ?";
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
    $sql = "UPDATE tblRegistro SET estado = 'ACEPTADO', observacion = ?, fechaAceptacion = ? WHERE idSocio = ?";
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
      $sql = "SELECT ts.idSocio FROM $this->table as ts
      LEFT JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
      WHERE ts.ci LIKE '$ci' AND tr.estado like 'ACEPTADO';";
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