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



    h1 {
      font-size: 28px;
    }

    h2 {
      font-size: 23.8px;
    }

    h3 {
      font-size: 18.2px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      border: 0;
      font-size: 14px;
      font-weight: 300;
      letter-spacing: 1px;
      cursor: pointer;
      -webkit-transition: all 0.3s ease-in-out 0s;
      -moz-transition: all 0.3s ease-in-out 0s;
      -ms-transition: all 0.3s ease-in-out 0s;
      -otransition: all 0.3s ease-in-out 0s;
      transition: all 0.3s ease-in-out 0s;
    }

    .btn-primary {
      background: var(--mdb-btn-active-bg);
      color: #fff;
    }
    .btn-primary:hover, .btn-primary:focus {
      background: #1754d1;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      -ms-box-shadow: none;
      -obox-shadow: none;
      box-shadow: none;
    }

    .btn-default {
      background: #666666;
      color: #fff;
    }

    input[type=text],
    input[type=email],
    input[type=tel],
    input[type=password],
    textarea,
    select {
      width: 100%;
      display: block;
      padding: 12px 15px;
      border: 1px solid #ccc;
      background: #f9f9f9;
    }

    .mar-b-0 {
      margin-bottom: 0 !important;
    }

    a {
      color: #1754d1;
    }
    a:hover {
      color: #fb8200;
    }

    html {
      overflow-x: hidden;
    }

    /* body {
      font-family: "Merriweather", serif;
      font-weight: 300;
      font-size: 14px;
      letter-spacing: 1px;
    } */

    .form-wizard {
      position: relative;
      display: table;
      margin: 0 auto;
      max-width: 650px;
    }

    .steps {
      margin: 40px 0;
      overflow: hidden;
    }
    .steps ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .steps ul li {
      float: left;
      color: #fff;
      padding: 0 15px;
      position: relative;
      cursor: pointer;
      -webkit-transition: all 0.4s ease-in-out 0;
      -moz-transition: all 0.4s ease-in-out 0;
      -ms-transition: all 0.4s ease-in-out 0;
      -otransition: all 0.4s ease-in-out 0;
      transition: all 0.4s ease-in-out 0;
    }
    .steps ul li:hover, .steps ul li.active {
      /* color: #fb8200; */
      color: #14a44d;
    }
    .steps ul li:hover span, .steps ul li.active span {
      background: #14a44d;
      color: #fff;
    }
    .steps ul li:hover::after, .steps ul li.active::after {
      background: #14a44d;
      width: 100%;
    }
    .steps ul li::before, .steps ul li::after {
      content: "";
      position: absolute;
      left: -50%;
      top: 22px;
      width: 100%;
      height: 3px;
      background: #fff;
      -webkit-transition: all 0.4s ease-in-out 0;
      -moz-transition: all 0.4s ease-in-out 0;
      -ms-transition: all 0.4s ease-in-out 0;
      -otransition: all 0.4s ease-in-out 0;
      transition: all 0.4s ease-in-out 0;
      -webkit-transform: translateY(-50%);
      -moz-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      -otransform: translateY(-50%);
      transform: translateY(-50%);
    }
    .steps ul li::after {
      width: 0;
    }
    .steps ul li span {
      display: block;
      margin: 0 auto 15px;
      width: 35px;
      height: 35px;
      text-align: center;
      background: #fff;
      font-size: 18px;
      line-height: 35px;
      font-weight: 300;
      color: #000;
      position: relative;
      z-index: 1;
      -webkit-transition: all 0.4s ease-in-out 0;
      -moz-transition: all 0.4s ease-in-out 0;
      -ms-transition: all 0.4s ease-in-out 0;
      -otransition: all 0.4s ease-in-out 0;
      transition: all 0.4s ease-in-out 0;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      -ms-border-radius: 2px;
      -oborder-radius: 2px;
      border-radius: 2px;
    }
    .steps ul li:first-child::before, .steps ul li:first-child::after {
      display: none;
    }

    .form-container {
      clear: both;
      display: none;
      left: 100%;
      background: #fff;
      padding: 30px;
      margin-bottom: 45px;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      -ms-border-radius: 4px;
      -oborder-radius: 4px;
      border-radius: 4px;
      -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
      -moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
      -ms-box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
      -obox-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
    }
    .form-container.active {
      display: block;
    }

    .form-title {
      margin-bottom: 30px;
      padding-bottom: 15px;
      position: relative;
    }
    .form-title::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 80px;
      height: 2px;
      background: #14a44d;
      -webkit-transform: translateX(-50%);
      -moz-transform: translateX(-50%);
      -ms-transform: translateX(-50%);
      -otransform: translateX(-50%);
      transform: translateX(-50%);
    }
  </style>
</head>

<body data-home-page="../home/" data-home-page-title="Inicio" class="u-body u-xl-mode" data-lang="es">
  <?php include('../common/header.php'); ?>
  <section
    class="skrollable skrollable-between u-align-center u-clearfix u-container-align-center u-image u-shading u-section-2"
    id="carousel_e141" src="" data-image-width="1620" data-image-height="1080">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="form-wizard">  
        <div class="steps">
          <ul>
            <li>
              <span>1</span>
              Crear cuenta
            </li>
            <li>
              <span>2</span> 
              Confirmar correo
            </li>
            <li>
              <span>3</span>
              Llenar datos
            </li>
              <li>
              <span>4</span>
              Subir documentos
            </li>
          </ul>
        </div>
        <div class="myContainer">
          <div class="form-container animated">
            <h4 class="text-center form-title">Crear cuenta</h4>
            <form id="form_01">
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
                <div class="input-group flex-nowrap input-group-lg">
                  <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Tu celular" name="celular" id="celular" required/>
                  <div class="invalid-feedback">
                    Número de celular inválido
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <span style="color:#a0a0a0;text-align:left">Fecha de nacimiento</span>
                <div class="input-group flex-nowrap input-group-lg">
                  <span class="input-group-text"><i class="fas fa-regular fa-calendar"></i></span>
                  <input type="date" id="fecha_nac" class="form-control" placeholder="Fecha de nacimiento" name="fechaNac" required/>
                  <div class="invalid-feedback">
                    Fecha fuera del rango válido
                  </div>
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
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" class="form-control" placeholder="Tu correo electrónico" name="correoElec" id="email" required />
                  <div class="invalid-feedback">
                    Ingrese un correo electrónico válido.
                  </div>
                </div>
              </div>
              <div class="form-group text-center mar-b-0">
                <button type="submit" id="btn_form01" class="btn btn-primary" disabled>CONTINUAR</button>        
              </div>
            </form>
          </div>

          <div class="form-container animated">
            <h4 class="text-center form-title">Verificación</h4>
            <form>
              <p class="text-dark">Le enviamos un código de 4 digitos al correo <b></b> que ingresó en el paso anterior <b id="correo_destino"></b></p>
              <div class="row mb-4">
                <div class="input-group flex-nowrap input-group-lg">
                  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                  <input type="text" class="form-control" id="codigo_email" placeholder="código" name="codigo" />
                  <div class="invalid-feedback">
                    Código no válido
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <button type="button" class="btn btn-info" id="btn_volver_enviar" disabled>Volver a enviar</button>
                <span class="text-dark d-block">Volver a enviar en <b id="volver_enviar">121</b> segundos</span>
              </div>
              <div class="form-group text-center mar-b-0">      
                <input type="button" value="VERIFICAR" id="btn_codigo" class="btn btn-primary">        
              </div>
            </form>
          </div>
          <div class="form-container animated">
            <h4 class="text-center form-title">Registrar datos</h4>
            <form id="form_02">
              <div class="row mb-2">
                <span style="color:#C0C0C0;">Su dirección actual</span>
                <div class="input-group flex-nowrap input-group-lg">
                  <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                  <select id="departamento_actual" name="departamento_actual" class="form-select pl-2" required>
                    <option value="" disabled selected>- Sel. departamento -</option>
                  </select>
                </div>
              </div>
              <div class="row mb-2">
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
                  <select name="arma" class="form-select pl-2" id="armas">
                    <option value="">- Sel. Arma -</option>
                  </select>
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
                  <div class="invalid-feedback">
                    La contraseña debe tener al menos 8 caracteres y ser alfanumérica.
                  </div>
                </div>
                
              </div>
              <div class="form-group text-center mar-b-0">
                <input type="submit" id="btn_form02" value="SIGUIENTE" class="btn btn-primary next">        
              </div>
            </form>
          </div>


          <div class="form-container animated">
            <h4 class="text-center form-title">Subir archivos</h4>
            <form>
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
              <div class="form-group text-center mar-b-0"> 
                <input type="button" value="ATRÁS" class="btn btn-secondary back"> 
                <input type="submit" value="REGISTRARME" class="btn btn-primary submit">         
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include('../common/footer.php'); ?>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script src="../static/js/sweetalert2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../static/js/jquery.js"></script>
  <!-- <script src="./js/register.js"></script> -->
  <script src="./js/load-resources.js"></script>
  <script src="../static/js/bootstrap.min.js"></script>
  <script src="./js/app.js"></script>
  <script>
    


/*=========================================================
*     If you won't to make steps clickable, Please comment below code 
=================================================================*/
// $(".steps li").on("click", function() {
//   var stepVal = $(this).find("span").text();
//   $(this).prevAll().addClass("active");
//   $(this).addClass("active");
//   $(this).nextAll().removeClass("active");
//   $(".myContainer .form-container").removeClass("active flipInX");  
//   $(".myContainer .form-container:nth-of-type("+ stepVal +")").addClass("active flipInX");     
// });
  </script>
</body>

</html>