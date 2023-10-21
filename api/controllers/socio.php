<?php
require_once('./models/socio.php');
require_once('./models/vivienda.php');
require_once('./models/detalleMilitar.php');
require_once('./models/registro.php');
class Socio {
  public function __construct() {
  }

  public function create($data, $files) {
    $socioModel = new SocioModel();
    $id = $socioModel->createSocio($data);
    if ($id > 0) {
      $writeFiles = Socio::createDirSocio($id, $files);
      if ($writeFiles > 0) {
        $data['idSocio'] = $id;
        $vivienda = new ViviendaModel();
        $vResponse = $vivienda->create($data);
        $detalle = new DetalleMilitarModel();
        $dResponse = $detalle->create($data);
        $registro = new RegistroModel();
        $rResponse = $registro->create($data);
        if ($vResponse == -1 || $dResponse == -1 || $rResponse == -1) {
          echo json_encode(array('status' => 'error', 'message' => 'Ocurrio un error durante el registro'));
        } else {
          echo json_encode(array('status' => 'success', 'message' => 'Socio creado correctamente'));
        }
      } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error al crear archivos'));
      }
    } else {
      // header("HTTP/1.0 500 Internal Server Error");
      echo json_encode(array('status' => 'error', 'message' => 'Error al crear socio'));
    }
  }

  public function auth($data, $files = null) {
    if (isset($data['correo']) && isset($data['password'])) {
      $socioModel = new SocioModel();
      $socio = $socioModel->getSocio($data['correo'], $data['password']);
      if ($socio != null) {
        session_start();
        $data = $socioModel->getAllData($socio[0]['idSocio']);
        $aceptado = $socioModel->getAceptado($socio[0]['idSocio']);
        $_SESSION['idUsuario'] = $socio[0]['idSocio'];
        $_SESSION['usuario'] = json_encode($data[0]);
        $_SESSION['aceptado'] = $aceptado;
        echo json_encode(array('status' => 'success', 'message' => 'Sesión iniciada'));
      } else {
        echo json_encode(array('status' => 'error', 'message' => 'Correo o contraseña incorrectos'));
      }
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'No hay registros con esas credenciales'));
    }
  }
  public function getAll() {
    $socioModel = new SocioModel();
    $res = $socioModel->getSocios("tr.estado LIKE 'ACEPTADO'");
    echo json_encode(array('status' => 'success', 'socios' => $res));
  }
  public function pendientes() {
    $socioModel = new SocioModel();
    $res = $socioModel->getSocios("tr.estado LIKE 'PENDIENTE'");
    echo json_encode(array('status' => 'success', 'socios' => $res));
  }

  public function socioEsperaDetalle($id) {
    $socioModel = new SocioModel();
    $res = $socioModel->getDetallesById($id);
    if (count($res) > 0) {
      $res = $res[0];
      echo json_encode(array('status' => 'success', 'socio' => $res));
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'No se encontro socio'));
    }
  }

  public function socioDetalleHtml($id) {
    $cadHTML = '
    <div class="col-md-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-exclamation-triangle"></i>
            Datos
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
    $tabla = 'Ocurrio un error al cargar los datos';
    $socioModel = new SocioModel();
    $res = $socioModel->getDetallesById($id);
    if (count($res) > 0) {
      $socio = $res[0];
      $tabla = '<tr><td style="font-weight:bolder">Nombre Completo</td>
      <td>' . $socio->nombre . ' '. $socio->paterno.' '.$socio->materno. '</td></tr>
      <tr><td style="font-weight:bolder">Estado Civil</td>
      <td>' . $socio->estadoCivil . '</td></tr>
      <tr><td style="font-weight:bolder">Correo Electrónico</td>
      <td>' . $socio->correo . '</td></tr>
      <tr><td style="font-weight:bolder">Celular</td>
      <td>' . $socio->celular . '</td></tr>
      <tr><td style="font-weight:bolder">Ciudad</td>
      <td>' . $socio->departamento . '</td></tr>
      <tr><td style="font-weight:bolder">Localidad</td>
      <td>' . $socio->localidad . '</td></tr>
      <tr><td style="font-weight:bolder">Dirección</td>
      <td>' . $socio->zona . ' ' . $socio->calle . ' ' . $socio->numero . '</td></tr>
      <tr><td style="font-weight:bolder">Código Boleta</td>
      <td>' . $socio->codigoBoleta . '</td></tr>
      <tr><td style="font-weight:bolder">Fuerza</td>
      <td>' . $socio->detalleFuerza . '</td></tr>
      <tr><td style="font-weight:bolder">Fecha Incorporación</td>
      <td>' . $socio->fechaIncorporacion . '</td></tr>
      <tr><td style="font-weight:bolder">Carnet Militar</td>
      <td>' . $socio->carnetMilitar . '</td></tr>
      <tr><td style="font-weight:bolder">Carnet Cossmil</td>
      <td>' . $socio->carnetCossmil . '</td></tr>
      <tr><td style="font-weight:bolder">Arma</td><td>' . $socio->detalleArma . '</td></tr>';
    }
    $cadHTML .= $tabla . '</tbody></table></div></div></div>';
    echo $cadHTML;
  }

  public function socioArchivosHtml($id) {
    $arrFiles = array('AFCOOP' => 'afcoop.pdf', 'CARNET COSSMIL' => 'carnetcossmil.pdf', 'CARNET MILITAR' => 'carnetMilitar.pdf', 'CI' => 'ci.pdf', 'FOTO 4X4' => 'foto4x4.pdf', 'PAPELETA DE PAGO' => 'papeletapago.pdf', 'MEMORANDUM (Persona civil)' => 'memorandum.pdf');
    $htmlRes = '
    <div class="col-md-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Archivos subidos
          </h3>
        </div>
        <div class="card-body">
        ';
    $cad = '';
    foreach ($arrFiles as $key => $value) {
      // echo __DIR__.'/../documents/' . $id . '/' . $value;
      if (file_exists(__DIR__ . '/../documents/' . $id . '/' . $value)) {
        $cad .= '
        <div class="callout callout-info d-flex justify-content-between">
          <h5>Archivo: <b>' . $key . '</b></h5>
          <div class="d-flex justify-content-between" style="gap: 25px;align-content: center;align-items: center;">
            <label class="checkbox style-g">
              <input type="checkbox" name="check_file"/>
              <div class="checkbox__checkmark"></div>
            </label>
            <a href="../../api/documents/' . $id . '/' . $value . '" target="_blank" class="btn btn-primary text-white"> <i class="fas fa-eye"></i>  Ver archivo</a>
          </div>
        </div>';
      }
    }
    $htmlRes .= $cad . '</div></div></div>
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

  public function rechazarSocio($params) {
    $socioModel = new SocioModel();
    $res = $socioModel->deleteSocioEspera($params['idSocio']);
    if ($res != null) {
      echo json_encode(array('status' => 'success', 'message' => 'Socio rechazado'));
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'No se pudo rechazar el socio'));
    }
  }

  public function aceptarSocio($params) {
    $socioModel = new SocioModel();
    $res = $socioModel->aceptarSocio($params['idSocio'], $params['observacion']);
    if ($res != null) {
      echo json_encode(array('status' => 'success', 'message' => 'Socio aceptado'));
    } else {
      echo json_encode(array('status' => 'error', 'message' => 'No se pudo aceptar el socio'));
    }
  }

  public function socioCI($ci) {
    $socioModel = new SocioModel();
    $res = $socioModel->getByCI($ci);
    if ($res != null) {
      if (count($res) == 1) {
        echo json_encode(array('status' => 'success', 'idUser' => $res[0]['idSocio']));
      } else {
        echo json_encode(array('status' => 'error (no existe)'));
      }
    } else {
      echo json_encode(array('status' => 'error (vacio)'));
    }
  }

  public static function createDirSocio($id, $files) {
    $pathFile = './documents/' . $id;
    if (!is_dir($pathFile)) {
      mkdir($pathFile, 0777, true);
    }
    $res = 0;
    foreach ($files as $key => $value) {
      $nombreArchivo = $key;
      $tipoArchivo = $value["type"];
      $tempArchivo = $value["tmp_name"];
      if ($tipoArchivo === "application/pdf") {
        if (move_uploaded_file($tempArchivo, $pathFile . '/' . $nombreArchivo . '.pdf')) {
          $res = 1;
        } else {
          $res = -1;
        }
      } else {
        $res = -1;
      }
    }
    return $res;
  }
}
