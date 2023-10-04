<?php
require_once('./models/departamento.php');
class Departamento
{
  public function __construct(){
    
  }

  public function create($data)
  {
    
  }

  public function getAllDepartamentos(){
    $prestamos = new DepartamentoModel();
    $res = $prestamos->getAllDepartamentos();
    echo json_encode(array('status' => 'success', 'departamentos' => $res));
  }

}
?>