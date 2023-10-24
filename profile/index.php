<?php
session_start();
$img="";
$nombre="";
$sobremi="";
$dataUser = array();
if(isset($_SESSION['idUsuario'])){
	$img = file_exists('../images/users/'.$_SESSION['idUsuario'].'.jpg') ? '../images/users/'.$_SESSION['idUsuario'].'.jpg': '../images/users/default.jpg';
	$dataUser = json_decode($_SESSION['usuario'], true);
	$aceptado = $_SESSION['aceptado'];
}else{
	header("Location: ../auth/");
	die();
}
$sobremi = $sobremi == "" ? "Agrega algo sobre tí en el botón de EDITAR PERFIL" : ucfirst($sobremi);
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="​Happiness &amp;amp; Mindfulness Courses, Welcome Message, Benefits of working with us​, 01, 02, 03, 04, 05, 06, ​How Coaching Works, ​How and where to learn mindfulness, Meet The Team
Our Professionals, ​Start using Our App for free">
	<title>Perfil</title>
	<script type="text/javascript" src="../static/js/jquery.js"></script>
	<link rel="stylesheet" href="../static/css/nicepage.css" media="screen">
	<link rel="stylesheet" href="../static/css/Inicio.css" media="screen">
	<link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="./style.css">
	<script class="u-script" type="text/javascript" src="../static/js/nicepage.js" defer=""></script>
	<link href="../static/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="../static/js/bootstrap.min.js"></script>
	

	<style>
		div.file{
			cursor:pointer !important;
		}
		div.file input{
			cursor:pointer;			
		}
	</style>
</head>

<body class="u-body u-xl-mode" data-lang="es">
	<div class="modal fade" id="modal_misprestamos" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Mis prestamos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body overflow-auto mr-2">
				<table class="table table-striped table-responsive-sm">
					<thead>
						<tr>
							<th scope="col">IMPRIMIR FORM</th>
							<th scope="col">TIPO PRÉSTAMO</th>
							<th scope="col">MONTO $US.</th>
							<th scope="col" style="min-width:90px;">PLAZO</th>
							<th scope="col" style="min-width:100px;">MOTIVO</th>
							<th scope="col">FECHA SOLICITUD</th>
							<th scope="col">FECHA PAGO</th>
							<th scope="col">ESTADO</th>
						</tr>
					</thead>
					<tbody id="t_body_prestamos">
						
					</tbody>
				</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<header class="u-clearfix u-header u-header u-palette-1-dark-2" id="sec-a7be">
		<div class="u-clearfix u-sheet u-sheet-1">
			<a href="../home/" class="u-image u-logo u-image-1" data-image-width="800" data-image-height="800">
				<img src="../images/logo.jpg" class="u-logo-image u-logo-image-1">
			</a>
			<nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1"  data-responsive-from="MD">
				<div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
					<a class="u-button-style u-custom-border u-custom-border-color u-custom-borders u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
						href="#"
						data-lang-en="{&quot;content&quot;:&quot;<svg class=\&quot;u-svg-link\&quot; viewBox=\&quot;0 0 24 24\&quot;><use xmlns:xlink=\&quot;http://www.w3.org/1999/xlink\&quot; xlink:href=\&quot;#menu-hamburger\&quot;></use></svg><svg class=\&quot;u-svg-content\&quot; version=\&quot;1.1\&quot; id=\&quot;menu-hamburger\&quot; viewBox=\&quot;0 0 16 16\&quot; x=\&quot;0px\&quot; y=\&quot;0px\&quot; xmlns:xlink=\&quot;http://www.w3.org/1999/xlink\&quot; xmlns=\&quot;http://www.w3.org/2000/svg\&quot;>    <g>        <rect y=\&quot;1\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>        <rect y=\&quot;7\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>        <rect y=\&quot;13\&quot; width=\&quot;16\&quot; height=\&quot;2\&quot;></rect>    </g></svg>&quot;,&quot;href&quot;:&quot;#&quot;}">
						<svg class="u-svg-link" viewBox="0 0 24 24">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
						</svg>
						<svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
							xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
							<g>
								<rect y="1" width="16" height="2"></rect>
								<rect y="7" width="16" height="2"></rect>
								<rect y="13" width="16" height="2"></rect>
							</g>
						</svg>
					</a>
				</div>
				<div class="u-nav-container">
					<ul class="u-nav u-spacing-20 u-unstyled u-nav-1 u-text-1">
						<li class="u-nav-item" ><a
								class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-withe u-text-hover-palette-2-base"
								href="../home/" style="padding: 10px;">Inicio</a>
						</li>
						<?php if($aceptado): ?>
						<li class="u-nav-item"><a
								class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-white-90 u-text-hover-palette-2-base"
								href="../solicitudes/" style="padding: 10px;">Solicitar</a>
						</li>
						<?php endif; ?>
						<li class="u-nav-item"><a
								class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-white-90 u-text-hover-palette-2-base"
								href="#" type="button" data-toggle="modal" data-target="#modal_misprestamos" style="padding: 10px;">Mis prestamos</a>
						</li>
						<li class="u-nav-item"><a
								class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-white-90 u-text-hover-palette-2-base"
								href="../about/" style="padding: 10px;">Acerca de</a>
						</li>
						<li class="u-nav-item u-dropdown">
							<a class="u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-white-90 u-text-hover-palette-2-base"
								href="javascript:void(0);" style="padding: 10px;">Políticas
								<span class="arrow-down-icon">&#9662;</span></a>
							<div class="u-dropdown-content">
								<a href="#" style="color:#243f56;">Privacidad</a>
								<a href="#" style="color:#243f56;">Términos</a>
							</div>
						</li>
						<li class="u-nav-item">
							<a id="exit" class="btn p-2 btn-rounded btn-danger u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base"
                			href="../auth/" style="color:#fff !important;padding: 10px;">SALIR</a>
            			</li>
					</ul>
				</div>
				<div class="u-nav-container-collapse">
					<div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
						<div class="u-inner-container-layout u-sidenav-overflow">
							<div class="u-menu-close"></div>
							<ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
								<li class="u-nav-item"><a class="u-button-style u-nav-link"
										href="../home/" style="color:#fff">Inicio</a>
								</li>
								<?php if($aceptado): ?>
								<li class="u-nav-item"><a class="u-button-style u-nav-link" href="../solicitudes/">Solicitar</a>
								</li>
								<?php endif; ?>
								<li class="u-nav-item"><a class="u-button-style u-nav-link" href="#" type="button" data-toggle="modal" data-target="#modal_misprestamos">Mis prestamos</a>
								</li>
								<li class="u-nav-item"><a class="u-button-style u-nav-link"
										href="../about/">Acerca de</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
				</div>
			</nav>
		</div>
	</header>
	<div class="container emp-profile">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">
					<img id="imagen" src="<?php echo $img; ?>"
						alt="user-image" />
					<form>
						<div class="file btn btn-lg btn-primary">
							Cambiar Foto
							<input type="file" name="file" id="perfil" accept="image/*" onchange="leerImagen()"/>
						</div>
					</form>
				</div>
				<div style="text-align:center;font-weight: bold">
					<?=$dataUser['nombre'].' '.$dataUser['paterno'].' '.$dataUser['materno']?>
					<br>
					<?=$dataUser['ci'].' '.$dataUser['expedido']?>
				</div>
				<div class="d-flex justify-content-center mt-4 mb-2">
					<a href="../formsPdf/formcas1A.php" target="_blank" class="btn btn-primary" type="button">VER SOLICITUD DE AFILIACIÓN</a>
				</div>
			</div>
			<div class="col-md-8">
			<table class="table">
					<thead>
						<tr align="center">
							<th scope="col">#</th>
							<th scope="col">Dato</th>
							<th scope="col">Valor</th>
						</tr>
					</thead>
					<tbody id="tbody">
						<tr>
							<th scope="row">1</th>
							<td>Fecha Nacimiento</td>
							<?php $fecha = new DateTime($dataUser['fechaNacimiento']);?>
							<td><?=$fecha->format('d-m-Y')?></td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Estado Civil</td>
							<td><?=$dataUser['estadoCivil']?></td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Celular</td>
							<td><?=$dataUser['celular']?></td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td>Correo electrónico</td>
							<td><?=$dataUser['correo']?></td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td>Ciudad Actual</td>
							<td><?=$dataUser['ciudad']?></td>
						</tr>
						<tr>
							<th scope="row">6</th>
							<td>Localidad - Zona</td>
							<td><?=$dataUser['localidad'].' - '.$dataUser['zona']?></td>
						</tr>
						<tr>
							<th scope="row">7</th>
							<td>Avenida|Calle - Nro.</td>
							<td><?=$dataUser['calle'].' - '.$dataUser['numero']?></td>
						</tr>
						<tr>
							<th scope="row">8</th>
							<td>Fuerza</td>
							<td><?=$dataUser['fuerza']?></td>
						</tr>
						<tr>
							<th scope="row">9</th>
							<td>Arma</td>
							<td><?=$dataUser['arma']?></td>
						</tr>
						<tr>
							<th scope="row">10</th>
							<td>Grado</td>
							<td><?=$dataUser['grado']?></td>
						</tr>
						<tr>
							<th scope="row">11</th>
							<td>Fecha de incorporación</td>
							<?php $fechaInc = new DateTime($dataUser['fechaIncorporacion']);?>
							<td><?=$fechaInc->format('d-m-Y')?></td>
						</tr>
						<tr>
							<th scope="row">12</th>
							<td>Carnet Militar</td>
							<td><?=$dataUser['carnetMilitar']?></td>
						</tr>
						<tr>
							<th scope="row">13</th>
							<td>Código Boleta</td>
							<td><?=$dataUser['codigoBoleta']?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include('../common/footer.php'); ?>
	<script src="../static/js/sweetalert2.min.js"></script>
	<script src="./js/profile.js"></script>
</body>

</html>