<?php
require_once('./models/localidad.php');
class Localidad
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllLocalidades($id){
    $object = new LocalidadModel();
    $res = $object->getAllLocalidades($id);
    echo json_encode(array('status' => 'success', 'localidades' => $res));
  }

}
?>