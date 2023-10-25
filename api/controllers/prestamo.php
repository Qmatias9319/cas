<?php
require_once('./models/prestamo.php');
class Prestamo {
  public function __construct() {
  }

  public function create($data, $files = null) {
    $prestamo = new PrestamoModel();
    $id = $prestamo->createPrestamo($data);
    if ($id > 0) {
      echo json_encode(array('status' => 'success', 'message' => 'Agregado correctamente', 'id' => $id));
    } elseif ($id == -10) {
      echo json_encode(array('status' => 'error', 'message' => 'No puede tener como garante a usted mismo'));
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'Error al crear prestamo'));
    }
  }

  public function solicitudes() {
    $prestamo = new PrestamoModel();
    $res = $prestamo->getSolicitudes();
    if ($res != null) {
      if (count($res) > 0) {
        echo json_encode(array('status' => 'success', 'prestamos' => $res));
      } else {
        echo json_encode(array('status' => 'success', 'prestamos' => array()));
      }
    } else {
      echo json_encode(array('status' => 'success', 'prestamos' => array()));
    }
  }

  public function getAll() {
    $prestamos = new PrestamoModel();
    $res = $prestamos->getSociosAceptados();
    echo json_encode(array('status' => 'success', 'socios' => $res));
  }

  public function prestamoUsuario() {
    session_start();
    $prestamo = new PrestamoModel();
    $idUser = $_SESSION['idUsuario'];
    // $idUser = 21;
    $res = $prestamo->getPrestamoUser($idUser);
    if ($res != null) {
      if (count($res) > 0) {
        echo json_encode(array('status' => 'success', 'prestamos' => $res));
      } else {
        echo json_encode(array('status' => 'success', 'prestamos' => array()));
      }
    } else {
      echo json_encode(array('status' => 'success', 'prestamos' => array()));
    }
  }

  public function garantes($idPrestamo) {
    $prestamo = new PrestamoModel();
    $res = $prestamo->getGarantes($idPrestamo);
    if ($res != null) {
      $tipo = $res[0]['tipo'];
      echo json_encode(array('status' => 'success', 'garantes' => $res, 'error', false, 'tipo' => $tipo));
    } else {
      echo json_encode(array('status' => 'success', 'garantes' => array(), 'error' => true));
    }
  }
  public function detalleHtml($idPrestamo){
    $prestamo = new PrestamoModel();
    $res = $prestamo->getDetalle($idPrestamo);
    $cadHTML = '
    <div class="col-md-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-exclamation-triangle"></i>
            Datos del préstamo
          </h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr align="center">
                <th scope="col">Detalle</th>
                <th scope="col">Valor </th>
              </tr>
            </thead>
            <tbody>'; 
    $tabla = '';   
    if ($res != null) {
      $tabla .= '<tr><td>Solicitante: </td><td>'.$res[1]['paterno'].' '.$res[1]['materno'].' '.$res[1]['nombre'].'</td></tr>'.
      '<tr><td>Grado: </td><td>'.$res[1]['grado'].'</td></tr>'.
      '<tr><td>Correo Electrónico: </td><td>'.$res[1]['correo'].'</td></tr>'.
      '<tr><td>Celular: </td><td>'.$res[1]['celular'].'</td></tr>'.
      '<tr><td>Tipo de préstamo</td><td>'.$res[1]['tipo'].'</td></tr>'.
      '<tr><td>Monto: </td><td>'.$res[1]['monto'].'</td></tr>'.
      '<tr><td>Motivo: </td><td>'.$res[1]['motivo'].'</td></tr>'.
      '<tr><td>Fecha solicitud: </td><td>'.date('d-m-Y',strtotime($res[1]['fechaSolicitud'])).'</td></tr>';
      $tabla .= '<tr><td>Antigüedad: </td><td>'.$res[1]['tipo'].'</td></tbody></table></div></div></div>';
      print_r($cadHTML.$tabla);
      if($res[0] == 'REGULAR'){
        $cadHTML2 = '
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-exclamation-triangle"></i>
                Datos del préstamo
              </h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr align="center">
                    <th scope="col">Detalle</th>
                    <th scope="col">Valor </th>
                  </tr>
                </thead>
                <tbody>';
        
      }
    } else {
    }
  }
}
