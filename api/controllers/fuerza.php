<?php
require_once('./models/fuerza.php');
class Fuerza
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllFuerzas(){
    $object = new FuerzaModel();
    $res = $object->getAllFuerzas();
    echo json_encode(array('status' => 'success', 'fuerzas' => $res));
  }

}
?>