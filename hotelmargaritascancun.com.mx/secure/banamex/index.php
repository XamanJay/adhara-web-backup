<?php

require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
require(realpath($_SERVER['DOCUMENT_ROOT'])."/reservation/class.phpmailer.php");

$raw_post_array = $_GET;
$filename = "pagosamex.txt";
$textInicio = "\n\n--------------- Respuesta de una transaccion Banamex ".date("Y/m/d")."--------------\n\n";
file_put_contents ($filename,$textInicio ,FILE_APPEND);

// Initialisation
include('VPCPaymentConnection.php');
$conn = new VPCPaymentConnection();

// This is secret for encoding the SHA256 hash
// This secret will vary from merchant to merchant
$secureSecret = "0B5058B8D639F3A30D60E4DF1981CBF1";
// Set the Secure Hash Secret used by the VPC connection object
$conn->setSecureSecret($secureSecret);

// Set the error flag to false
$errorExists = false;

// *******************************************

// START OF MAIN PROGRAM

// *******************************************

// This is the title for display
$title  = $_GET["Title"];


// Add VPC post data to the Digital Order
foreach($_GET as $key => $value) {

  file_put_contents ($filename,$key."= ".$value."\n" ,FILE_APPEND);

	if (($key!="vpc_SecureHash") && ($key != "vpc_SecureHashType") && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {

		$conn->addDigitalOrderField($key, $value);
	}
}


// Obtain a one-way hash of the Digital Order data and
// check this against what was received.
$serverSecureHash	= array_key_exists("vpc_SecureHash", $_GET)	? $_GET["vpc_SecureHash"] : "";
$secureHash = $conn->hashAllFields();
if ($secureHash==$serverSecureHash) {

	$hashValidated = "<font color='#00AA00'><strong>CORRECT</strong></font>";

} else {

	$hashValidated = "<font color='#FF0066'><strong>INVALID HASH</strong></font>";
	$errorsExist = true;
}   

/*  If there has been a merchant secret set then sort and loop through all the
    data in the Virtual Payment Client response. while we have the data, we can
    append all the fields that contain values (except the secure hash) so that
    we can create a hash and validate it against the secure hash in the Virtual
    Payment Client response.

    NOTE: If the vpc_TxnResponseCode in not a single character then
    there was a Virtual Payment Client error and we cannot accurately validate
    the incoming data from the secure hash. 

    // remove the vpc_TxnResponseCode code from the response fields as we do not 
    // want to include this field in the hash calculation

    if (secureSecret != null && secureSecret.length() > 0 && 
        (fields.get("vpc_TxnResponseCode") != null || fields.get("vpc_TxnResponseCode") != "No Value Returned")) {

        // create secure hash and append it to the hash map if it was created
        // remember if secureSecret = "" it wil not be created
        String secureHash = vpc3conn.hashAllFields(fields);
        // Validate the Secure Hash (remember MD5 hashes are not case sensitive)
        if (vpc_Txn_Secure_Hash.equalsIgnoreCase(secureHash)) {
            // Secure Hash validation succeeded, add a data field to be 
            // displayed later.
            hashValidated = "<font color='#00AA00'><strong>CORRECT</strong></font>";
        } else {

            // Secure Hash validation failed, add a data field to be
            // displayed later.
            errorExists = true;
            hashValidated = "<font color='#FF0066'><strong>INVALID HASH</strong></font>";
        }
    } else {

        // Secure Hash was not validated, 
        hashValidated = "<font color='orange'><strong>Not Calculated - No 'SECURE_SECRET' present.</strong></font>";
    }
*/

// Extract the available receipt fields from the VPC Response
// If not present then let the value be equal to 'Unknown'
// Standard Receipt Data

$Title 				= array_key_exists("Title", $_GET) 						? $_GET["Title"] 				: "";
$againLink 			= array_key_exists("AgainLink", $_GET) 					? $_GET["AgainLink"] 			: "";
$amount 			= array_key_exists("vpc_Amount", $_GET) 				? $_GET["vpc_Amount"] 			: "";
$locale 			= array_key_exists("vpc_Locale", $_GET) 				? $_GET["vpc_Locale"] 			: "";
$batchNo 			= array_key_exists("vpc_BatchNo", $_GET) 				? $_GET["vpc_BatchNo"] 			: "";
$command 			= array_key_exists("vpc_Command", $_GET) 				? $_GET["vpc_Command"] 			: "";
$message 			= array_key_exists("vpc_Message", $_GET) 				? $_GET["vpc_Message"]			: "";
$version  			= array_key_exists("vpc_Version", $_GET) 				? $_GET["vpc_Version"] 			: "";
$cardType   		= array_key_exists("vpc_Card", $_GET) 					? $_GET["vpc_Card"] 			: "";
$orderInfo 			= array_key_exists("vpc_OrderInfo", $_GET) 				? $_GET["vpc_OrderInfo"] 		: "";
$receiptNo 			= array_key_exists("vpc_ReceiptNo", $_GET) 				? $_GET["vpc_ReceiptNo"] 		: "";
$merchantID  		= array_key_exists("vpc_Merchant", $_GET) 				? $_GET["vpc_Merchant"] 		: "";
$merchTxnRef 		= array_key_exists("vpc_MerchTxnRef", $_GET) 			? $_GET["vpc_MerchTxnRef"]		: "";
$authorizeID 		= array_key_exists("vpc_AuthorizeId", $_GET) 			? $_GET["vpc_AuthorizeId"] 		: "";
$transactionNo  	= array_key_exists("vpc_TransactionNo", $_GET) 			? $_GET["vpc_TransactionNo"] 	: "";
$acqResponseCode 	= array_key_exists("vpc_AcqResponseCode", $_GET) 		? $_GET["vpc_AcqResponseCode"] 	: "";
$txnResponseCode 	= array_key_exists("vpc_TxnResponseCode", $_GET) 		? $_GET["vpc_TxnResponseCode"] 	: "";
$riskOverallResult	= array_key_exists("vpc_RiskOverallResult", $_GET) 		? $_GET["vpc_RiskOverallResult"]: "";

// Obtain the 3DS response
$vpc_3DSECI				= array_key_exists("vpc_3DSECI", $_GET) 			? $_GET["vpc_3DSECI"] : "";
$vpc_3DSXID				= array_key_exists("vpc_3DSXID", $_GET) 			? $_GET["vpc_3DSXID"] : "";
$vpc_3DSenrolled 		= array_key_exists("vpc_3DSenrolled", $_GET) 		? $_GET["vpc_3DSenrolled"] : "";
$vpc_3DSstatus 			= array_key_exists("vpc_3DSstatus", $_GET) 			? $_GET["vpc_3DSstatus"] : "";
$vpc_VerToken 			= array_key_exists("vpc_VerToken", $_GET) 			? $_GET["vpc_VerToken"] : "";
$vpc_VerType 			= array_key_exists("vpc_VerType", $_GET) 			? $_GET["vpc_VerType"] : "";
$vpc_VerStatus			= array_key_exists("vpc_VerStatus", $_GET) 			? $_GET["vpc_VerStatus"] : "";
$vpc_VerSecurityLevel	= array_key_exists("vpc_VerSecurityLevel", $_GET) 	? $_GET["vpc_VerSecurityLevel"] : "";

// CSC Receipt Data
$cscResultCode 	= array_key_exists("vpc_CSCResultCode", $_GET)  			? $_GET["vpc_CSCResultCode"] : "";
$ACQCSCRespCode = array_key_exists("vpc_AcqCSCRespCode", $_GET) 			? $_GET["vpc_AcqCSCRespCode"] : "";

// Get the descriptions behind the QSI, CSC and AVS Response Codes
// Only get the descriptions if the string returned is not equal to "No Value Returned".

$txnResponseCodeDesc = "";
$cscResultCodeDesc = "";
$avsResultCodeDesc = "";

if ($txnResponseCode != "No Value Returned") {

    $txnResponseCodeDesc = getResultDescription($txnResponseCode);
}
if ($cscResultCode != "No Value Returned") {

    $cscResultCodeDesc = getCSCResultDescription($cscResultCode);
}
$error = "";

// Show this page as an error page if error condition
if ($txnResponseCode=="7" || $txnResponseCode=="No Value Returned" || $errorExists) {

    $error = "Error ";
}
// FINISH TRANSACTION - Process the VPC Response Data
// =====================================================
// For the purposes of demonstration, we simply display the Result fields on a
// web page.
if ($txnResponseCode<>""){ 

  try {

    $fecha=date("Y-m-d");
    $db = new db();
    $conn = $db->connection();
    $query = "INSERT INTO pagosamex (merchTxnRef, merchantID, orderInfo, amount, receiptNo, acqResponseCode, authorizeID, batchNo, transactionNo, cardType, cscResultCode, fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1,$merchTxnRef);
    $stmt->bindParam(2,$merchantID);
    $stmt->bindParam(3,$orderInfo);
    $stmt->bindParam(4,$amount);
    $stmt->bindParam(5,$receiptNo);
    $stmt->bindParam(6,$acqResponseCode);
    $stmt->bindParam(7,$authorizeID);
    $stmt->bindParam(8,$batchNo);
    $stmt->bindParam(9,$transactionNo);
    $stmt->bindParam(10,$cardType);
    $stmt->bindParam(11,$cscResultCode);
    $stmt->bindParam(12,$fecha);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count > 0){

      if ($authorizeID !=""  && $error != "Error " && $authorizeID !="000000" && $message!="Rechazado"){ //actualizo reserva aceptada

        $query  = "UPDATE transactions SET estatus = 3 WHERE id = ?;";
        $stmt2 = $conn->prepare($query);
        $stmt2->bindParam(1,$orderInfo);
        $stmt2->execute();
        $count2 = $stmt2-> rowCount();
        if($count2 > 0){

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
              $stmt4->bindParam(1,$orderInfo);
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
                  $mensaje = $mensaje."<p><strong>RESERVACION EN PROCESO</strong></p>
                  <p><strong>ID: ".$orderInfo."</strong></p>";
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
                  $mailSubject  =  "Reservacion - ".$orderInfo;  // mensaje Subject
                  $mailFromName = "Margaritas Reservaciones"; // Nombre del remitente
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
                  $mail->WordWrap = 50;     // set word wrap
                  $mail->IsHTML(true);     // send as HTML
                  $mail->Subject  =  $mailSubject;
                  $mail->Body    =  $mensaje;
                  if(!$mail->Send()){

                    echo "Message was not sent <p>";
                    echo "Mailer Error: " . $mail->ErrorInfo;

                  }else{
                    $estatus = "aceptado";
                    header( "Location: /responseamex.php?order=".$orderInfo."&msg=".$message."&txn=".$txnResponseCode."&estatus=".$estatus."&id=".$authorizeID."" );
                  }
              }    
          }
        }
        else{
          echo "Error al actualizar la reserva ".$orderInfo;
        }

      }
      else{
        $estatus = "rechazado";
        header( "Location: /responseamex.php?msg=".$message."&estatus=".$estatus."" );
      }

    }
    else{
      echo "Error al dar de alta la informacion del pago de tarjeta.";
    }

  } catch (Exception $e) {

    echo "Error fatal al poner la consulta en la BD <br>".$e;
    
  }
}

?>

