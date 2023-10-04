<?php
require_once('./models/estadoCivil.php');
class EstadoCivil
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllEstadosCiviles(){
    $object = new EstadoCivilModel();
    $res = $object->getAllEstadosCiviles();
    echo json_encode(array('status' => 'success', 'estadosCiviles' => $res));
  }

}
?>