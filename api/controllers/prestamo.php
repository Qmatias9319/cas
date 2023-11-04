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
      <div class="card card-default shadow">
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
      $tabla .= '<tr><td>Antigüedad: </td><td>'.$prestamo->antiguedad($res[1]['fechaAceptacion']).'</td></tbody></table></div></div></div>';
      echo $cadHTML.$tabla;
      $cadHTML2 = '';
      if($res[0] == 'REGULAR'){
        $cadHTML2 = '
        <div class="col-md-6">
          <div class="card card-default shadow">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-exclamation-triangle"></i>
                GARANTES
              </h3>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr align="center">
                    <th scope="col">Nombre</th>
                    <th scope="col">Grado </th>
                    <th scope="col">Antigüedad</th>
                    <th scope="col">¿De quiénes es garante?</th>
                  </tr>
                </thead>
                <tbody>';
        $table2 = '';
        foreach ($res[2] as $garante) {
          $tieneGarante = $prestamo->esGarante($garante['idSocio'], $garante['idPrestamo']);
          $table2 .= '<tr><td>'.$garante['nombre'].'</td><td>'.$garante['detalle'].'</td><td>'.
          $prestamo->antiguedad($garante['fechaAceptacion']).'</td><td><b>'.$tieneGarante['cantidad'].'</b> <span>'.$tieneGarante['cad'].'</span></td></tr>';
        }
        $cadHTML2 = $cadHTML2.$table2.'</tbody></table></div></div></div>';
      }
      echo $cadHTML2;
    } else {
    }
  }

  public function aceptar($data){
    $idPrestamo = $data['idPrestamo'];
    $obs = $data['observacion'];
    $prestamo = new PrestamoModel();
    $res = $prestamo->aceptarPrestamo($idPrestamo, $obs);
    // echo $res;
    if($res){
      echo json_encode(array('status'=> 'success','message'=> 'Prestamo aceptado'));
    }else{
      echo json_encode(array('status'=> 'error','message'=> 'Ocurrio un error al rechazar prestamo'));
    }
  }
  public function rechazar($data){
    $idPrestamo = $data['idPrestamo'];
    $obs = $data['observacion'];
    $prestamo = new PrestamoModel();
    $res = $prestamo->rechazarPrestamo($idPrestamo, $obs);
    if($res){
      echo json_encode(array('status'=> 'success','message'=> 'Prestamo rechazado'));
    }else{
      echo json_encode(array('status'=> 'error','message'=> 'Ocurrio un error al rechazar prestamo'));
    }
  }
  public function aceptados() {
    $prestamo = new PrestamoModel();
    $res = $prestamo->getAceptados();
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

  public function aceptadoDetalle($id) {
    $socioModel = new PrestamoModel();
    $res = $socioModel->getDetallesByIdAceptados($id);
    if (count($res) > 0) {
      $res = $res[0];
      echo json_encode(array('status' => 'success', 'socio' => $res));
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'No se encontro socio'));
    }
  }

  public function prestamoArchivosHtml($id) {
    $arrFiles = array('AFCOOP' => 'afcoop.pdf', 'CARNET COSSMIL' => 'carnetcossmil.pdf', 'CARNET MILITAR' => 'carnetMilitar.pdf', 'CI' => 'ci.pdf', 'FOTO 4X4' => 'foto4x4.pdf', 'PAPELETA DE PAGO' => 'papeletapago.pdf', 'MEMORANDUM (Persona civil)' => 'memorandum.pdf');
    $htmlRes = '
    <div class="col-md-12">

        ';
    $cad = '';
    foreach ($arrFiles as $key => $value) {
      // echo __DIR__.'/../documents/' . $id . '/' . $value;
      if (file_exists(__DIR__ . '/../documents/' . $id . '/' . $value)) {
        $cad .= '
        <div class="callout callout-info d-flex justify-content-between">
          <h5>Archivo: <b>' . $key . '</b></h5>
          <div class="d-flex justify-content-between" style="gap: 25px;align-content: center;align-items: center;">
            <a href="../../api/documents/' . $id . '/' . $value . '" target="_blank" class="btn btn-primary text-white"> <i class="fas fa-eye"></i>  Ver archivo</a>
          </div>
        </div>';
      }
    }
    $htmlRes .= $cad . '</div>
    <!-- --- js Injection --- -->
    <script>
      $("input[type=\'checkbox\'][name=\'check_file\']").on(\'change\', function (e) {
      const checkBoxes = $("input[type=\'checkbox\'][name=\'check_file\']");
      const res = checkBoxes.toArray().reduce((acc, e)=>{
        return acc && e.checked
      }, true);
    
      if(res){
        $(\'#aceptar_btn\').attr(\'disabled\', false)
      }else{
        $(\'#aceptar_btn\').attr(\'disabled\', true)
      }
      })
    </script>
    ';
    echo $htmlRes;
  }
  public function cancel($request) {
    $id = $request['idPrestamo'];
    $prestamo = new PrestamoModel();
    $res = $prestamo->cancelarPrestamo($id);
    if($res == 1){
      echo json_encode(array('status'=> 'success','message'=> 'Prestamo cancelado'));
    }else{
      echo json_encode(array('status'=> 'error','message'=> 'Ocurrio un error'));
    }
  }
}
