<?php
$controllers = ['socio', 'user', 'prestamo'];
foreach ($controllers as $controller) {
  require_once("controllers/$controller.php");
}
?>