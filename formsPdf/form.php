<?php
//require('../panel/tcpdf/tcpdf.php');
include('../api/config/database.php');
// formulario para prestamo 
if(!isset($_GET['nid'])){
  echo 'Id de prestamo invalido';
  die();
}

  $idPrestamo = $_GET['nid'];
  // DATOS DEL PRESTAMO
  session_start();
  $idSocio = $_SESSION['idUsuario'];
  $data = getAllDataSocio($idSocio,$idPrestamo)[0];

  switch($data['tipo']){
    case 'CONSUMO':
      include('solicitudPrestamoConsumoPDF.php');
      break;
    case 'EMERGENCIA':
      include('solicitudPrestamoEmergenciaPDF.php');
      break;
    case 'AUXILIO':
      include('solicitudPrestamoAuxilioPDF.php');
      break;
    case 'REGULAR':
      $garantes = getGarantesPrestamo($idPrestamo);
      include('solPrestamoRegular.php');
      break;
  }

function getAllDataSocio($idSocio,$idPrestamo){
  $pdo = connectToDatabase();
  $res = null;
  try {
      $sql = "SELECT ts.*, te.detalle as expedido, tec.detalle as estadoCivil, tv.*, td.*, tf.detalle as fuerza, tg.detalle as grado, tp.*, ta.detalle as arma, ttd.detalle as ciudad
              FROM tblSocio ts
              LEFT JOIN tblExpedicion te ON te.idExpedicion = ts.idExpedicion
              LEFT JOIN tblEstadoCivil tec ON tec.idEstadoCivil = ts.idEstadoCivil
              LEFT JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
              LEFT JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
              LEFT JOIN tblFuerza tf ON tf.idFuerza = td.idFuerza
              LEFT JOIN tblGrado tg ON tg.idFuerza = tf.idFuerza
              LEFT JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
              LEFT JOIN tblPrestamo tp ON tp.idSocio = ts.idSocio
              LEFT JOIN tblArma ta ON ta.idArma = td.idArma
              LEFT JOIN tblDepartamento ttd ON ttd.idDepartamento = tv.idDepartamento
              WHERE ts.idSocio = ? 
                  AND tp.idPrestamo = ? ;";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$idSocio,$idPrestamo]);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }catch (\Throwable $th) {
      print_r($th);
  }
  return $res;
}
function getGarantesPrestamo($idPrestamo){
  $pdo = connectToDatabase();
  $sql = "SELECT ts.*, te.detalle as expedido, tec.detalle as estadoCivil, tv.*, td.*, tf.detalle as fuerza, tg.detalle as grado, ta.detalle as arma, ttd.detalle as ciudad
  FROM tblSocio ts
   INNER JOIN tblExpedicion te ON te.idExpedicion = ts.idExpedicion
  INNER JOIN tblEstadoCivil tec ON tec.idEstadoCivil = ts.idEstadoCivil
  INNER JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
  INNER JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
  INNER JOIN tblFuerza tf ON tf.idFuerza = td.idFuerza
  INNER JOIN tblGrado tg ON tg.idGrado = td.grado
  INNER JOIN tblArma ta ON ta.idArma = td.idArma
  INNER JOIN tblDepartamento ttd ON ttd.idDepartamento = tv.idDepartamento
  WHERE ts.idSocio IN (SELECT idSocio FROM tblGarante 
  WHERE idPrestamo = $idPrestamo);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $res;
}
?>