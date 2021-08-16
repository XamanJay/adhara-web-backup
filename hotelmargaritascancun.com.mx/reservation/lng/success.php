<?php 

	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/hotel.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/cliente.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/controllers/hotelController.php");
	require(realpath($_SERVER['DOCUMENT_ROOT'])."/reservation/class.phpmailer.php");
	session_start();

	/*Datos del cliente */
	if (isset($_SESSION['cliente'])) {
		# code...
		$nombre = $_SESSION['cliente']->getNombre();
		$apellidos = $_SESSION['cliente']->getApellidoPaterno()." ".$_SESSION['cliente']->getApellidoMaterno();
		$email = $_SESSION['cliente']->getEmail();
		$ciudad = $_SESSION['cliente'] ->getCiudad();
		$estado = $_SESSION['cliente']->getEstado();
		$pais = $_SESSION['cliente']->getPais();
		$telefono = $_SESSION['cliente']->getTelefono();
		$isClub = TRUE;
	}
	else{

		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellido'];
		$email = $_POST['email'];
		$ciudad = $_POST['ciudad'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];
		$telefono = $_POST['telefono'];
		$isClub = FALSE;
	}

	$nombreHotel= "Margaritas Cancun";
	/* Datos de la reserva */

	if (isset($_POST['dateTo']) && isset($_POST['dateFrom']) && isset($_POST['idRoom']) && isset($_POST['rooms']) && isset($_POST['adults']) && isset($_POST['kids']) && isset($_POST['metodoPago'])) {
		# code...
		$dateTo = $_POST['dateTo'];
		$dateFrom = $_POST['dateFrom'];
		$idRoom = $_POST['idRoom'];
		$rooms = $_POST['rooms'];
		$arrayAdults = json_decode($_POST['adults']);
		$arrayKids = json_decode($_POST['kids']);
		$metodoPago = $_POST['metodoPago'];

		if (isset($_POST['comentarios'])) {
			$comentarios = $_POST['comentarios'];
		}
		else
			$comentarios = "ninguno";

	}
	$idHotel = 2; //id del Hotel Margaritas Cancún
	/* Fechas version en español */
	$hotelController = new hotelController();

	$semanaStart = $hotelController->convertDay($dateTo,$_COOKIE['lang']);
	$mesStart = $hotelController->getMonth($dateTo,$_COOKIE['lang']);
	$diaStart = $hotelController->getNumberDay($dateTo);
	$añoStart = $hotelController->getYear($dateTo);

	$noches = $hotelController->getNights($dateTo,$dateFrom);
	//$dateDiff = date_diff(date_create($dateTo), date_create($dateFrom));
	//echo $dateDiff;
	$season = $hotelController->getSingleSeason($dateFrom,$idHotel,$idRoom);
	$cuarto = $hotelController->getRoom($season,$dateTo,$dateFrom,$idHotel);
	$pagoDestino = $hotelController->getPagoEnDestino($cuarto);

	$service = $hotelController->type_service($_POST['service_name'],$_POST['isActive']);
	$promocion = $hotelController->getPromocion($dateTo);

	$n_rooms = 0;
	$total = 0;
	$promo = 0;
	$pricePromo = 0;
	$price = 0;
	if($_COOKIE['lang'] == "es"){

		$currency = "MXN";
	}
	else{
		$currency = "USD";
	}
	$estatus = 1;
	$pagoDestino = 2;
	$servicio = "hotel";
	$isDeleted = FALSE;

	$categoria = $hotelController->getCategoria($cuarto->getCategoria());

	while ($n_rooms < $rooms) {
		$tarifas = $hotelController->getTarifas($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);
		$tarifasPromo = $hotelController->getTarifasPromo($cuarto,$arrayAdults[$n_rooms],$arrayKids[$n_rooms]);

		foreach ($tarifas as $tarifa) {
			$total = $total+$tarifa;
		}
		if ($tarifasPromo==0) {//En caso de que no tenga promocion
			
		}else{//En caso de que tenga promocion
			foreach ($tarifasPromo as $tarifaPromo) {
				$promo = $promo +$tarifaPromo;
			}
		}
		$n_rooms++;
	}

	if($_COOKIE['lang'] == "en"){

		if($promocion != 0){

			$div = $promocion/100;

			$plus = $total*$div;
			$price = $total - $plus;

			$plus_promo = $promo*$div;
			$pricePromo = $promo - $plus_promo;

			$clubestrella = $hotelController->getPrecioClubestrella($price);

		}else{

			$price = $total;
			$pricePromo = $promo;
			$clubestrella = $hotelController->getPrecioClubestrella($price);
		}

	}
	else{

		if($promocion != 0){

			$div = $promocion/100;

			$plus = $hotelController->getPesos($total)*$div;
			$price = $hotelController->getPesos($total) - $plus;

			$plus_promo = $hotelController->getPesos($promo)*$div;
			$pricePromo = $hotelController->getPesos($promo) - $plus_promo;

			$clubestrella = $hotelController->getPrecioClubestrella($price);

		}else{

			$price = $hotelController->getPesos($total);
			$pricePromo = $hotelController->getPesos($promo);
			$clubestrella = $hotelController->getPrecioClubestrella($price);
		}
	}

	//información reserva
	$detalles = "<strong>Hotel:</strong>".$nombreHotel."<br />";
	$detalles = $detalles."<strong>Tipo de habitación: </strong>".$categoria."<br>";
	$detalles = $detalles."<strong>Plan de alimentos: </strong>".$cuarto->getNombre()."<br>";
	$detalles = $detalles."<strong>Fecha de llegada: </strong>". $dateTo."<br>";
	$detalles = $detalles."<strong>Fecha de salida: </strong>". $dateFrom."<br>";
	$detalles = $detalles."<strong>Hab. 1:</strong> ".$arrayAdults[0]." Adultos, ".$arrayKids[0]." Menores";
	if($rooms == 2){ // si son 2 cuartos
		$detalles = $detalles."\n<strong>Hab. 2:</strong> ".$arrayAdults[1]." Adultos, ".$arrayKids[1]." Menores";
	}   
	if($rooms == 3){ // si son 3 cuartos
		$detalles = $detalles."\n<strong>Hab. 2:</strong> ".$arrayAdults[1]." Adultos, ".$arrayKids[1]." Menores";
		$detalles = $detalles."\n<strong>Hab. 3:</strong> ".$arrayAdults[2]." Adultos, ".$arrayKids[2]." Menores";
	}  

	switch ($metodoPago) {
		case 'pagoSeguro':
			
			//create array of data to be posted
			$title = 'PHP VPC 3 Party Super Transacion';
			$virtualPaymentClientURL = 'https://banamex.dialectpayments.com/vpcpay';
			$vpc_Version = "1";
			$vpc_Command = 'pay';
			$vpc_AccessCode = '7A3598AB';
			$vpc_MerchTxnRef = '';//numero de id de la consulta de sql
			$vpc_Merchant = '1021053';
			$vpc_OrderInfo = 0;//numero de id de la consulta de sql
			if (isset($_SESSION['cliente'])) {
				# code...
				if ($promo !=0) {
							
					$vpc_Amount = round($pricePromo * 100);

				}
				else if($_SESSION['cliente']->getNumeroSocio() != 0){

					$vpc_Amount = round($clubestrella * 100);
				}
			}
			else{
				
				$vpc_Amount = round($price * 100);
			}
			$vpc_ReturnURL = 'https://hotelmargaritascancun.com.mx/secure/banamex/index.php';
			$vpc_Locale = 'es_MX';
			if($_COOKIE['lang'] == "en"){
				$vpc_Currency = "USD";
			}
			else{

				$vpc_Currency = 'MXN';
			}
			$vpc_CustomPaymentPlanPlanId = '';
			$unicPay = $vpc_Amount/100; 
			$costoProv = $unicPay*0.942;

			$checkAllotment = $hotelController->checkAllotment($idRoom);
			$setReserva = 0;
			//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
			if($checkAllotment == 1){

				$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$unicPay,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
				$allotment = $hotelController->updateAllotment($idRoom);
				if($allotment == 0){

					$mensaje = '
						<!DOCTYPE html>
						<html>
							<head>
							<meta charset="utf-8">
								<title></title>
							</head>
							<body>
								<table width="600">
						          <tr>
						            <td>
						            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
						            </td>
						          </tr>
						          <tr>
						            <td>
						            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
						            		<b>El cuarto: '.$cuarto->getNombre().'</b></br>
						            		<p>Se quedó sin Allotment</p><br>
						                </div>
						            </td>
						          </tr>
						          <tr>
						            <td colspan="2" height="40" style="background:#000" >
						                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
						            </td>
						          </tr>
						        </table>
							</body>
						</html>';
						$mailenviado = 0;
						$mailHost = "mail.oktravel.mx"; //cambiar host
						$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
						$mailUsername = "info@oktravel.mx";  	// SMTP username
						$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
						$mailSubject  =  "Allotment Margaritas";  // mensaje Subject
						$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
						$mail1="revenue@gphoteles.com";
						$mail2="programacionweb@gphoteles.com";
						$mail = new PHPMailer();
						$mail->SetLanguage('en');
						$mail->IsSMTP(); // send via SMTP
						$mail->Host     = $mailHost; 	// SMTP servers
						$mail->SMTPAuth = true;    	// turn on SMTP authentication
						$mail->Username = $mailUsername;  	// SMTP username
						$mail->Password = $mailPassword;  // SMTP password
						$mail->From     = $mailFromcuenta;
						$mail->FromName = $mailFromName;
						$mail->AddAddress($mail1);
						$mail->AddAddress($mail2);
						$mail->WordWrap = 50; // set word wrap
						$mail->IsHTML(true);       // send as HTML
						$mail->Subject  =  $mailSubject;
						$mail->Body    =  $mensaje;
						if(!$mail->Send()){
					    	//echo "Message was not sent <p>";
					        //echo "Mailer Error: " . $mail->ErrorInfo;
					        $mailenviado=0;
					    }else{

					    	$filename = "emailsSend.txt";
							$textInicio = "\n\n--------------- Se envió el email al cliente de la reserva ".$setReserva." PayPal ".date("Y/m/d")."--------------\n\n";
							file_put_contents ($filename,$textInicio ,FILE_APPEND);
					    }
				}

				$vpc_OrderInfo= $setReserva;
				$vpc_MerchTxnRef = "REF".$vpc_OrderInfo;
				?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<?php include "meta.php"; ?>
					</head>
					<body>
						<div class="wrapper">

							<div id="loader-wrapper">  
								<div id="loader">
									<p>LOADING</p>
									<div class="circ-one"></div><div class="circ-two"></div>
								</div>
								<div class="loader-section section-left"></div>
								<div class="loader-section section-right"></div>

							</div>
						</div>
						<form name="forma" id="forma" action="https://hotelmargaritascancun.com.mx/secure/banamex/PHP_VPC_3Party_Super_Order_DO.php" method="post" accept-charset="UTF-8">
							<input type="hidden" class="invisible" name="Title" value = "<?php echo $title; ?>">
							<input type="hidden" class="invisible" name="virtualPaymentClientURL" value="<?php echo $virtualPaymentClientURL; ?>"/>
							<input type="hidden" class="invisible" name="vpc_Version" value="<?php echo $vpc_Version; ?>" maxlength="8"/>
							<input type="hidden" class="invisible" name="vpc_Command" value="<?php echo $vpc_Command; ?>" maxlength="16"/>
							<input type="hidden" class="invisible" name="vpc_AccessCode" value="<?php echo $vpc_AccessCode ?>" maxlength="8"/>
							<input type="hidden" class="invisible" name="vpc_MerchTxnRef" value="<?php echo $vpc_MerchTxnRef;?>" maxlength="40"/>
							<input type="hidden" class="invisible" name="vpc_Merchant" value="<?php echo $vpc_Merchant; ?>" maxlength="16"/>
							<input type="hidden" class="invisible" name="vpc_OrderInfo" value="<?php echo $vpc_OrderInfo;?>" maxlength="34"/>
							<input type="hidden" class="invisible" name="vpc_Amount" value="<?php echo $vpc_Amount;?>" maxlength="10"/>
							<input type="hidden" class="invisible" name="vpc_ReturnURL" value="<?php echo $vpc_ReturnURL; ?>" maxlength="250"/>
							<input type="hidden" class="invisible" name="vpc_Locale" value="<?php echo $vpc_Locale;?>" />
							<input type="hidden" class="invisible" name="vpc_Currency" value="<?php echo $vpc_Currency; ?>" />
							<input type="hidden" class="invisible" name="vpc_CustomPaymentPlanPlanId" value="" maxlength="16" />
						</form>
						<div class="d-flex justify-content-center align-items-center" id="metodoPago">
							<img src="time.gif" alt="Loading" id="status" style="margin-top: 20px;width: 400px; height: 300px;">
						</div>
						<script type="text/javascript" src="../../js/jquery-3.2.1.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
						<script src="../../js/bootstrap.min.js"></script>
						<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
						<script type="text/javascript">
						// makes sure the whole site is loaded
							$(document).ready(function() {
							  setTimeout(function() {
							    $('.wrapper').addClass('loaded');
							    
							  }, 3000);
							});

							jQuery(function(){

							  $(window).load(function(){
							  
							  	$('.wrapper').removeClass('preload');
							  
							  });

							});
							document.getElementById("forma").submit();
						</script>
						
					</body>
					</html>
				<?php
			}
			else{

				header( "Location: /overBooking.php?r=".$idRoom."" );
			}


		break;//Termina banamex pasarela

		case 'paypal':
		

			$item_name = $nombreHotel." - ";
			$item_name = $item_name."Hab. 1: ".$arrayAdults[0]." Ad,".$arrayKids[0]." Ni";
			if($rooms == 2){ // si son 2 cuartos
				$item_name = $item_name." - Hab. 2: ".$arrayAdults[1]." Ad,".$arrayKids[1]." Ni";
			}   
			if($rooms == 3){ // si son 3 cuartos
				$item_name = $item_name." - Hab. 3: ".$arrayAdults[2]." Ad,".$arrayKids[2]." Ni";
			}  
			$item_name = $item_name." Desde: ". $dateTo;
			$item_name = $item_name." Hasta: ". $dateFrom;
			if (isset($_SESSION['cliente'])) {
				# code...
				if ($promo !=0) {
							
					$amount = $pricePromo;

				}
				else if($_SESSION['cliente']->getNumeroSocio() != 0){

					$amount = $clubestrella;
				}
			}
			else{
				
				$amount = $price;
			}

			$checkAllotment = $hotelController->checkAllotment($idRoom);
			$setReserva = 0;
			$costoProv = ($currency == "MXN") ? (($amount*0.9188)-4.64) : (($amount*0.913)-4.64);
			//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
			if($checkAllotment == 1){

				$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$amount,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
				$allotment = $hotelController->updateAllotment($idRoom);
				if($allotment == 0){

					$mensaje = '
						<!DOCTYPE html>
						<html>
							<head>
							<meta charset="utf-8">
								<title></title>
							</head>
							<body>
								<table width="600">
						          <tr>
						            <td>
						            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
						            </td>
						          </tr>
						          <tr>
						            <td>
						            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
						            		<b>El cuarto: '.$cuarto->getNombre().'</b></br>
						            		<p>Se quedó sin Allotment</p><br>
						                </div>
						            </td>
						          </tr>
						          <tr>
						            <td colspan="2" height="40" style="background:#000" >
						                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
						            </td>
						          </tr>
						        </table>
							</body>
						</html>';
						$mailenviado = 0;
						$mailHost = "mail.oktravel.mx"; //cambiar host
						$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
						$mailUsername = "info@oktravel.mx";  	// SMTP username
						$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
						$mailSubject  =  "Allotment Margaritas";  // mensaje Subject
						$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
						$mail1="revenue@gphoteles.com";
						$mail2="programacionweb@gphoteles.com";
						$mail = new PHPMailer();
						$mail->SetLanguage('en');
						$mail->IsSMTP(); // send via SMTP
						$mail->Host     = $mailHost; 	// SMTP servers
						$mail->SMTPAuth = true;    	// turn on SMTP authentication
						$mail->Username = $mailUsername;  	// SMTP username
						$mail->Password = $mailPassword;  // SMTP password
						$mail->From     = $mailFromcuenta;
						$mail->FromName = $mailFromName;
						$mail->AddAddress($mail1);
						$mail->AddAddress($mail2);
						$mail->WordWrap = 50; // set word wrap
						$mail->IsHTML(true);       // send as HTML
						$mail->Subject  =  $mailSubject;
						$mail->Body    =  $mensaje;
						if(!$mail->Send()){
					    	//echo "Message was not sent <p>";
					        //echo "Mailer Error: " . $mail->ErrorInfo;
					        $mailenviado=0;
					    }else{

					    	$filename = "emailsSend.txt";
							$textInicio = "\n\n--------------- Se envió el email al cliente de la reserva ".$setReserva." PayPal ".date("Y/m/d")."--------------\n\n";
							file_put_contents ($filename,$textInicio ,FILE_APPEND);
					    }
				}

				$cmd = "_xclick";
				$business = "joseluis@oktravel.mx";
				$item_number = $setReserva;//dato arrojado por la consulta sql
				if($_COOKIE['lang'] == "en"){

					$currency_code = "USD";
				}
				else{
					$currency_code = "MXN";	
				}
				$return = "https://hotelmargaritascancun.com.mx/response.php";
				$cancel_return = "https://hotelmargaritascancun.com.mx/";
				$undefined_quantity= 0;
				$receiver_email = "joseluis@oktravel.mx";
				$no_shipping = 1;
				$no_note = 1;
				$notify_url = "https://hotelmargaritascancun.com.mx/paypal/paypal.php";
				?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<?php include"meta.php"; ?>
					</head>
					<body>
						<div class="wrapper">

							<div id="loader-wrapper">  
								<div id="loader">
									<p>LOADING</p>
									<div class="circ-one"></div><div class="circ-two"></div>
								</div>
								<div class="loader-section section-left"></div>
								<div class="loader-section section-right"></div>

							</div>
						</div>
						<form name="forma" id="forma" action="https://www.paypal.com/mx/cgi-bin/webscr" method="post" accept-charset="UTF-8">
							<input type="hidden" class="invisible" name="cmd" value="<?php echo $cmd; ?>" />
				            <input type="hidden" class="invisible" name="business" value="<?php echo $business; ?>" />
				            <input type="hidden" class="invisible" name="item_name" value="<?php echo $item_name;?>" />
				            <input type="hidden" class="invisible" name="item_number" value="<?php echo $item_number;?>" />
				            <input type="hidden" class="invisible" name="amount" value="<?php echo $amount;?>" />
				            <input type="hidden" class="invisible" name="currency_code" value="<?php echo $currency_code; ?>" />
				            <input type="hidden" class="invisible" name="return" value="<?php echo $return; ?>" />
				            <input type="hidden" class="invisible" name="cancel_return" value="<?php echo $cancel_return; ?>" />
				            <input type="hidden" class="invisible" name="undefined_quantity" value="<?php echo $undefined_quantity; ?>" />
				            <input type="hidden" class="invisible" name="receiver_email" value="<?php echo $receiver_email; ?>" />
				            <input type="hidden" class="invisible" name="no_shipping" value="<?php echo $no_shipping; ?>" />
				            <input type="hidden" class="invisible" name="no_note" value="<?php echo $no_note; ?>" />
				            <input type="hidden" class="invisible" name="notify_url" value="<?php echo $notify_url; ?>">
						</form>
						<script type="text/javascript" src="../../js/jquery-3.2.1.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
						<script src="../../js/bootstrap.min.js"></script>
						<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
						<script type="text/javascript">
							// makes sure the whole site is loaded
							$(document).ready(function() {
							  setTimeout(function() {
							    $('.wrapper').addClass('loaded');
							    
							  }, 3000);
							});

							jQuery(function(){

							  $(window).load(function(){
							  
							  	$('.wrapper').removeClass('preload');
							  
							  });

							});
							document.getElementById("forma").submit();
						</script>
					</body>
					</html>
				<?php
			}
			else{

				header( "Location: /overBooking.php?r=".$idRoom."" );
			}
			
		break;

		case 'pagoBancario':	

			if (isset($_SESSION['cliente'])) {
				# code...
				if ($promo !=0) {
							
					$pagoBancario = $pricePromo;

				}
				else if($_SESSION['cliente']->getNumeroSocio() != 0){

					$pagoBancario = $clubestrella;
				}
			}
			else{
				
				$pagoBancario = $price;
			}

			$checkAllotment = $hotelController->checkAllotment($idRoom);
			$setReserva = 0;
			$costoProv = $pagoBancario*0.942;
			//echo $checkAllotment;
			//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
			if($checkAllotment == 1){

				$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$pagoBancario,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
				//echo $setReserva;
				$allotment = $hotelController->updateAllotment($idRoom);
				//echo "<br>".$allotment;
				if($allotment == 0){

					$mensaje = '
					<!DOCTYPE html>
					<html>
						<head>
						<meta charset="utf-8">
							<title></title>
						</head>
						<body>
							<table width="600">
					          <tr>
					            <td>
					            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
					            </td>
					          </tr>
					          <tr>
					            <td>
					            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
					            		<b>El cuarto: '.$cuarto->getNombre().'</b></br>
					            		<p>Se quedó sin Allotment</p><br>
					                </div>
					            </td>
					          </tr>
					          <tr>
					            <td colspan="2" height="40" style="background:#000" >
					                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
					            </td>
					          </tr>
					        </table>
						</body>
					</html>';
					$mailenviado = 0;
					$mailHost = "mail.oktravel.mx"; //cambiar host
					$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
					$mailUsername = "info@oktravel.mx";  	// SMTP username
					$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
					$mailSubject  =  "Allotment Margaritas";  // mensaje Subject
					$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
					$mail1="revenue@gphoteles.com";
					$mail2="programacionweb@gphoteles.com";
					$mail = new PHPMailer();
					$mail->SetLanguage('en');
					$mail->IsSMTP(); // send via SMTP
					$mail->Host     = $mailHost; 	// SMTP servers
					$mail->SMTPAuth = true;    	// turn on SMTP authentication
					$mail->Username = $mailUsername;  	// SMTP username
					$mail->Password = $mailPassword;  // SMTP password
					$mail->From     = $mailFromcuenta;
					$mail->FromName = $mailFromName;
					$mail->AddAddress($mail1);
					$mail->AddAddress($mail2);
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true);       // send as HTML
					$mail->Subject  =  $mailSubject;
					$mail->Body    =  $mensaje;
					if(!$mail->Send()){
				    	//echo "Message was not sent <p>";
				        //echo "Mailer Error: " . $mail->ErrorInfo;
				        $mailenviado=0;
				    }else{

				    	$filename = "emailsSend.txt";
						$textInicio = "\n\n--------------- Se envió el email al cliente de la reserva ".$setReserva." PagoBancario ".date("Y/m/d")."--------------\n\n";
						file_put_contents ($filename,$textInicio ,FILE_APPEND);
				    }
				}

				$lastservice= $setReserva;
				$mensaje = '
				<!DOCTYPE html>
				<html>
					<head>
					<meta charset="utf-8">
						<title></title>
					</head>
					<body>
						<table width="600">
				          <tr>
				            <td>
				            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
				            </td>
				          </tr>
				          <tr>
				            <td>
				            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
				            		<b>NÚMERO DE RESERVACIÓN: '.$lastservice.'</b></br>
				            		<p>Impuestos incluidos</p><br>
									<b>TOTAL A PAGAR: $'.number_format($pagoBancario, 2, '.', ',').' '.$currency.'</b></br>
									<b>Nombre: </b>'.$nombre.' '.$apellidos.'<br>
									<b>Tiene un plazo máximo de 48hrs. para realizar el deposito bancario de lo contrario su reservaci&oacute;n ser&aacute; cancelada.</b></br>
									'.$detalles.'<br><br>
									<b style="font-size:16px">Reservación Pendiente de Pago</b></br>
									
									<p>Muchas gracias por reservar con nosotros. Para poder hacer efectiva su reservaci&oacute;n es necesario hacer el depósito o transferencia por el total de la reservación.</p></br>
									
									<b>Transferencia, SPEI, Depósito en cheque en efectivo</b></br>
									
									<hr>
	                                <br><b>BANAMEX </b></br>
	                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
	                                <p>Sucursal: 7001</p>
	                                <p>Cuenta: 6366976</p>
	                                <p>CLABE: 002 691 700 163 669 765</p>
	                                <p>Referencia: Número de Reservación (ver arriba)</p>
	                                <hr>
	                                <b>SANTANDER</b></br>
	                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
	                                <p>Cuenta: 65500356884</p>
	                                <p>CLABE: 014 691 655 003 568 849</p>
	                                <p>Referencia: Número de Reservación (ver arriba)</p>
	                                <hr>
	                                <b>SANTANDER DLS</b></br>
	                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
	                                <p>Cuenta: 82500066595</p>
	                                <p>CLABE: 014 691 825 000 665 957</p>
	                                <p>Referencia: Número de Reservación (ver arriba)</p>
	                                <hr>
	                                <b><p>Importante: Es necesario enviar el comprobante de pago al correo reservaciones@gphoteles.com</p>
									<hr>
									<p>Para cualquier pregunta referente a su reservaci&oacute;n favor de contactarnos</p>
									<p>Llamada sin costo al: 01 800 711-15-31 (M&eacute;xico)</p>
									<p>Tel&eacute;fono: +52 (998) 881 65 00</p>
									<p>Fax: +52 (998) 884 83 76</p>
									<p>reservaciones@gphoteles.com</p></b>
				                </div>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="2">
				                <table>
				                    <tr>
				                        <td style="float: left;" width="100" height="75px">&nbsp;
				                            
				                        </td>
				                        <td style="float: left;" width="160">
				                            <a style=" text-decoration: none; color: #000; margin-top: 20px; display: block;" href="https://www.facebook.com/MargaritasCancun" target="_blank">
				                                <img src="https://hotelmargaritascancun.com.mx/img/mail/icon_fb.jpg" style="float: left; margin:0 auto;" height="" align="top" width="">
				                                <span style="font-size: 12px; margin-top: 8px; float: left; vertical-align:top;">HotelMargaritasCancun</span>
				                            </a>
				                        </td>
				                        <td style="float: left;" width="160">
				                            <a style=" text-decoration: none; color: #000; margin-top: 20px; display: block;" href="https://twitter.com/hotelmrgcancun" target="_blank">
				                                <img src="https://hotelmargaritascancun.com.mx/img/mail/icon_tw.jpg" style="float: left; margin:0 auto;" height="" align="top" width="">
				                                <span style="font-size: 12px;  margin-top: 8px; float: left; vertical-align:top;">@MargaritasCancun</span>
				                            </a>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="2" height="40" style="background:#000" >
				                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
				            </td>
				          </tr>
				        </table>
					</body>
				</html>';
				$mailenviado = 0;
				$mailHost = "mail.oktravel.mx"; //cambiar host
				$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
				$mailUsername = "info@oktravel.mx";  	// SMTP username
				$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
				$mailSubject  =  "Reservacion Margaritas Cancún";  // mensaje Subject
				$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
				$to = $email;
				$mail1="reservaciones@gphoteles.com";
				$mail2="asistente1.reservaciones@gphoteles.com";
			    $mail3="gerenteenturno@gphoteles.com";
			    $mail4="reservaciones3@gphoteles.com";
				
				$mail = new PHPMailer();
				$mail->SetLanguage('en');
				$mail->IsSMTP(); // send via SMTP
				$mail->Host     = $mailHost; 	// SMTP servers
				$mail->SMTPAuth = true;    	// turn on SMTP authentication
				$mail->Username = $mailUsername;  	// SMTP username
				$mail->Password = $mailPassword;  // SMTP password
				$mail->From     = $mailFromcuenta;
				$mail->FromName = $mailFromName;
				
				$mail->AddAddress($to);
				$mail->AddAddress($mail1);
				$mail->AddAddress($mail2);
				$mail->AddAddress($mail3);
				$mail->AddAddress($mail4);
				
				$mail->WordWrap = 50; // set word wrap
				$mail->IsHTML(true);       // send as HTML
				$mail->Subject  =  $mailSubject;
				$mail->Body    =  $mensaje;
				if(!$mail->Send()){
			    	//echo "Message was not sent <p>";
			        //echo "Mailer Error: " . $mail->ErrorInfo;
			        $mailenviado=0;
			    }else{

			    	header( "Location: /response.php?r=".$lastservice."" );
			    }
			}// Fin de la comprobacion de que tengamos cuartos
			else{

				header( "Location: /overBooking.php?r=".$idRoom."" );
			}
			//echo $setReserva;
			
		break;

		case 'pagoHotel':
			

			if (isset($_SESSION['cliente'])) {
				# code...
				if ($promo !=0) {
							
					$pagoHotel = $pricePromo;

				}
				else if($_SESSION['cliente']->getNumeroSocio() != 0){
					$pagoHotel = $clubestrella;
				}
			}
			else{
				
				$pagoHotel = $price;
			}


			$checkAllotment = $hotelController->checkAllotment($idRoom);
			$setReserva = 0;
			$costoProv = $pagoHotel*0.9594;
			//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
			if($checkAllotment == 1){

				$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$pagoHotel,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
				$allotment = $hotelController->updateAllotment($idRoom);
				if($allotment == 0){

					$mensaje = '
					<!DOCTYPE html>
					<html>
						<head>
						<meta charset="utf-8">
							<title></title>
						</head>
						<body>
							<table width="600">
					          <tr>
					            <td>
					            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
					            </td>
					          </tr>
					          <tr>
					            <td>
					            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
					            		<b>El cuarto: '.$cuarto->getNombre().'</b></br>
					            		<p>Se quedó sin Allotment</p><br>
					                </div>
					            </td>
					          </tr>
					          <tr>
					            <td colspan="2" height="40" style="background:#000" >
					                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
					            </td>
					          </tr>
					        </table>
						</body>
					</html>';
					$mailenviado = 0;
					$mailHost = "mail.oktravel.mx"; //cambiar host
					$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
					$mailUsername = "info@oktravel.mx";  	// SMTP username
					$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
					$mailSubject  =  "Allotment Margaritas";  // mensaje Subject
					$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
					$mail1="revenue@gphoteles.com";
					$mail2="programacionweb@gphoteles.com";
					$mail = new PHPMailer();
					$mail->SetLanguage('en');
					$mail->IsSMTP(); // send via SMTP
					$mail->Host     = $mailHost; 	// SMTP servers
					$mail->SMTPAuth = true;    	// turn on SMTP authentication
					$mail->Username = $mailUsername;  	// SMTP username
					$mail->Password = $mailPassword;  // SMTP password
					$mail->From     = $mailFromcuenta;
					$mail->FromName = $mailFromName;
					$mail->AddAddress($mail1);
					$mail->AddAddress($mail2);
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true);       // send as HTML
					$mail->Subject  =  $mailSubject;
					$mail->Body    =  $mensaje;
					if(!$mail->Send()){
				    	//echo "Message was not sent <p>";
				        //echo "Mailer Error: " . $mail->ErrorInfo;
				        $mailenviado=0;
				    }else{

				    	$filename = "emailsSend.txt";
						$textInicio = "\n\n--------------- Se envió el email al cliente de la reserva ".$setReserva." PagoDestino ".date("Y/m/d")."--------------\n\n";
						file_put_contents ($filename,$textInicio ,FILE_APPEND);
				    }
				    
				}
				$lastservice= $setReserva;
			    $mensaje = '<!DOCTYPE html>
				<html>
					<head>
					<meta charset="utf-8">
						<title></title>
					</head>
					<body>
						<table width="600">
				          <tr>
				            <td>
				            	<img src="https://hotelmargaritascancun.com.mx/img/mail/header.jpg" width="600">
				            </td>
				          </tr>
				          <tr>
				            <td>
				            	<div style="width:80%; min-height:150px; margin:20px auto 20px; ">
				            		N&Uacute;MERO DE RESERVACI&Oacute;N: '.$lastservice.'<br>
				            		TOTAL A PAGAR: $'.number_format($pagoHotel, 2, '.', ',').' '.$currency.'<br> 
				            		Impuestos incluidos<br><br>
				            		<b>Nombre: </b>'.$nombre.' '.$apellidos.'<br>
				            		'.$detalles.'<br>
			                        <b>Reservaci&oacute;n (pago a la llegada)</b><br><br>
			                        Muchas gracias por reservar con nosotros. Por favor imprima este correo y tra&iacute;galo con usted junto con una identificaci&oacute;n v&aacute;lida con fotograf&iacute;a. Es necesario pagar la totalidad de la reservaci&oacute;n a su llegada.<br><br>
			                        Para cualquier pregunta referente a su reservaci&oacute;n favor de contactarnos.<br>
			                        Llamada sin costo al: 01 800 711-15-31 (M&eacute;xico)<br>
			                        Tel&eacute;fono: +52 (998) 8881 65 00<br>
			                        Fax: +52 (998) 884 83 76<br>
				                </div>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="2">
				                <table>
				                    <tr>
				                        <td style="float: left;" width="100" height="75px">&nbsp;
				                            
				                        </td>
				                        <td style="float: left;" width="160">
				                            <a style=" text-decoration: none; color: #000; margin-top: 20px; display: block;" href="https://www.facebook.com/MargaritasCancun" target="_blank">
				                                <img src="https://hotelmargaritascancun.com.mx/img/mail/icon_fb.jpg" style="float: left; margin:0 auto;" height="" align="top" width="">
				                                <span style="font-size: 12px; margin-top: 8px; float: left; vertical-align:top;">HotelMargaritasCancun</span>
				                            </a>
				                        </td>
				                        <td style="float: left;" width="160">
				                            <a style=" text-decoration: none; color: #000; margin-top: 20px; display: block;" href="https://twitter.com/hotelmrgcancun" target="_blank">
				                                <img src="https://hotelmargaritascancun.com.mx/img/mail/icon_tw.jpg" style="float: left; margin:0 auto;" height="" align="top" width="">
				                                <span style="font-size: 12px;  margin-top: 8px; float: left; vertical-align:top;">@MargaritasCancun</span>
				                            </a>
				                        </td>
				                    </tr>
				                </table>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="2" height="40" style="background:#000" >
				                <p style="text-align: center; height:20px; color: #ffffff; font-size: 12px; width:100%; background:#000000; margin:0px;">Margaritas Cancun, Copyright 2016</p>
				            </td>
				          </tr>
				        </table>
					</body>
				</html>';
				$mailHost = "mail.oktravel.mx"; //cambiar host
				$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
				$mailUsername = "info@oktravel.mx";  	// SMTP username
				$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
				$mailSubject  =  "Reservacion Margaritas";  // mensaje Subject
				$mailFromName = "Hotel Margaritas Cancun"; // Nombre del remitente
				
				$to = $email;
				$mail1="reservaciones@gphoteles.com ";
				$mail2="asistente1.reservaciones@gphoteles.com ";
				$mail4="reservaciones3@gphoteles.com";
				
				$mail = new PHPMailer();
				$mail->SetLanguage('en');
				$mail->IsSMTP(); // send via SMTP
				$mail->Host     = $mailHost; 	// SMTP servers
				$mail->SMTPAuth = true;    	// turn on SMTP authentication
				$mail->Username = $mailUsername;  	// SMTP username
				$mail->Password = $mailPassword;  // SMTP password
				$mail->From     = $mailFromcuenta;
				$mail->FromName = $mailFromName;
		
				$mail->AddAddress($to);
				$mail->AddAddress($mail1);
				$mail->AddAddress($mail2);
				$mail->AddAddress($mail4);
				
				$mail->WordWrap = 50; // set word wrap
				$mail->IsHTML(true);       // send as HTML
				$mail->Subject  =  $mailSubject;
				$mail->Body    =  $mensaje;
				if(!$mail->Send()){
			    	echo "Message was not sent <p>";
			        echo "Mailer Error: " . $mail->ErrorInfo;
			    }else{

				    header( "Location: /response.php?r=".$lastservice."" );
			    }
			}
			else{

				header( "Location: /overBooking.php?r=".$idRoom."" );
			}
		    
		break;
	}//Fin del switch	
?>