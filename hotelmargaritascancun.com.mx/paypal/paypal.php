<?php 
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
// STEP 1: read POST data
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream.
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$filename = "paypalResponse.txt";
$textInicio = "\n\n--------------- Respuesta de una transaccion Paypal ".date("Y/m/d")."--------------\n\n";
file_put_contents ($filename,$textInicio ,FILE_APPEND);
file_put_contents ($filename,$raw_post_array ,FILE_APPEND);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
    $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
  $get_magic_quotes_exists = true;
}

$filename = "paypalLog.txt";
$textInicio = "\n\n--------------- Respuesta de una transaccion Paypal ".date("Y/m/d")."--------------\n\n";
file_put_contents ($filename,$textInicio ,FILE_APPEND);
foreach ($myPost as $key => $value) {
  if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
    $value = urlencode(stripslashes($value));
  } else {
    $value = urlencode($value);
    
  }
  $req .= "&$key=$value";
  file_put_contents ($filename,$req ,FILE_APPEND);
}

$item_name      = "\n".$myPost['item_name'];
file_put_contents ($filename,$item_name ,FILE_APPEND);
$item_number    = "\n".$myPost['item_number'];
file_put_contents ($filename,$item_number ,FILE_APPEND);
$payment_status   = "\n".$myPost['payment_status'];
file_put_contents ($filename,$payment_status ,FILE_APPEND);
$payment_amount   = "\n".$myPost['mc_gross'];
file_put_contents ($filename,$payment_amount ,FILE_APPEND);
$payment_currency = "\n".$myPost['mc_currency'];
file_put_contents ($filename,$payment_currency ,FILE_APPEND);
$txn_id       = "\n".$myPost['txn_id'];
file_put_contents ($filename,$txn_id ,FILE_APPEND);
$receiver_email   = "\n".$myPost['receiver_email'];
file_put_contents ($filename,$receiver_email ,FILE_APPEND);
$payer_email    = "\n".$myPost['payer_email'];
file_put_contents ($filename,$payer_email ,FILE_APPEND);
$idaff        = "\n".$myPost['custom'];
file_put_contents ($filename,$idaff ,FILE_APPEND);

// Step 2: POST IPN data back to PayPal to validate
$ch = curl_init('https://ipnpb.paypal.com/cgi-bin/webscr');
//$ch = curl_init('https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
$res = curl_exec($ch);
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "https://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if ( !($res) ) {
  error_log("Got " . curl_error($ch) . " when processing IPN data");
  curl_close($ch);
  exit;
}
//print_r($ch);
file_put_contents ($filename,$res ,FILE_APPEND); 

if($res == "VERIFIED"){

  if($receiver_email == "pagos@oktravel.mx"){

    try {

      $db = new db();
      $conn = $db->connection();
      $query = "INSERT INTO paypalpagos (item_name, item_number, payment_status, payment_amount, payment_currency, txn_id, receiver_email, payer_email,fecha,fullresponse,idaff) VALUES (?,?,?,?,?,?,?,?,now(),?,?);";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(1,$item_name);
      $stmt->bindParam(2,$item_number);
      $stmt->bindParam(3,$payment_status);
      $stmt->bindParam(4,$payment_amount);
      $stmt->bindParam(5,$payment_currency);
      $stmt->bindParam(6,$txn_id);
      $stmt->bindParam(7,$receiver_email);
      $stmt->bindParam(8,$payer_email);
      $stmt->bindParam(9,$req);
      $stmt->bindParam(10,$idaff);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count > 0){

        if($myPost["payment_status"] == "Completed"){

          try {
            
            $query = "UPDATE transactions SET estatus = 3 WHERE id = ?;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1,$myPost['item_number']);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count > 0) {

              $message = "\nSe actualizó la reserva ".$myPost['item_number']." en el panel.\n";
              file_put_contents ($filename,$message ,FILE_APPEND);

              $query = "SELECT nombre,apellido,correo,ciudad,pais FROM huespedes WHERE id = ?;";
              $stmt3 = $conn->prepare($query);
              $stmt3->bindParam(1,$orderInfo);
              $stmt3->execute();
              $count3 = $stmt3->rowCount();
              if($count3 > 0){

                  $row = $stmt3->fetch(PDO::FETCH_ASSOC);
                  $cliente     = $row['nombre']." ".$row['apellido'];
                  $email       = $row['correo'];
                  $total       = $amount;
                  $pais        = $row['pais'];
                  $ciudad      = $row['ciudad'];
                  
                  $query = "SELECT hotel,dateFrom,dateTo,detalles FROM reservations WHERE id =?;";
                  $stmt4 = $conn->prepare($query);
                  $stmt4->bindParam(1,$item_number);
                  $stmt4->execute();
                  $count4 = $stmt3->rowCount();
                  if($count4 > 0){

                      $row2 = $stmt4->fetch(PDO::FETCH_ASSOC);
                      $hotel       = $row2['hotel'];
                      $fechatranza = $row2['dateFrom'];
                      $datetranx   = $row2['dateTo'];
                      $detalles    = $row2['detalles']; 

                      $mensaje     = "<HTML>
                      <BODY>
                      <img src='https://adharacancun.com/img/logotipo.png' /><br>
                      <font face='Arial, Helvetica, sans-serif'>";
                      $mensaje = $mensaje."<p><strong>RESERVACION HOTEL ADHARA HACIENDA CANCÚN</strong></p>
                      <p><strong>ID: ".$item_number."</strong></p>";
                      $mensaje = $mensaje."<p>";
                      $mensaje = $mensaje."<strong>Cliente: </strong>".$cliente."<br>
                      <strong>Ciudad:</strong> ".$ciudad."<br>
                      <strong>Pais:</strong> ".$pais."<br>
                      <strong>Email:</strong> ".$email."<br>
                      <strong>Total:</strong> ".$total."<br>
                      <br>";
                      $mensaje = $mensaje.$detalles."<br><br>";
                      $mensaje = $mensaje."</p><hr>";
                      $mensaje = $mensaje."</font></BODY></HTML>";

                      $mailHost = "mail.oktravel.mx"; //cambiar host
                      $mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
                      $mailUsername = "info@oktravel.mx";   // SMTP username
                      $mailPassword = "oktravel1118";     // SMTP password
                      $mailSubject  =  "Reservacion PAYPAL - ".$item_number;  // mensaje Subject
                      $mailFromName = "Adhara Reservaciones"; // Nombre del remitente
                      $emailinterno="reservaciones@adharacancun.com";
                      $mimail="programacionweb@gphoteles.com";
                      $mail1="reservaciones@gphoteles.com ";
                      $mail2="asistente1.reservaciones@gphoteles.com "; 
                      $mail3="gerenteenturno@gphoteles.com";
                      $mail4="reservaciones3@gphoteles.com";
                      $mail = new PHPMailer();
                      $mail->SetLanguage('en');
                      $mail->IsSMTP(); // send via SMTP
                      $mail->Host     = $mailHost;  // SMTP servers
                      $mail->SMTPAuth = true;     // turn on SMTP authentication
                      $mail->Username = $mailUsername;    // SMTP username
                      $mail->Password = $mailPassword;  // SMTP password
                      $mail->From     = $mailFromcuenta;
                      $mail->FromName = $mailFromName;
                      $mail->AddAddress($emailinterno); 
                      $mail->AddAddress($mimail); 
                      $mail->AddAddress($mail1); 
                      $mail->AddAddress($mail2); 
                      $mail->AddAddress($mail3); 
                      $mail->AddAddress($mail4); 
                      $mail->AddAddress($payer_email); 
                      $mail->WordWrap = 50;     // set word wrap
                      $mail->IsHTML(true);     // send as HTML
                      $mail->Subject  =  $mailSubject;
                      $mail->Body    =  $mensaje;
                      if(!$mail->Send()){

                        $message = "\nError al enviar el correo: ".$mail->ErrorInfo."\n";
                        file_put_contents ($filename,$message ,FILE_APPEND); 

                      }else{
                        $message = "\nEl correo se envió correctamente.\n";
                        file_put_contents ($filename,$message ,FILE_APPEND); 
                      }
                  }    
              }
            }//Exito al actualizar el estatus de la reserva.
            else{

              $message = "\nError al actualizar la reserva ".$myPost['item_number']." en el panel.\n";
              file_put_contents ($filename,$message ,FILE_APPEND); 
            }

          } catch (Exception $e) {
            
            $error = "\nError con la consulta \n".$e;
            file_put_contents ($filename,$error ,FILE_APPEND); 
          }

        } //Se verifica que el pago se haya completado

      }// Exito al insertar en paypalpagos
      else{
        $message = "\nError al insertar en paypalpagos con el Id: ".$item_number."\n";
        file_put_contents ($filename,$message ,FILE_APPEND);
      }

    } catch (Exception $e) {
       $error = "\nError con la consulta \n".$e;
      file_put_contents ($filename,$error ,FILE_APPEND); 
    }

  }//Se comprueba que el correo sea el correcto
}//Se verifica que la respuesta de paypal sea satisfactoria
else{
  $message = "\nPaypal no verifico la respuesta.\n";
  file_put_contents ($filename,$message ,FILE_APPEND); 
}
curl_close($ch);

?>