<?php
require_once('./config/database.php');
require_once('./models/email.php');
class Token{
  private $pdo;
  private $table = "tblToken";
  public function __construct(){
    $this->pdo = connectToDatabase();
  }

  public function getByEmail($email){
    $sql = "SELECT * FROM $this->table WHERE email LIKE '$email';";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function generate(){
    return substr(time(), -4);
  }

  public function update($idToken, $token){
    //Enviar el correo con el token
    $sql = "UPDATE $this->table SET token = '$token' WHERE idToken = '$idToken';";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function create($email, $token){
    // Enviar el correo electronico
    $sql = "INSERT INTO $this->table (email, token) VALUES ('$email', '$token');";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function verify($email, $token){
    date_default_timezone_set('America/La_Paz');
    $sql = "SELECT * FROM $this->table WHERE email LIKE '$email' AND token LIKE '$token' AND confirmed LIKE 'N';";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $reg = $stmt->fetchAll();
    if(count($reg) > 0){
      $today = date('Y-m-d');
      $sql = "UPDATE $this->table SET confirmed = 'Y', confirmed_at = '$today' WHERE email LIKE '$email' AND token LIKE '$token';";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
    }else{
      return null;
    }
  }

  public function prueba(){
    $email = new Email('rcchambi4@gmail.com', $this->generate());
    if($email->send()){
      echo json_encode(array('status'=>'success', 'message'=>'Correo enviado con exito'));
    }else{
      echo json_encode(array('status'=>'error', 'message'=>'Error al enviar el correo'));
    }
  }
}
?>