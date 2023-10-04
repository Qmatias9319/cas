<?php
require_once('./models/provincia.php');
class Provincia
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllProvincias($id){
    $object = new ProvinciaModel();
    $res = $object->getAllProvincias($id);
    echo json_encode(array('status' => 'success', 'provincias' => $res));
  }

}
?>