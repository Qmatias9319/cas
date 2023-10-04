<?php 
session_start();

if(isset($_SESSION['idUsuario'])){
  header("Location: ../home/");
  die();
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="es">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="​Happiness &amp;amp; Mindfulness Courses, Welcome Message, Benefits of working with us​, 01, 02, 03, 04, 05, 06, ​How Coaching Works, ​How and where to learn mindfulness, Meet The Team
Our Professionals, ​Start using Our App for free">
  <meta name="description" content="">
  <title>Registrar</title>
  <link rel="stylesheet" href="../static/css/nicepage.css" media="screen">
  <link rel="stylesheet" href="../static/css/Inicio.css" media="screen">
  <script class="u-script" type="text/javascript" src="../static/js/jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="../static/js/nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.5.0, nicepage.com">

  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Aprendizaje",
		"logo": "images/logo_en.png",
		"sameAs": []
}</script>
  <meta name="theme-color" content="#243f56">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <script src="../static/js/sweetalert2.min.js"></script>
  <style>
    .register{
      display:flex;
      gap:20px;
    }
    @media (max-width: 720px){
      /* #regisForm{
        width:100%;
      } */
      #logoRegis{
        display: none;
      }
      .register{
        flex-direction: column;
        flex-wrap: wrap;
      }
      .colRegister{
        width: 100%;;
      }
    }
    #swal2-title{
      font-size: 1.9rem;
    }
  </style>
</head>

<body data-home-page="../home/" data-home-page-title="Inicio" class="u-body u-xl-mode" data-lang="es">
  <?php include('../common/header.php'); ?>
  <section
    class="skrollable skrollable-between u-align-center u-clearfix u-container-align-center u-image u-shading u-section-2"
    id="carousel_e141" src="" data-image-width="1620" data-image-height="1080">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <form id="form_register">
        <div class="container">
          <div class="row">
            <div class="register">
              <div class="col-6 colRegister">
                <div class="card">
                  <div class="card-header text-start">
                    <h3 class="card-title text-dark align-left mt-2"><i class="fas fa-table"></i> <b>Registrarse</b></h3>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-circle-user"></i></span>
                          <input type="text" class="form-control" name="paterno" placeholder="Ap. Paterno" required>
                          <input type="text" class="form-control" name="materno" placeholder="Ap. Materno" required>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-circle-user"></i></span>
                          <input type="text" class="form-control" placeholder="Nombres" name="nombres" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-regular fa-id-card"></i></span>
                          <input type="text" class="form-control" placeholder="Carnet de identidad" name="ci" required />
                          <div class="input-group-text p-0" style="width:70px;">
                            <select id="extension_ci" title="Extendido en..." name="expedido" class="form-select px-1" required style="border:none">
                              <option value="" title="extensión">S/E</option>
                            </select>
                          </div>  
                        </div>
                      </div>
                      <div class="row mb-4">
                        <span style="color:#a0a0a0;text-align:left">Fecha de nacimiento</span>
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-regular fa-calendar"></i></span>
                          <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="fechaNac" required/>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-ring"></i></span>
                          <select id="estado_civil" name="estadoCivil" class="form-select pl-2">
                            <option value="">- Sel. estado civil -</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                          <input type="text" class="form-control" placeholder="Tu celular" name="celular" />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <span style="color:#C0C0C0;">Lugar de nacimiento</span>
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text" ><i class="fas fa-globe"></i></span>
                          <select id="departamento" name="departamento" class="form-select pl-2" required>
                            <option value="" disabled selected>- Sel. departamento -</option>
                          </select>
                          <select id="provincia" name="provincia" class="form-select pl-2" required>
                            <option value="" disabled selected>- Sel. provincia -</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text" ><i class="fas fa-globe"></i></span>
                          <select id="municipio" name="municipio" class="form-select pl-2" required>
                            <option value="" disabled selected>- Sel. municipio -</option>
                          </select>
                          <select id="localidad" name="localidad_x" class="form-select pl-2" style="display:none;">
                            <option value="" disabled selected>- Sel. localidad -</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <span style="color:#C0C0C0;">Su dirección actual</span>
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                          <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                          <input type="text" class="form-control" name="localidad" placeholder="Localidad">
                          <input type="text" class="form-control" name="zona" placeholder="Zona">
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                          <input type="text" class="form-control" name="avenida" placeholder="Calle/Avenida">
                          <input type="text" class="form-control" name="nroDir" placeholder="Nro. de domicilio">
                        </div>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>

              <div class="col-6 colRegister">
                <div class="card">
                  <div class="card-header text-start">
                    <h3 class="card-title text-dark align-left mt-2"><i class="fas fa-table"></i> <b>Datos</b></h3>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          <input type="email" class="form-control" placeholder="Tu correo electrónico" name="correoElec" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-shield"></i></span>
                          <select name="provieneFuerza" class="form-select pl-2" name="provieneFuerza" required id="fuerza">
                            <option value="">- Sel. fuerza -</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-bolt-lightning"></i></span>
                          <select name="grado" class="form-select pl-2" id="grado">
                            <option value="">- Sel. grado -</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-shield"></i></span>
                          <input type="text" name="arma" class="form-control" placeholder="Arma" />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <span style="color:#a0a0a0;text-align:left">Fecha de incorporación/Egreso</span>
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-regular fa-calendar"></i></span>
                          <input type="date" class="form-control" name="fechaIncorporacion" required/>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-id-card-clip"></i></span>
                          <input type="text" class="form-control" name="carnetMilitar" placeholder="Carnet Militar" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-id-card-clip"></i></span>
                          <input type="text" class="form-control" name="carnetCossmil" placeholder="Carnet Cossmil" required />
                        </div>
                      </div>
                    
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fa fa-solid fa-ticket"></i></span>
                          <input type="text" class="form-control" name="codBoleta" placeholder="Código Boleta" required />
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="input-group flex-nowrap input-group-lg">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="password" class="form-control" name="password" placeholder="Tu contraseña" id="pass" required />
                        </div>
                        <span id="verifyPass" style="color:orange;display:none">8 caracteres alfanuméricos</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-3">
          <div class="row">
            <div class="col-6 colRegister">
              <div class="card">
                <div class="card-header text-start">
                  <h3 class="card-title text-dark align-left mt-2"><i class="fas fa-regular fa-file-pdf"></i> <b>Archivos (pdf)</b></h3>
                </div>
                <div class="card-body">
                  <div class="container">
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotocopia última papeleta de pago (Firmado con boligrafo azul)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="papeletapago" required>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotocopia Carnet de Identidad (Firmado con boligrafo azul y huellas dactilares del pulgar derecho e izquierdo con tampo azul)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="ci" required>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Un cuadro de vinculación AFCOOP (Firmado con boligrafo azul y huellas dactilares del pulgar derecho con tampo azul)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="afcoop" required>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotocopia carnet COSSMIL (Firmado con boligrafo azul)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="carnetcossmil" required>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotocopia Carnet militar (Firmado con boligrafo azul)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="carnetMilitar" required>
                      </div>
                    </div>
                    
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotocopia de memorándum de incorporación de las FF.AA. (Persona civil)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" data-filename="memorandum" accept=".pdf">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <span style="color:#8c95cc;text-align:left">- Fotografía 4x4 fondo rojo (personal militar y civil con uniforme reglamentario)</span>
                      <div class="input-group">                      
                        <input type="file" class="form-control filePdf" accept=".pdf" data-filename="foto4x4" required>
                      </div>
                    </div>
                    
                    <!-- Checked checkbox -->
                    <div class="form-check text-start">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked />
                      <label class="form-check-label text-muted" for="flexCheckChecked">Al hacer click aquí, (i) estoy
                        de acuerdo con las <a class="text-primary" href="#">Políticas de uso</a>
                        y términos de <a class="text-primary" href="#"> privacidad</a>.
                      </label>
                      <span id="checkPoliticas" style="color:orange;display:none"></span>
                    </div>
                  </div>
                  <a href="../home/" class="mt-4 btn btn-lg btn-rounded btn-danger text-light"><i
                      class="fas fa-xmark"></i> <b>Cancelar</b></a>
                  <button type="submit" id="btn-submit" class="btn btn-lg btn-rounded btn-success text-light"><i
                      class="fas fa-user-plus"></i> <b>Registrar</b></button>
                  <div id="mensaje" style="background-color: rgba(15,15,15,0.2);"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <?php include('../common/footer.php'); ?>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script src="../static/js/sweetalert2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../static/js/jquery.js"></script>
  <script src="./js/register.js"></script>
  <script src="./js/load-resources.js"></script>
  <script src="../static/js/bootstrap.min.js"></script>
</body>

</html>