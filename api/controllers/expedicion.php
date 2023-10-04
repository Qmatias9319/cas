<?php
require_once('./models/expedicion.php');
class Expedicion
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllExpediciones(){
    $object = new ExpedicionModel();
    $res = $object->getAllExpediciones();
    echo json_encode(array('status' => 'success', 'expediciones' => $res));
  }

}
?>