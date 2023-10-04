<?php
require_once('./models/municipio.php');
class Municipio
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllMunicipios($id){
    $object = new MunicipioModel();
    $res = $object->getAllMunicipios($id);
    echo json_encode(array('status' => 'success', 'municipios' => $res));
  }

}
?>