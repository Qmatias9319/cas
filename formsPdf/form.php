<?php
require('../panel/tcpdf/tcpdf.php');
include('../api/config/database.php');
// formulario para prestamo 
// if(!isset($_GET['nid'])){
//   echo 'Id de prestamo invalido';
//   die();
// }
$id = 1;
$sql = "SELECT * FROM 
tblCliente as tc
INNER JOIN tblPrestamo as tp
ON tp.idCliente = tc.idUsuario
WHERE tp.idPrestamo = ".$id.";";

$pdo = connectToDatabase();
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_OBJ);
if(count($res)>0){
  $tipoPrestamo = $res[0]->tipoPrestamo;
  switch ($tipoPrestamo) {
    case 'REGULAR':
      # code...
      break;
    case 'CONSUMO':
      # code...
      break;
    case 'AUXILIO':
      # code...
      break;
    case 'EMERGENCIA':
      
      break;
    
    default:
      echo 'Tipo de prestamo invalido';
      die();
  }
  // $grado = $res[0]->grado;
  // $especialidad = $res[0]->arma;
  // $paterno = $res[0]->paterno;
  // $materno = $res[0]->materno;
  // $nombres = $res[0]->nombres;

  // $arma = $res[0]->arma;
  // $destino = $res[0]->ciudad;
  // $tel = $res[0]->celular;

  // $localidad = $res[0]->localidad;
  // $calle = $res[0]->avenida;
  // $numero = $res[0]->nroDir;
  // $zona = $res[0]->zona;
  // $telefono = $res[0]->celular;

  // $codigo = $res[0]->codBoleta;
  // $ci = $res[0]->ci;
  // $cm = $res[0]->carnetMilitar;

  // $sus = "321321654";
  // $plazo = $res[0]->plazo;

  // $cuentaAbono = $res[0]->nroCuenta;

  // // Cuerpo Contrato
  // $nombre = $res[0]->paterno.' '.$res[0]->materno.' '.$res[0]->nombres;
  // $ci = $res[0]->ci .' '.$res[0]->expedido;
  // $suma = $res[0]->monto;
  // $sumaLiteral = "CIENTO VEITITRES MIL CIENTO VEINTITRES";
  // $nroComprobante = "123456";
  // $fecha = date('d/m/Y');
  // $meses = "18";
  // $dia = "15";
  // $mes = "Septiembre";
  // $anio = "2023";

  // // PIE FIRMA
  // $nombreFirma = $res[0]->paterno.' '.$res[0]->materno.' '.$res[0]->nombres;
  // $ciFirma = $res[0]->ci .' '.$res[0]->expedido;
  // include('./solicitudPrestamoEmergenciaPDF.php');
}

?>