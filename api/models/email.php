<?php
// require './vendor/PHPMailer-master/src/PHPMailer.php';
// require './vendor/PHPMailer-master/src/SMTP.php';
// require './vendor/PHPMailer-master/src/Exception.php';
// use PHPMailer\PHPMailer\PHPMailer;
// class Email{
//   private $to;
//   private $subject = 'Codigo de verificación';
//   private $body = '<h4>Envio del codigo de verificación</h4><hr>El código es:';

//   private static $host = 'smtp.outlook.com';
//   private static $port = 587;
//   private static $smtpSecure = 'tls';

//   private static $from = 'stisbo@outlook.com';

//   private static $password = 'BOstis123*';

//   public function __construct($to, $bodyCode){
//     $this->to = $to;
//     $this->body = $this->body.'<b> '.$bodyCode.'</b>';
//   }

//   public function send(){
//     try{
//       $mail = new PHPMailer();
//       $mail->SMTPDebug = 0;  
//       $mail->CharSet = "UTF-8";
//       $mail->isSMTP();
//       $mail->Host = self::$host;
//       $mail->Port = self::$port;
//       $mail->SMTPSecure = self::$smtpSecure;
//       $mail->SMTPAuth = true;

//       $mail->Username = self::$from;
//       $mail->Password = self::$password;
//       $mail->setFrom(self::$from);
//       $mail->addAddress($this->to);
//       $mail->Subject = $this->subject;

//       $mail->isHTML(true);
//       $mail->Body = $this->body;
//       if($mail->send()){
//         return true;
//       }else{
//         return false;
//       }
//     }catch(Exception $e){
//       print_r($e);
//     }
//   }

  

// }
?>