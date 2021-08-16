<?php
  //start a session -- needed for Securimage Captcha check
  session_start();

  /**
   * Sets error header and json error message response.
   *
   * @param  String $messsage error message of response
   * @return void
   */
    $to = 'eventos1@gphoteles.com';
    $sitename = 'Adhara Hacienda Cancún';
  function errorResponse ($messsage) {
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode(array('message' => $messsage)));
  }


    if (isset($_POST['nombre']) && isset($_POST['empieza']) && isset($_POST['personas']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['tipoEvento'])) {

      $nombre = $_POST['nombre'];
      $fecha = $_POST['empieza'];
      $personas = $_POST['personas'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $tipoEvento = $_POST['tipoEvento'];
      if (isset($_POST['message'])) {
        $message = $_POST['message'];
      }
      else
        $message= "ninguno";

      if (isset($_POST['audio'])) {
         $audio ="audio";
      }
      else
        $audio ="";

      if (isset($_POST['pantalla'])) {
         $pantalla ="pantalla";
      }
      else
        $pantalla ="";

      if (isset($_POST['proyector'])) {
         $proyector ="proyector";
      }
      else
        $proyector ="";

      if (isset($_POST['tarima'])) {
         $tarima ="tarima";
      }
      else
        $tarima ="";

      if (isset($_POST['rotafolio'])) {
         $rotafolio ="rotafolio";
      }
      else
        $rotafolio ="";

      if (isset($_POST['desayuno'])) {
         $desayuno ="desayuno";
      }
      else
        $desayuno ="";

      if (isset($_POST['cafe'])) {
         $cafe ="cafe";
      }
      else
        $cafe ="";

      if (isset($_POST['comida'])) {
         $comida ="comida";
      }
      else
        $comida ="";

      if (isset($_POST['canapes'])) {
         $canapes ="canapes";
      }
      else
        $canapes ="";

      if (isset($_POST['cena'])) {
         $cena ="cena";
      }
      else
        $cena ="";

      $message_body="Nombre: ".$_POST['nombre']."\n email: ".$_POST['email']."\n telefono: ".$_POST['telefono']."\n Dia de evento: ".$_POST['empieza']."\n Tipo de evento: ".$_POST['tipoEvento']."\n Num. personas: ".$_POST['personas']."\n Servicios: ".$audio." ".$pantalla." ".$proyector." ".$tarima." ".$rotafolio."\n Alimentos/Bebidas: ".$desayuno." ".$cafe." ".$comida." ".$canapes." ".$cena."\n Mensaje: ".$message;

  
    }

  header('Content-type: application/json');

  require './vender/php_mailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  /*$messageBody = constructMessageBody();*/

  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->Host = 'mail.oktravel.mx';
  $mail->SMTPAuth = true;
  $mail->Usernombre = 'info@oktravel.mx';
  $mail->Password = 'q4t?)TyGX0y!';
  $mail->setFrom($_POST['email'], $_POST['nombre']);
  $mail->addAddress($to);
  $mail->addBCC('eventos3@gphoteles.com');
  $mail->AddReplyTo($_POST['email'], $_POST['nombre']);
  $mail->Subject = "Solicitud de Evento  ". $sitename;
  $mail->Body  = $message_body;

  //try to send the message
  if(!$mail->send()) {
    errorResponse('An expected error occured while attempting to send the email: ' . $mail->ErrorInfo);
    echo "2";
  } else {
      //echo json_encode(array('message' => 'Your message was successfully submitted.'));
      echo "1";
  }
?>