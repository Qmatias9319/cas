<?php
require_once('./models/grado.php');
class Grado
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllGrados($id){
    $object = new GradoModel();
    $res = $object->getAllGrados($id);
    echo json_encode(array('status' => 'success', 'grados' => $res));
  }

}
?>