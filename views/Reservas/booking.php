<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Banamex-response Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="/css/booking.css">

</head>
<body style="background-image: url('/img/background.png');">

	<?php include "lang/languaje.php"; ?>	

	<div id="general">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="header_adhara" style="height: 60px;">
		  <div style="width: 1340px; display: block;margin: 0px auto;">
		    <img src="/img/logos/adhara_logo.png" alt="Hotel Adhara Cancun" id="logo">
		  </div>
		</nav>
			
		<div  id="box-content" class="d-flex align-items-center">
			<div class="advertise">	
				<h3 style="margin-top: 50px;margin-bottom: 25px;">¡ Gracias por Reservar con nosotros!</h3>
				<h5 style="margin-bottom: 25px;">Espere mientras es redirigido a su metodo de pago u confirmación.</h5>
				<img src="/img/loading.gif" alt="Loading..." style="display:block;margin:0px auto;">
			</div>
				
			<?php 	
				switch ($metodoPago) {
			
					case 'pagoSeguro':
			
						$costoProv = $price*0.942;
						$checkAllotment = $hotelController->checkAllotment($idRoom);
						$setReserva = 0;
						//print_r($detalles);

						//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
						if($checkAllotment){
							//Se manda registrar la reserva con estatus pendiente
							$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$price,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);


							/*--------------- Empieza integracion con Santader -----------------*/

							/*echo "here";*/

							$invoice = "Hotel Adhara Cancun".$setReserva;


							$xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>
							<P>
								<business>
									<id_company>".$keys[0]['Password']."</id_company>
									<id_branch>".$keys[1]['Password']."</id_branch>
									<user>".$keys[2]['Password']."</user>
									<pwd>".$keys[3]['Password']."</pwd>
								</business>
								<url>
									<reference>".$invoice."</reference>
									<amount>".$price."</amount>
									<moneda>".$currency."</moneda>
									<canal>W</canal>
									<omitir_notif_default>1</omitir_notif_default>
									<st_correo>1</st_correo>
									<mail_cliente>".$email."</mail_cliente>
									<datos_adicionales>
										<data id='1' display='true'>
											<label>Nombre</label>
											<value>".$nombre." ".$apellidos."</value>
										</data>
									</datos_adicionales>
								</url>
							</P>";

							$old_xml = $xml;

							if(!file_exists("raw_xml.txt")){
								$file = fopen("raw_xml.txt", "w");
								fwrite($file, "---- Inicio de los XML armados para emviar a Santander ---- \n\n" . PHP_EOL);
								fclose($file);
							}

									

							$file = fopen("raw_xml.txt", "a");
							fwrite($file, "\n\n-------- Fecha: ".date("Y-m-d H:i:s")."-------------\n".$old_xml ."\n\n". PHP_EOL);
							fclose($file);
							
							$key= $keys[4]['Password'];

							$key_commerce = $keys[5]['Password'];
							$encrypted_xml = $newAes->encriptar($xml, $key);

							if(!file_exists("xml_encriptado.txt")){
								$file = fopen("xml_encriptado.txt", "w");
								fwrite($file, "---- Inicio de log ----\n\n" . PHP_EOL);
								fwrite($file, $encrypted_xml . PHP_EOL);
								fclose($file);
							}

							$file = fopen("xml_encriptado.txt", "a");
							fwrite($file, "\n\n Xml encriptado enviado a Santander \n ------------Fecha: ".date("Y-m-d H:i:s")."-------------\n".$encrypted_xml ."\n\n". PHP_EOL);
							fclose($file);
							
							$xml = "<pgs><data0>".$key_commerce."</data0><data>".$encrypted_xml."</data></pgs>";
							$encode = urlencode($xml);
							$post_str = "xml=".$encode;
							$tod = date("Y-m-d H:i:s");
						

							try {
								
								
								$db = new db();
								$conn = $db->connection();
								$query = "INSERT INTO xml_enviados(xml,xml_encripted,updated_at) VALUES ( ?,?,?);";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(1,$old_xml);
								$stmt->bindParam(2,$post_str);
								$stmt->bindParam(3,$tod);
								$stmt->execute();
								$count = $stmt->rowCount();
								if($count > 0){

									/*print_r($xml);*/
									/* POST a URL de pruebas */

									$URL_produccion = "https://bc.mitec.com.mx/p/gen";
									$URL_pruebas = "https://qa5.mitec.com.mx/p/gen";

									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => $URL_produccion,
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "POST",
										CURLOPT_POSTFIELDS => $post_str,
										CURLOPT_HTTPHEADER => array(
											"Cache-Control: no-cache",
											"Content-Type: application/x-www-form-urlencoded",
										),
									));

									$output = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);

									if ($err)
									{
										echo "cURL Error #:" . $err;
									}
									else
									{


										if(!file_exists("url_santander.txt")){
											$file = fopen("url_santander.txt", "w");
											fwrite($file, "---- Inicio de log URLS obtenidas de Santander ---- \n\n" . PHP_EOL);
											fclose($file);
										}

										
										$descrypted_xml = $newAes->desencriptar($output, $key);
										//print_r($descrypted_xml);

										$file = fopen("url_santander.txt", "a");
										fwrite($file, "\n\n-------- Fecha: ".date("Y-m-d H:i:s")."-------------\n".$descrypted_xml ."\n\n". PHP_EOL);
										fclose($file);

										$sxe = new SimpleXMLElement($descrypted_xml);
										//print_r($sxe);
										

										if( strcmp( $sxe->cd_response, "success") == 0 )
										{
											header("Location: ".$sxe->nb_url);
										}
									}

									/*---------------- Termina integracion con Santader ----------------*/
								}
							} catch (Exception $e) {
								print_r($e);
							}
			
						}
						else
							header( "Location: /overBooking?r=".$idRoom);
			
					break;
			
					case "paypal":
			
						$item_name = $nombreHotel." - ";
						$item_name = $item_name."Hab. 1: ".$arrayAdults[0]." Ad,".$arrayKids[0]." Ni";
						if($rooms == 2)
							$item_name = $item_name." - Hab. 2: ".$arrayAdults[1]." Ad,".$arrayKids[1]." Ni";
			
						if($rooms == 3)
							$item_name = $item_name." - Hab. 3: ".$arrayAdults[2]." Ad,".$arrayKids[2]." Ni";

						/*if($idRoom == 3)
							$item_name = $item_name."Promocion Vigente: Desayuno gratis hasta para 2 personas";*/
						
						$item_name = $item_name." Desde: ". $dateTo;
						$item_name = $item_name." Hasta: ". $dateFrom;
						$checkAllotment = $hotelController->checkAllotment($idRoom);
						$setReserva = 0;
						$costoProv = ($currency == "MXN") ? (($amount*0.9188)-4.64) : (($amount*0.913)-4.64);
						if($checkAllotment == 1){
			
							$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$amount,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
			
			
							$cmd = "_xclick";
							$business = "joseluis@oktravel.mx";
							$item_number = $setReserva;//dato arrojado por la consulta sql
							$currency_code = $currency;
							$return = "https://adharacancun.com/paypal/response";
							$cancel_return = "https://adharacancun.com/";
							$undefined_quantity= 0;
							$receiver_email = "joseluis@oktravel.mx";
							$no_shipping = 1;
							$no_note = 1;
							$notify_url = "https://adharacancun.com/paypal";
						?>
							<form name="forma" id="forma" action="https://www.paypal.com/mx/cgi-bin/webscr" method="post" accept-charset="UTF-8" style="display: none;">
								<input type="hidden" class="invisible" name="cmd" value="<?php echo $cmd; ?>" readonly />
					            <input type="hidden" class="invisible" name="business" value="<?php echo $business; ?>" readonly />
					            <input type="hidden" class="invisible" name="item_name" value="<?php echo $item_name;?>" readonly />
					            <input type="hidden" class="invisible" name="item_number" value="<?php echo $item_number;?>" readonly />
					            <input type="hidden" class="invisible" name="amount" value="<?php echo $amount;?>" readonly />
					            <input type="hidden" class="invisible" name="currency_code" value="<?php echo $currency_code; ?>" readonly />
					            <input type="hidden" class="invisible" name="return" value="<?php echo $return; ?>" readonly />
					            <input type="hidden" class="invisible" name="cancel_return" value="<?php echo $cancel_return; ?>" readonly />
					            <input type="hidden" class="invisible" name="undefined_quantity" value="<?php echo $undefined_quantity; ?>" readonly />
					            <input type="hidden" class="invisible" name="receiver_email" value="<?php echo $receiver_email; ?>" readonly />
					            <input type="hidden" class="invisible" name="no_shipping" value="<?php echo $no_shipping; ?>" readonly />
					            <input type="hidden" class="invisible" name="no_note" value="<?php echo $no_note; ?>" readonly />
					            <input type="hidden" class="invisible" name="notify_url" value="<?php echo $notify_url; ?>readonly ">
							</form>
							<script type="text/javascript">
								document.getElementById("forma").submit();
							</script>
						<?php
						}
						else
							header( "Location: /overBooking?r=".$idRoom);
			
						break;
					case "deposito":
			
						$checkAllotment = $hotelController->checkAllotment($idRoom);
						$setReserva = 0;
						$costoProv = $pagoBancario*0.942;
						if($checkAllotment == 1){
							
							$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$pagoBancario,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
			
							$allotment = $hotelController->updateAllotment($idRoom);
			
							if($allotment == 0)
								$emailController->allotmentOut($room['cuarto']->getNombre(),$setReserva);
							
							$mailenviado = $emailController->emailBancario($setReserva,$pagoBancario,$currency,$nombre,$apellidos,$detalles,$email,$idRoom);
							($mailenviado == 1) ? header( "Location: /deposito?r=".$setReserva."" ) : header( "Location: /deposito/errormail?r=".$setReserva."" );
							
						}// Fin de la comprobacion de que tengamos cuartos
						else{
							header( "Location: /overBooking?r=".$idRoom );
						}
						break;
			
					case "pago_hotel":
			
						$checkAllotment = $hotelController->checkAllotment($idRoom);
						$setReserva = 0;
						$costoProv = $pagoHotel*0.9594;
						//Se vuelve hacer la comprobacion de que tenga cuartos disponibles
						if($checkAllotment == 1){
			
							$setReserva = $hotelController->setReserve($nombre,$apellidos,$email,$telefono,$pais,$ciudad,$comentarios,$isClub,$pagoHotel,$costoProv,$currency,$metodoPago,$estatus,$dateTo,$dateFrom,$idRoom,$detalles,$servicio,$nombreHotel,$isDeleted,$service);
			
							$allotment = $hotelController->updateAllotment($idRoom);
							if($allotment == 0)
								$emailController->allotmentOut($room['cuarto']->getNombre(),$setReserva);
								
						    $mailenviado = $emailController->emailHotel($setReserva,$pagoHotel,$currency,$nombre,$apellidos,$detalles,$email,$idRoom);
						    ($mailenviado == 1) ? header( "Location: /deposito?r=".$setReserva."" ) : header( "Location: /deposito/errormail.php?r=".$setReserva."" );
						}
						else{
							header( "Location: /overBooking?r=".$idRoom );
						}
						break;
					default:
						header( "Location: /error");
						break;
				}//fin del switch
			?>

				
		</div>

	</div>
	 <!-- Site Overlay 
    <div class="site-overlay"></div>-->
	<!-- Preloading -->
	<!-- <?php include "views/partial_views/_preloading.php"; ?> -->

</body>

<?php include "views/partial_views/_scripts.php"; ?>


</html>