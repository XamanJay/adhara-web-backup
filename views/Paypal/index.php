<?php 

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
                  
                  $query = "SELECT hotel,dateFrom,dateTo,detalles,idRoom FROM reservations WHERE id =?;";
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

                      $emailController->paypalConfirm($filename,$item_number,$ciudad,$pais,$email,$total,$detalles,$row2['idRoom']);

                      //Se actualiza el allotment
                      $allotment = $hotelController->updateAllotment($row2['idRoom']);
                      //Se envia el email de que se acabaron los cuartos
                      if($allotment == 0)
                        $emailController->allotmentOut($cuarto->getNombre(),$setReserva);
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