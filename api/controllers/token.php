<?php
require_once('./models/token.php');
require_once('./models/email.php');
class Tokens{

  public function create($data, $files=null){
    $token = new Token();
    if(isset($data['email'])){
      $registros = $token->getByEmail($data['email']);
      $tkcode = $token->generate();
      $email = new Email($data['email'], $tkcode);
      if($email->send()){
        if(count($registros) > 0){
          $idToken = $registros[0]['idToken'];
          $res = $token->update($idToken, $tkcode);
        }else{
          $res = $token->create($data['email'], $tkcode);
        }
        if($res){
          echo json_encode(array('status' => 'success', 'message' => 'correo enviado'));
        }else{
          echo json_encode(array('status'=>'error', 'error' => 'Error al crear el token'));
        }
      }else{
        echo json_encode(array('status'=>'error', 'error' => 'Error al enviar el correo'));
      }
    }else{
      echo json_encode(array('status'=>'error', 'error' => 'No se envio el correo, falta email'));
    }
  }

  public function verify($data, $file=null){
    $token = new Token();
    if(isset($data['token']) && isset($data['email'])){
      $res = $token->verify($data['email'], $data['token']);
      if($res){
        echo json_encode(array('status' => 'success', 'message' => 'Token valido', 'valid'=>true));
      }else{
        echo json_encode(array('status'=>'success', 'error' => 'Token invalido', 'valid'=>false));
      }
    }else{
      echo json_encode(array('status'=>'error', 'error' => 'falta email y token'));
    }
  }
  public function prueba(){
    $token = new Token();
    $token->prueba();
  }
}


?>