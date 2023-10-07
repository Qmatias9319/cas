<?php
require_once('./models/arma.php');
class Arma {
  public function __construct() {
  }

  public function create($data) {
  }

  public function getAllArmas($id) {
    $object = new ArmaModel();
    $res = $object->getAllArmas($id);
    echo json_encode(array('status' => 'success', 'armas' => $res));
  }
}
