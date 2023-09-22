<?php
session_start();
$sesion = false;
if(isset($_SESSION['idUsuario'])){
  $sesion=true;
  $img  = file_exists('../images/users/'.$_SESSION['idUsuario'].'.jpg') ? '../images/users/'.$_SESSION['idUsuario'].'.jpg': '../images/users/default.jpg';
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
  <title>Inicio</title>
  <link rel="stylesheet" href="../static/css/nicepage.css" media="screen">
  <link rel="stylesheet" href="../static/css/Inicio.css" media="screen">
  <script class="u-script" type="text/javascript" src="../static/js/jquery.js"></script>
  <script class="u-script" type="text/javascript" src="../static/js/nicepage.js"></script>
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
  <meta property="og:title" content="Inicio">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="u-body u-xl-mode" data-lang="es">
  <?php 
  if($sesion){
    include('../common/header-log.php');
  }else{
    include('../common/header.php');
  }
  ?>

  <section class="u-align-center u-clearfix u-container-align-center u-image u-section-1" id="sec-edee"
    data-image-width="1980" data-image-height="1134">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h1 class="u-align-center u-text u-text-palette-1-base u-text-1" data-animation-name="customAnimationIn"
        data-animation-duration="1500" data-animation-delay="0"
        data-lang-en="​">Cooperativa de Ahorro y Crédito<br><span style="font-weight: 700;">Apostol Santiago
        </span>
      </h1>
      <p class="u-align-center u-text u-text-2" data-animation-name="customAnimationIn" data-animation-duration="1500"
        data-animation-delay="500"
        data-lang-en="Sample text. Click to select the text box. Click again or double click to start editing the text.&amp;nbsp;Viverra maecenas accumsan lacus vel <span class=&quot;u-text-grey-30&quot;>​</span>facilisis volutpat. Cras fermentum odio eu feugiat pretium nibh.">
        </p>
      <a href="../about/"
        class="u-active-palette-4-base u-align-center u-border-4 u-border-active-palette-4-base u-border-hover-palette-4-base u-border-palette-4-base u-btn u-btn-round u-button-style u-hover-palette-4-base u-radius-50 u-text-active-white u-text-hover-white u-btn-1"
         data-animation-name="customAnimationIn" data-animation-duration="1750"
        data-animation-delay="500">Leer más</a>
    </div>
  </section>
  <section
    class="skrollable skrollable-between u-align-center u-clearfix u-container-align-center u-image u-shading u-section-2"
    id="carousel_e141" src="" data-image-width="1620" data-image-height="1080">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h2 class="u-align-center u-text u-text-default u-text-1" data-animation-name="customAnimationIn"
        data-animation-duration="1500" data-lang-en="​How Coaching Works">¡BIENVENIDO!</h2>
      <p class="u-align-center u-large-text u-text u-text-variant u-text-2" data-animation-name="customAnimationIn"
        data-animation-duration="1500" data-animation-delay="500"
        data-lang-en="Simple Text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus quis elementum.">
  </p>
      <div class="u-clearfix u-layout-custom-sm u-layout-custom-xs u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div
              class="u-align-center-xs u-align-right-lg u-align-right-md u-align-right-sm u-align-right-xl u-container-style u-layout-cell u-left-cell u-size-30-lg u-size-30-md u-size-30-sm u-size-30-xl u-size-60-xs u-layout-cell-1">
              <div class="u-container-layout u-valign-top u-container-layout-1">
                <a href="../register/"
                  class="u-active-white u-border-4 u-border-active-white u-border-hover-white u-border-palette-4-base u-btn u-btn-round u-button-style u-hover-white u-palette-4-base u-radius-50 u-text-active-palette-1-base u-text-hover-palette-1-base u-btn-1"
                  data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="500"
                  data-lang-en="{&quot;content&quot;:&quot;Learn More&quot;,&quot;href&quot;:&quot;https://nicepage.best&quot;}">REGISTRATE</a>
              </div>
            </div>
            <div
              class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-layout-cell u-right-cell u-size-30-lg u-size-30-md u-size-30-sm u-size-30-xl u-size-60-xs u-layout-cell-2">
              <div class="u-container-layout u-valign-top-xs u-container-layout-2">
                <a href="../auth/"
                  class="u-active-white u-border-4 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-white u-none u-radius-50 u-text-active-palette-1-base u-text-hover-palette-1-base u-btn-2"
                  data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="500"
                  data-lang-en="{&quot;content&quot;:&quot;Live Demo&quot;,&quot;href&quot;:&quot;https://nicepage.com/k/dog-website-templates&quot;}">INICIAR
                  SESIÓN</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('../common/footer.php'); ?>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>