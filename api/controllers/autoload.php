<?php
$controllers = ['socio', 'user', 'prestamo','departamento','expedicion','provincia','municipio','localidad','fuerza','detalleMilitar','estadoCivil','grado'];
foreach ($controllers as $controller) {
  require_once("controllers/$controller.php");
}
?>