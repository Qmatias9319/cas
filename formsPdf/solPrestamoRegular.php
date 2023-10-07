<?php
require('../panel/tcpdf/tcpdf.php');
date_default_timezone_set('America/La_Paz');
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

class MYPDF extends TCPDF{
  public function Header(){}
  public function Footer(){}
}
$carta = array(215.9, 279.4);
$pdf = new MYPDF('P', 'mm', $carta, true, 'UTF-8', false);
// Configurar las propiedades del documento
$pdf->SetCreator('STIS');
$pdf->SetAuthor('STIS');
$pdf->SetTitle('Solicitud de prestamo');
$pdf->SetSubject('Prestamo regular');

// Establecer las dimensiones y la orientación del papel
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(13, 12.5, 13, false);
$pdf->SetAutoPageBreak(true, 13);


$pdf->AddPage();


// CUERPO DEL DOCUMENTO
$image_file = './cas.jpg';
$pdf->Image($image_file, 18, 8, 22, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->SetFont('helvetica', 'N', 11);
$headerRight = 'FORM.&nbsp;&nbsp;"CAS" R.L. 001<br>No. ..............................';
$pdf->MultiCell(0, 8, $headerRight, 0, 'L', 0, 0, 159, 12, true, 0, true, true, 8, 'M');
$pdf->SetFont('helvetica', 'N', 11);
$border = 0;
$pdf->MultiCell(29, 5, '<b>1. Solicitante:</b> ', 0, 'L', false,1, 12, 50, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(28, 5, '{{GRADO}}', $border, 'C', false,1, 36, 50, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(30, 5, '{{especialidad}} ', $border, 'C', false,1, 64, 50, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(35, 5, '{{Ap Paterno}} ', $border, 'C', false,1, 94, 50, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(35, 5, '{{Ap Materno}}', $border, 'C', false,1, 129, 50, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, '{{Nombres}zfddfvzdf}', $border, 'C', false,1, 165, 50, true, 0, true, true, 0, 'C', true );


$pdf->SetFont('helvetica', 'N', 9);
$pdf->MultiCell(28, 4, 'GRADO', 0, 'C', false,1, 36, 55, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(30, 4, 'ESPECIALIDAD', 0, 'C', false,1, 64, 55, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(35, 4, 'AP. PATERNO ', 0, 'C', false,1, 94, 55, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(35, 4, 'AP. MATERNO', 0, 'C', false,1, 129, 55, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(38, 4, 'NOMBRE (S)', 0, 'C', false,1, 165, 55, true, 0, true, true, 0, 'C', true );

$pdf->SetFont('helvetica', 'N', 11);
$pdf->MultiCell(0, 5, 'Arma: {{arma}}, destino actual: {{Destino actual}}, telefono o celular: {{78465454654}}', 0, 'J', false,1, 14, 61, true, 0, false, true, 0, 'J', true );
$border= 0;
$pdf->MultiCell(23, 5, 'Domicilio: ', 0, 'L', false,1, 14, 69, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(30, 5, '{{lcoalidad}}', $border, 'C', false,1, 34, 69, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(40, 5, '{{calle}} ', $border, 'C', false,1, 64, 69, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(20, 5, '{{nro}} ', $border, 'C', false,1, 104, 69, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(40, 5, '{{Ap Materno}}', $border, 'C', false,1, 124, 69, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(37, 5, '{{telefono}z', $border, 'C', false,1, 164, 69, true, 0, true, true, 0, 'C', true );


$pdf->SetFont('helvetica', 'N', 9);
$pdf->MultiCell(30, 4, 'LOCALIDAD', 0, 'C', false,1, 34, 74, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(40, 4, 'CALLE/AV', 0, 'C', false,1, 64, 74, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(20, 4, 'No.', 0, 'C', false,1, 104, 74, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(40, 4, 'ZONA', 0, 'C', false,1, 124, 74, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(37, 4, 'TELÉFONO', 0, 'C', false,1, 164, 74, true, 0, true, true, 0, 'C', true );

$pdf->SetFont('helvetica', 'N', 11);
$pdf->MultiCell(0, 5, 'Cod. papeleta de pago. {{papeleta pago}}, C.I. {{ci}}, C.M. {{carnet militar}}', 0, 'J', false,1, 14, 78, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, 'Préstamo Solicitado Bs.……………………………… Plazo: ………… meses, motivo: …………………......', 0, 'J', false,1, 14, 83, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, 'Nro. Cuenta BANCO UNION (Para Abono):……………………………………………………………………..
', 0, 'J', false,1, 14, 88, true, 0, false, true, 0, 'L', true );


$pdf->SetFont('helvetica', 'N', 11);
$border = 0;

$pdf->MultiCell(0, 5, '<b>2. Garante 1:</b> (Asociado(a)): Oficial del Arma de:', 0, 'L', false,1, 12, 108, true, 0, true, true, 0, 'C', true );

$pdf->MultiCell(28, 5, '{{GRADO}}', $border, 'C', false,1, 14, 113, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(33, 5, '{{especialidad}} ', $border, 'C', false,1, 42, 113, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, '{{Ap Paterno}} ', $border, 'C', false,1, 75, 113, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, '{{Ap Materno}}', $border, 'C', false,1, 117, 113, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(46, 5, '{{Nombres}zfddfvzdf}', $border, 'C', false,1, 159, 113, true, 0, true, true, 0, 'C', true );
$pdf->SetFont('helvetica', 'N', 9);
$pdf->MultiCell(28, 5, 'GRADO', $border, 'C', false,1, 14, 118, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(33, 5, 'ESPECIALIDAD ', $border, 'C', false,1, 42, 118, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, 'AP. PATERNO', $border, 'C', false,1, 75, 118, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, 'AP. MATERNO', $border, 'C', false,1, 117, 118, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(46, 5, 'NOMBRE (S)', $border, 'C', false,1, 159, 118, true, 0, true, true, 0, 'C', true );
$pdf->SetFont('helvetica', 'N', 11);
$pdf->MultiCell(0, 5, 'Cod. papeleta pago. {{papeleta pago}}, C.I. {{ci}}, C.M. {{carnet militar}}', 0, 'J', false,1, 14, 123, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, 'Destino Actual:……………………………………………………………Teléfono: …………………................
', 0, 'J', false,1, 14, 128, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, '¿Es garante en el "C.A.S." R.L.? SI|NO ¿De quiénes?. {{Poner la cantidad de garantes}}', 0, 'L', false,1, 14, 133, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(0, 5, 'Cadena de nombres de los que garantiza', 0, 'L', false,1, 14, 138, true, 0, false, true, 0, 'L', true );


$pdf->MultiCell(0, 5, '<b>3. Garante 2:</b> (Asociado(a)): Oficial del Arma de:', 0, 'L', false,1, 12, 155, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(28, 5, '{{GRADO}}', $border, 'C', false,1, 14, 160, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(33, 5, '{{especialidad}} ', $border, 'C', false,1, 42, 160, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, '{{Ap Paterno}} ', $border, 'C', false,1, 75, 160, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, '{{Ap Materno}}', $border, 'C', false,1, 117, 160, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(46, 5, '{{Nombres}zfddfvzdf}', $border, 'C', false,1, 159, 160, true, 0, true, true, 0, 'C', true );
$pdf->SetFont('helvetica', 'N', 9);
$pdf->MultiCell(28, 5, 'GRADO', $border, 'C', false,1, 14, 165, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(33, 5, 'ESPECIALIDAD ', $border, 'C', false,1, 42, 165, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, 'AP. PATERNO', $border, 'C', false,1, 75, 165, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(42, 5, 'AP. MATERNO', $border, 'C', false,1, 117, 165, true, 0, true, true, 0, 'C', true );
$pdf->MultiCell(46, 5, 'NOMBRE (S)', $border, 'C', false,1, 159, 165, true, 0, true, true, 0, 'C', true );
$pdf->SetFont('helvetica', 'N', 11);
$pdf->MultiCell(0, 5, 'Cod. papeleta pago. {{papeleta pago}}, C.I. {{ci}}, C.M. {{carnet militar}}', 0, 'J', false,1, 14, 170, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, 'Destino Actual:……………………………………………………………Teléfono: …………………................
', 0, 'J', false,1, 14, 128, true, 0, false, true, 0, 'J', true );
$pdf->MultiCell(0, 5, '¿Es garante en el "C.A.S." R.L.? SI|NO ¿De quiénes?. {{Poner la cantidad de garantes}}', 0, 'L', false,1, 14, 175, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(0, 5, 'Cadena de nombres de los que garantiza', 0, 'L', false,1, 14, 180, true, 0, false, true, 0, 'L', true );

// $pdf->MultiCell(60, 5, '.........................................................', 1, 'C', false,1, 120, 200, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(60, 5, '.........................................................', 0, 'C', false,1, 37, 200, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(60, 5, '.........................................................', 0, 'C', false,1, 120, 200, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(60, 5, 'FIRMA SOLICITANTE', 0, 'C', false,1, 37, 204, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(60, 5, 'LUGAR Y FECHA', 0, 'C', false,1, 120, 204, true, 0, false, true, 0, 'L', true );

$pdf->MultiCell(60, 5, 'NOMBRE: ', 0, 'L', false,1, 37, 209, true, 0, false, true, 0, 'L', true );
$pdf->MultiCell(60, 5, 'C.I. ', 0, 'L', false,1, 37, 214, true, 0, false, true, 0, 'L', true );

$solicitud = '<table>';
$solicitud .= '<tr align="center" style="font-size:14px;"><td colspan="6"><u><b>SOLICITUD DE PRÉSTAMO REGULAR</b></u></td></tr>
<tr align="center" style="font-size:13px;"><td colspan="6"><b>(ASOSICADOS Y ASOCIADAS ACTIVOS)</b><br></td></tr></table>';


$pdf->WriteHTMLCell(0, 0, '', '27', $solicitud, 0, 0);
$pdf->AddPage();

$image_file = './cas.jpg';
$pdf->Image($image_file, 18, 8, 22, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->SetFont('helvetica', 'N', 11);
$headerRight = 'FORM.&nbsp;&nbsp;"CAS" R.L. 002<br>No. ..............................';
$pdf->MultiCell(0, 8, $headerRight, 0, 'L', 0, 0, 159, 12, true, 0, true, true, 8, 'M');
$pdf->SetFont('helvetica', 'N', 11);
$contrato = '<table>';

$contrato .= '<tr align="center" style="font-size:14px;"><td colspan="6"><u><b>CONTRATO DE PRÉSTAMO REGULAR</b></u><br></td></tr></table>';

$contrato .= '<table border="0">
  <tr align="justify" style="font-size:10px;">
    <td colspan="10">Conste por el presente documento privado de préstamo, que al solo reconocimiento de firmas y rubricas tendrá 
    la eficacia y validez de instrumento público, que suscriben por una parte La Cooperativa de Ahorro y Crédito de 
    Vínculo Laboral Oficiales de Caballería “Apóstol Santiago” RL., representado legalmente por el Consejo 
    Administrativo “Tesorero” que en adelante se denominará el ACREEDOR, y por la otra el señor 
    {{nombre del prestatario}} con C.I. {{ci del prestatario}} hábil por 
    derecho, que en adelante se denominará el PRESTATARIO, de acuerdo al tenor de las siguientes cláusulas:
<p><b>PRIMERA.- (Objetos y Operaciones Permitidas)</b> La Cooperativa de Ahorro y Crédito de Vínculo Laboral 
Oficiales de Caballería “Apóstol Santiago” R.L., tendrá como objetivo único de realizar operaciones de ahorro y 
crédito únicamente con sus asociados y asociadas dentro las Fuerzas Armadas del Estado y de acuerdo a 
reglamento de créditos del “C.A.S.” R.L.
</p>
<p><b>SEGUNDA.- (Objeto)</b> El PRESTATARIO declara que debe y pagará a la orden del ACREEDOR la suma de 
Bs.{{Monto numeral}} ({{monto literal Bolivianos}}), que ha recibido a su entera
satisfacción en moneda actual y corriente como consta en el COMPROBANTE DE PAGO “CAS” R.L. No. 
{{nro de pago}} de fecha {{fecha literal de pago}}.
</p>
<b>TERCERA.- (Interés)</b> El presente préstamo devengará al interés ordinario de 0,69% mensual, sobre los saldos deudores, el mismo que será recargado con el interés penal de 1,7% mensual, en caso de mora de una o más 
amortizaciones.
<br><br>
<b>CUARTA.- (Plazo)</b> La deuda será totalmente cancelada por el PRESTATARIO, en el plazo fijo e improrrogable 
de {{plazo}} meses, mediante pagos o amortizaciones uniformes (Capital, Interés y Comisiones) al tipo de 
cambio oficial del día en que se realiza el descuento.
<br><br>
<b>QUINTA.- (Modalidad de Pago) </b> El PRESTATARIO autoriza expresamente al ACREEDOR, a efectuar los 
descuentos respectivos a través de planillas elaboradas por el Ministerio de Defensa, dando cumplimiento a 
Estatuto Orgánico del “C.A.S.” R.L., de los haberes que percibe mensualmente.
<br><br>
<b>SEXTA.- (Garantía)</b> El PRESTATARIO garantiza el préstamo con sus aportes, capitalización individual y dos 
garantes de asociados (as) en el “C.A.S.” R.L., para que en el caso de que sea dado de Baja de las Fuerzas 
Armadas, por retiro voluntario u obligatorio y mantenga un Saldo Deudor por concepto del préstamo, otorgado 
por el ACREEDOR, se proceda a compensar con los Certificados Voluntarios, Obligatorios y excedente de
percepción en caso de que los fondos provenientes de los aportes y capitalización individual sean insuficientes
se procederá al descuento a sus garantes por el Saldo a Cobrar.
<br><br>
<b>SEPTIMA.- (Contingencia)</b> El PRESTATARIO cancelará el 7 X 1.000 del préstamo que se le otorgará por 
concepto de Aporte Solidario de Contingencia, cuyo monto será descontado en veinticuatro cuotas fijas, a partir 
de la otorgación del préstamo.
<br><br>
<b>OCTAVA.- (Cancelación del Préstamo)</b> Al cabo de 90 días de efectivizado el desembolso del préstamo, se 
faculta al PRESTATARIO realizar en cualquier momento amortizaciones extraordinarias al capital o cancelar la 
totalidad del Saldo Deudor.
<b>NOVENA.- (Seguimiento de la Deuda)</b> El PRESTATARIO se OBLIGA a realizar el seguimiento de los 
descuentos del préstamo, en previsión a que por cualquier circunstancia no se pueda efectuar el descuento
mediante las instituciones indicadas comprometiéndose el PRESTATARIO a realizar depósitos directos de 
estos montos en la Cuenta Bancaria del ACREEDOR dentro de los primeros 8 días del mes siguiente, cuya 
copia original deberá entregar a la Unidad de Cartera del “C.A.S.” R.L. En caso de no proceder en la forma 
mencionada, se lo considerará deudor en mora, sujeto a las penalidades establecidas en el presente 
documento.
<br><br>
<b>DÉCIMA. - (Mora)</b> El PRESTATARIO queda en situación de mora al solo vencimiento de una o más 
amortizaciones (día 11 del siguiente mes).
<br><br>
<b>DÉCIMA PRIMERA.- (Forma de Desembolso)</b> El desembolso se efectuará en Moneda Nacional (Bolivianos) al 
tipo de cambio oficial a la fecha de la elaboración del Comprobante de Egreso, corriendo desde esa fecha los 
intereses.<br><br>
<b>DÉCIMA SEGUNDA.- (De los garantes)</b> Los garantes, Señores {{nombre completo primer garante}} con C.I. {{ci primer garante}} y 
{{nombre completo segundo garante}} con C.I. {{ci segundo garante}} , declaran expresamente que se constituyen en garantes solidarios, mancomunados e indivisibles del PRESTATARIO y autorizan al ACREEDOR a efectuar descuentos mensuales de haberes, en las mismas condiciones del
PRESTATARIO, en caso de que el mismo quede en situación de mora por cualquier motivo.
<br><br>
<b>DÉCIMA TERCERA.- Conformidad)</b> Nosotros, el “C.A.S.” RL., como ACREEDOR y por otra el PRESTATARIO y GARANTES como DEDUDORES, declaramos nuestra conformidad con todas y cada una de las cláusulas que anteceden.
    </td>
  </tr>
  <tr>
    <td colspan="10" align="right">{{Fecha literal con mes literal}}</td>
  </tr>
  <tr style="font-size:10px;">
    <td colspan="5">
      <p align="center" style="display:block;border-top:1px dashed black;height:5px;line-height:12px;">PRESTATARIO
      <br><b align="left">C.I.</b> {{CI DEL PRESTATARIO}}<br>
<b align="left">NOMBRE:</b> {{Nombre completo DEL PRESTATARIO}}
      </p>
    </td>
    <td colspan="5"></td>
  </tr>
  <tr><td colspan="10"></td></tr>
  <tr style="font-size:10px;">
    <td colspan="4">
      <p align="center" style="border-top:1px dashed black;">GARANTE del “C.A.S.” R.L. <br><b align="left">C.I.</b> {{CI DEL PRESTATARIO}}<br>
<b align="left">NOMBRE:</b> {{Nombre completo DEL PRESTATARIO}}</p>

    </td>
    <td colspan="2"></td>
    <td colspan="4">
      <p align="center" style="border-top:1px dashed black;">GARANTE del “C.A.S.” R.L.<br><b align="left">C.I.</b> {{CI DEL PRESTATARIO}}<br>
<b align="left">NOMBRE:</b> {{Nombre completo DEL PRESTATARIO}}</p>
    </td>
  </tr>
  <tr style="font-size:10px;"><td colspan="10">La Cooperativa de Ahorro y Crédito de Vínculo Laboral Oficiales de Caballería “Apóstol Santiago” RL.</td></tr>
  <tr><td colspan="10"></td></tr>
  <tr><td colspan="10"></td></tr>
  <tr><td colspan="10"></td></tr>
  <tr style="font-size:10px;">
    <td colspan="5"></td>
    <td colspan="5"><p align="center" style="border-top:1px dashed black;">ACREEDOR </p></td>
  </tr>
  <tr>
    <td align="center" colspan="10"><b><u>ACTA DE RECONOCIMIENTO DE FIRMAS Y RUBRICAS</u></b></td>
  </tr>
  <tr style="font-size:10px;">
    <td colspan="10" align="justify" style="line-height:17px;">En la ciudad de __________________________ a horas _________ del día ______ del mes de 
    _______________ de ______ años, fueron presentes en este Juzgado los señores:   __________________________________________________________________________________________________________________________________ con C.I. __________________, ________________ respectivamente, quienes manifestaron que las firmas y rúbricas estampadas 
    al pie son suyas y las propias y las que usan en todos los actos de vida pública y privada y por tanto reconocen 
    como suyas y propias en toda forma de derecho. Terminado el acto y escuchada su lectura, se ratificaron, 
    firmando en comprobante con el Juez que suscribe y certifica.
    </td>
  </tr>
  <tr><td colspan="10"></td></tr>
  <tr style="font-size:10px;">
    <td colspan="5">
      <p align="center" style="border-top:1px dashed black;height:5px;line-height:12px;">PRESTATARIO<br>
      <b align="left">C.I.</b> {{CI DEL PRESTATARIO}}</p>
    </td>
    <td colspan="5"></td>
  </tr>
  
  <tr style="font-size:10px;">
    <td colspan="4">
      <p align="center" style="border-top:1px dashed black;">GARANTE del “C.A.S.” R.L. <br>
      <b align="left">C.I.</b> {{CI DEL PRESTATARIO}}</p>
    </td>
    <td colspan="2"></td>
    <td colspan="4">
      <p align="center" style="border-top:1px dashed black;">GARANTE del “C.A.S.” R.L. <br>
      <b align="left">C.I.</b> {{CI DEL PRESTATARIO}}</p>
    </td>
  </tr>
</table>
';
$pdf->WriteHTMLCell(0, 0, '', '27', $contrato, 0, 0);
ob_end_clean();
$pdf->output('prestamoRegular.pdf', 'I');


function literalMonth($month)
{
  $literal = "";
  switch ($month) {
    case '01':
      $literal = "Enero";
      break;
    case '02':
      $literal = "Febrero";
      break;
    case '03':
      $literal = "Marzo";
      break;
    case '04':
      $literal = "Abril";
      break;
    case '05':
      $literal = "Mayo";
      break;
    case '06':
      $literal = "Junio";
      break;
    case '07':
      $literal = "Julio";
      break;
    case '08':
      $literal = "Agosto";
      break;
    case '09':
      $literal = "Septiembre";
      break;
    case '10':
      $literal = "Octubre";
      break;
    case '11':
      $literal = "Noviembre";
      break;
    case '12':
      $literal = "Diciembre";
      break;
  }

  return $literal;
}