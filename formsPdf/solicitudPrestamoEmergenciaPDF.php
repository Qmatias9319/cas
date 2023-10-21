<?php

require('../panel/tcpdf/tcpdf.php');
//require('../api/config/database.php');
require('convertidorTexto.php');


ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

class MYPDF extends TCPDF
{
    public function Header(){
        
    }
    public function Footer()
    {
        $this->SetFont('helvetica', '', 12);
        $this->MultiCell(0, 10, $this->getAliasNbPages() . " - " . $this->getAliasNumPage(), 0, 'C', 0, 1, '20', '265', true);
    }
}
$carta = array(215.9, 279.4);
//$oficio = array(215.9, 320);
$pdf = new MYPDF('P', 'mm', $carta, true, 'UTF-8', false);
// Configurar las propiedades del documento
$pdf->SetCreator('STIS');
$pdf->SetAuthor('STIS');
$pdf->SetTitle('Prestamo Emergencia');
$pdf->SetSubject('Prestamo Emergencia');

// Establecer las dimensiones y la orientación del papel
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(13, 12.5, 13, false);
$pdf->SetAutoPageBreak(true, 13);

// Agregar una página
// $pdf->AddPage();
    // DATOS DEL PRESTAMO
    /*session_start();
    $idSocio = $_SESSION['idUsuario'];
    $idPrestamo = $_GET['pres'];
    $data = getAllDataSocio($idSocio,$idPrestamo)[0];*/
    // CABECERA DEL DOCUMENTO
    $pdf->AddPage();
    /**
     * DATOS DE LA PRIMERA PAGINA
     */
    // Datos Cabecera
    $nroFormulario = "_______________";
    // Datos de la solicitud
    $grado = $data['grado'];
    $especialidad = $data['arma'];
    $paterno = $data['paterno'];
    $materno = $data['materno'];
    $nombres = $data['nombre'];

    $arma = $data['arma'];
    $destino = $data['ciudad'];
    $tel = $data['celular'];

    $localidad = $data['localidad'];
    $calle = $data['calle'];
    $numero = $data['numero'];
    $zona = $data['zona'];
    $telefono = $data['celular'];

    $codigo = $data['codigoBoleta'];
    $ci = $data['ci']." ".$data['expedido'];
    $cm = $data['carnetMilitar'];

    $monto = number_format($data['monto'], 2);
    $plazo = $data['plazo'];

    $cuentaAbono = $data['numeroCuenta'];

    // Cuerpo Contrato
    $nombre = $nombres.' '.$paterno.' '.$materno;
    $ci = $ci;
    $suma = number_format($data['monto'], 2); // definir formato
    $sumaLiteral = numtoletras($data['monto']); // definir literal
    $nroComprobante = "___________";
    $fecha = "________________";
    $meses = $data['plazo'];
    $dia = "15";
    $mes = "Septiembre";
    $anio = "2023";

    // CUERPO DEL DOCUMENTO
    $image_file = './cas.jpg';
    $pdf->Image($image_file, 18, 8, 22, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
    $pdf->SetFont('helvetica', 'N', 11);
    $headerRight = 'FORM.&nbsp;&nbsp;"CAS" R.L. 003<br>No. '.$nroFormulario;
    $pdf->MultiCell(0,8,$headerRight,0,'L',0,0,159,12,true, 0, true, true, 8, 'M');
    $pdf->SetFont('helvetica', 'N', 11);

    $solicitud = '<table>';

    $solicitud .= '<tr align="center" style="font-size:14px;"><td colspan="6"><u><b>SOLICITUD DE PRÉSTAMO DE EMERGENCIA</b></u><br></td></tr>';

    $solicitud .= '<tr align="justify" style="font-size:11px;">
                        <td rowspan="2">Solicitante:</td>
                        <td>' . $grado . '</td>
                        <td>' . $especialidad . '</td>
                        <td>' . $paterno . '</td>
                        <td>' . $materno . '</td>
                        <td>' . $nombres . '</td>
                    </tr>
                    <tr>
                        <td>GRADO</td>
                        <td>ESPECIALIDAD</td>
                        <td>AP. PATERNO</td>
                        <td>AP. MATERNO</td>
                        <td>NOMBRES</td>
                    </tr>';

    $solicitud .= '<tr><td></td></tr><tr><td colspan="2">Arma: ' . $arma . ' </td><td colspan="2">Destino Actual: ' . $destino . ' </td><td colspan="2">Tel: ' . $tel . '</td></tr>';

    $solicitud .= '<tr><td></td></tr><tr align="justify">
                        <td rowspan="2">Domicilio:</td>
                        <td>' . $localidad . '</td>
                        <td>' . $calle . '</td>
                        <td>' . $numero . '</td>
                        <td>' . $zona . '</td>
                        <td>' . $telefono . '</td>
                    </tr>
                    <tr>
                        <td>LOCALIDAD</td>
                        <td>CALLE</td>
                        <td>No.</td>
                        <td>ZONA</td>
                        <td>TELEFONO</td>
                    </tr>';

    $solicitud .= '<tr><td></td></tr><tr><td colspan="2">Cod. Pap. Pago: ' . $codigo . ' </td><td colspan="2">C.I. ' . $ci . ' </td><td colspan="2">C.M. ' . $cm . '</td></tr>';

    $solicitud .= '<tr><td></td></tr><tr><td colspan="3">Préstamo Solicitado $US ' . $monto . ' </td><td>Plazo: ' . $plazo . ' meses.</td></tr>';

    $solicitud .= '<tr><td></td></tr><tr><td colspan="6">Nro. Cuenta BANCO UNIÓN (Para Abono): ' . $cuentaAbono . '</td></tr>';
    
    $title = $solicitud;

    $title .= '<tr><td></td></tr><tr><td></td></tr><tr align="center"><td colspan="6"><b><u style="font-size:14px;">CONTRATO DE PRÉSTAMO DE EMERGENCIA.</u></b><br></td></tr>';

    $textBody = '<tr><td colspan="6"><p style="line-height:1.75;text-align:justify;">Conste por el presente documento privado de préstamo, que al solo reconocimiento de firmas y rubricas tendrá la eficacia y validez de instrumento público, que suscriben por una parte La Cooperativa de Ahorro y Crédito de Vínculo Laboral Oficiales de Caballería “Apóstol Santiago” R.L., representado legalmente por el Consejo Administrativo “Tesorero”, que en adelante se denominará el ACREEDOR, y por la otra el señor ' . $nombre . ' con C.I. ' . $ci . ' hábil por derecho, que en adelante se denominará el PRESTATARIO, de acuerdo al tenor de las siguientes cláusulas:<br>';

    $textBody .= '<b>PRIMERA.- (Antecedentes)</b> El objetivo del presente Reglamento es el de establecer las directrices para la obtención de créditos a través de la otorgación de recursos económicos, para apoyar a los Asociados y sus familias a mejorar su calidad de vida.<br>';

    $textBody .= '<b>SEGUNDA.- (Objeto)</b> El PRESTATARIO declara que debe y pagará a la orden del ACREEDOR la suma de $US ' . $suma . ' (' . $sumaLiteral . '), que ha recibido a su entera satisfacción en moneda actual y corriente como consta en el COMPROBANTE DE PAGO&nbsp;&nbsp;del “C.A.S.” R.L. No. ' . $nroComprobante . ' de fecha ' . $fecha . '<br>';
    
    $textBody .= '<b>TERCERA.- (Interés)</b> El presente préstamo devengará al interés de 1 % mensual, sobre los saldos deudores, el mismo que será recargado con el interés penal de 2,5 % mensual, en caso de mora de una o más amortizaciones.<br>';
    
    $textBody .= '<b>CUARTA.- (Plazo)</b> La deuda será totalmente cancelada por el PRESTATARIO, en el plazo fijo e improrrogable de ' . $plazo . ' meses, mediante pagos o amortizaciones uniformes (Capital, Interés y Comisiones).<br>';

    $textBody .= '<b>QUINTA.- (Modalidad de Pago)</b> El PRESTATARIO autoriza expresamente al ACREEDOR, a efectuar los 
    descuentos respectivos a través de planillas elaboradas por el Ministerio de Defensa, de los haberes que 
    percibe mensualmente.<br>';

    $textBody .= '<b>SEXTA.- (Garantía)</b> El PRESTATARIO garantiza el préstamo con sus aportes, capitalización individual para 
    que en el caso de que sea dado de Baja de las Fuerzas Armadas, por retiro voluntario u obligatorio o &nbsp;&nbsp;fallezca y mantenga un Saldo Deudor por concepto del préstamo, otorgado por el ACREEDOR, proceda la 
    figura de compensación.<br>';

    $textBody .= '<b>SÉPTIMA.- (Mora)</b> El PRESTATARIO queda en situación de mora al solo vencimiento de una o más amortizaciones (día 11 del siguiente mes).<br>';

    $textBody .= "<b>OCTAVA.- (Seguimiento de la Deuda)</b> El PRESTATARIO se OBLIGA a realizar el seguimiento de los descuentos del préstamo, en previsión a que por cualquier circunstancia no se pueda efectuar el descuento mediante las instancias respectivas, comprometiéndose el PRESTATARIO a realizar depósitos directos de estos montos en la Cuenta Bancaria del ACREEDOR dentro de los primeros 8 días del mes siguiente, cuya copia original deberá entregar a la Unidad de Cartera del “C.A.S.” R.L. En caso de no proceder en la forma mencionada, se lo considerará deudor en mora, sujeto a las penalidades establecidas en el presente documento.<br>";

    $textBody .= '<b>NOVENA.- (Conformidad)</b> Nosotros, el “C.A.S.” R.L. como ACREEDOR y por otra el PRESTATARIO como DEUDOR, declaramos nuestra conformidad con todas y cada una de las cláusulas que anteceden.<br></p></td></tr>';
    
    $fecha = new DateTime();

    $textFecha = '<tr align="right"><td colspan="6">' . $fecha->format('d') . ' de ' . literalMonth($fecha->format('m')) . ' de ' . $fecha->format('Y') . '</td></tr>';

    $firma = '<tr><br><br><br><br><td colspan="6">&nbsp;&nbsp;&nbsp;........................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.........................................................................</td></tr><tr>
    <td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRESTATARIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACREEDOR</td></tr>
    <tr>
        <td colspan="6">NOMBRE: ' . $nombre . '</td>
    </tr>
    <tr>
        <td colspan="6">C.I.: ' . $ci . '</td>
    </tr>';

    $endTable = '</table>';

    $textBody = $table . $title . $textBody . $textFecha . $firma . $endTable;
    
    //$pdf->MultiCell(0,0,$textBody,0,'J',0,1,13.5,111,true, 0, true, true, 8, 'M');
    //$pdf->WriteHTMLCell(0, 0, '', '100.2', $textBody, 0, 0);
    $pdf->WriteHTMLCell(0, 0, '', '27', $textBody, 0, 0);

    ob_end_clean();
    $pdf->output('Prestamo Emergencia.pdf', 'I');

    function literalMonth($month){
        $literal = "";
        switch($month){
            case '01': $literal = "Enero"; break;
            case '02': $literal = "Febrero"; break;
            case '03': $literal = "Marzo"; break;
            case '04': $literal = "Abril"; break;
            case '05': $literal = "Mayo"; break;
            case '06': $literal = "Junio"; break;
            case '07': $literal = "Julio"; break;
            case '08': $literal = "Agosto"; break;
            case '09': $literal = "Septiembre"; break;
            case '10': $literal = "Octubre"; break;
            case '11': $literal = "Noviembre"; break;
            case '12': $literal = "Diciembre"; break;
        }
        return $literal;
    }

    /*function getAllDataSocio($idSocio,$idPrestamo){
        $pdo = connectToDatabase();
        $res = null;
        try {
            $sql = "SELECT ts.*, te.detalle as expedido, tec.detalle as estadoCivil, tv.*, td.*, tf.detalle as fuerza, tg.detalle as grado, tp.*
                    FROM tblSocio ts
                    LEFT JOIN tblExpedicion te ON te.idExpedicion = ts.idExpedicion
                    LEFT JOIN tblEstadoCivil tec ON tec.idEstadoCivil = ts.idEstadoCivil
                    LEFT JOIN tblVivienda tv ON tv.idSocio = ts.idSocio
                    LEFT JOIN tblDetalleMilitar td ON td.idSocio = ts.idSocio
                    LEFT JOIN tblFuerza tf ON tf.idFuerza = td.idFuerza
                    LEFT JOIN tblGrado tg ON tg.idFuerza = tf.idFuerza
                    LEFT JOIN tblRegistro tr ON tr.idSocio = ts.idSocio
                    LEFT JOIN tblPrestamo tp ON tp.idSocio = ts.idSocio
                    WHERE ts.idSocio = ? 
                        AND tp.idPrestamo = ? ;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idSocio,$idPrestamo]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (\Throwable $th) {
            print_r($th);
        }
        return $res;
    }*/