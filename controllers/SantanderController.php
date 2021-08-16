<?php	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SantanderController{

	public function getReserve(){
		$response = $_REQUEST;
		include("views/Santander/response.php");
	}


	public function postReserve(){

		try

		{	
			/*if(isset($_POST)){
				$encrypted_xml = $_POST["strResponse"];
				$de = new db();
				$cx =  $de->connection();
				$qq = "INSERT INTO test_post(nombre) VALUES(?);";
				$ss = $cx->prepare($qq);
				$ss->bindParam(1,$encrypted_xml);
				$ss->execute();
				$cx = null;
			}*/

			$today = date("Y-m-d H:i:s");
			$msg =  "\n\nEstoy dentro del metodo POST reserve ".$today;
			echo "estoy dentro del metodo POST reserve ".$today."\n\n\n";
			var_dump($_POST);
			


			if(!file_exists("log_santander.txt")){
				$file = fopen("log_santander.txt", "w");
				fwrite($file, "---- Inicio de log ---- \n\n" . PHP_EOL);
				fclose($file);
			}

			if(!file_exists("santander.txt")){
				$file2 = fopen("santander.txt", "w");
				fwrite($file2, "---- Inicio de log ----" . PHP_EOL);
				fclose($file2);
			}

			

			$encrypted_xml = $_POST["strResponse"];

			$file = fopen("log_santander.txt", "a");
			fwrite($file, $msg . PHP_EOL);
			fwrite($file, $encrypted_xml . PHP_EOL);
			fclose($file);
			
			$keys = getKeys();
			$key= $keys[4]['Password']; //Semilla
			

			$aes = new AESCrypto();
			$descrypted_xml = $aes->desencriptar($encrypted_xml, $key);
			
			
			$response = new SimpleXMLElement($descrypted_xml);
			$file2 = fopen("santander.txt", "a");
			fwrite($file2, $descrypted_xml. PHP_EOL);
			fclose($file2);

			$estatus = $response->reference;
			
			
			

			$dd = new db();
			$cone = $dd->connection();
			$quer = "INSERT INTO xml_recibidos (estatus,xml_respuesta,created_at,updated_at) VALUES(?,?,?,?);";
			$stt = $cone->prepare($quer);
			$stt->bindParam(1,$estatus);
			$stt->bindParam(2,$descrypted_xml);
			$stt->bindParam(3,$today);
			$stt->bindParam(4,$today);
			$stt->execute();
			$cone = null;

			if(isset($response))
			{
				try {


					$reference = ($response->reference != "") ? $response->reference : "0000";

					$folio = ($response->foliocpagos != "") ? $response->foliocpagos : "0000";
					$auth = ($response->auth != "") ? $response->auth : "0000";
					$cd_response = ($response->cd_response != "") ? $response->cd_response : "none";
					$cd_error = ($response->cd_error != "") ? $response->cd_error : "none";
					$hora = ($response->time != "") ? $response->time : "0000";
					$fecha = ($response->date != "") ? $response->date : "0000";
					$merchant = ($response->nb_merchant != "") ? $response->nb_merchant : "0000";
					$cc_type = ($response->cc_type != "") ? $response->cc_type : "0000";
					$operation = ($response->tp_operation != "") ? $response->tp_operation : "0000";
					$number = ($response->cc_number != "") ? $response->cc_number : "0000";
					$amount = ($response->amount != "") ? $response->amount : "0000";
					$id_url = ($response->id_url != "") ? $response->id_url : "0000";
					$correo = ($response->email != "") ? $response->email : "none@gmail.com";
					$name = "generic";
					$aux = explode("Hotel Adhara Cancun",$response->reference);
					$id = $aux[1];

					
					$db = new db();
					$conn = $db->connection();
					$query = "INSERT INTO pagos_santander (reference,estatus, folio, auth, cd_response, cd_error, hora, fecha, merchant, cc_type, tp_operation, cc_number, amount,id_url,email,name,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$reference);
					$stmt->bindParam(2,$estatus);
					$stmt->bindParam(3,$folio);
					$stmt->bindParam(4,$auth);
					$stmt->bindParam(5,$cd_response);
					$stmt->bindParam(6,$cd_error);
					$stmt->bindParam(7,$hora);
					$stmt->bindParam(8,$fecha);
					$stmt->bindParam(9,$merchant);
					$stmt->bindParam(10,$cc_type);
					$stmt->bindParam(11,$operation);
					$stmt->bindParam(12,$cc_number);
					$stmt->bindParam(13,$amount);
					$stmt->bindParam(14,$id_url);
					$stmt->bindParam(15,$correo);
					$stmt->bindParam(16,$name);
					$stmt->bindParam(17,$today);
					$stmt->bindParam(18,$today);
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0){

						if (strcmp( $response->response, "approved") == 0 ){ //actualizo reserva aceptada

							$query  = "UPDATE transactions SET estatus = 3 WHERE id = ?;"; // ESTATUS 3 ---> APROBADA
							$stmt2 = $conn->prepare($query);
							$stmt2->bindParam(1,$id);
							$stmt2->execute();
							$count2 = $stmt2-> rowCount();
						    if($count2 > 0){

								$query = "SELECT nombre,apellido,correo,ciudad,pais FROM huespedes WHERE id = ?;";
								$stmt3 = $conn->prepare($query);
								$stmt3->bindParam(1,$id);
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
									$stmt4->bindParam(1,$id);
									$stmt4->execute();
									$count4 = $stmt3->rowCount();
						            if($count4 > 0){

										$row2 = $stmt4->fetch(PDO::FETCH_ASSOC);
										$hotel       = $row2['hotel'];
										$fechatranza = $row2['dateFrom'];
										$datetranx   = $row2['dateTo'];
										$detalles    = $row2['detalles'];

										$query = "SELECT currency FROM transactions WHERE id = ?;";
										$stmt5 = $conn->prepare($query);
										$stmt5->bindParam(1,$id);
										$stmt5->execute();
										$count5 = $stmt5->rowCount();
						                if($count5 > 0){

						                  	$row = $stmt5->fetch(PDO::FETCH_ASSOC);
						                  	$currency = $row['currency'];

											//Se actualiza el allotment
											$hotelController = new hotelController();
											$emailController = new emailController();
											$allotment = $hotelController->updateAllotment($row['idRoom']);
											//Se envia el email de que se acabaron los cuartos
											if($allotment == 0)
												$emailController->allotmentOut($room['cuarto']->getNombre(),$id);

					
							                $mensaje = "<!DOCTYPE html>
												<html>
												<head>
													<title>Confirmación de reserva</title>
													<meta charset='UTF-8'>
													<style>
														th,td {
															border: 2px solid #7F5986;
															color: #473934;
														}
														th, td {
															padding: .75rem;
															vertical-align: top;
														}
														table {
															border-collapse: collapse;
														}
													</style>
												</head>
												<body style='font-family: sans-serif;'>
													<div style='width: 481px;'>
														<table>
															<thead>
																<tr>
																	<th colspan='2'>
																		<img src='https://adharacancun.com/img/logos/adhara.png' style='width: 150px; text-align: center;'>
																		<div style='font-size: 24px;'>Datos de reservación</div>
																	</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><b>Hotel</b></td>
																	<td>Hotel Adhara Cancun</td>
																</tr>
																<tr>
																	<td><b>Nombre</b></td>
																	<td>".$cliente."</td>
																</tr>
																<tr>
																	<td><b>Email</b></td>
																	<td>".$email."</td>
																</tr>
																<tr>
																	<td><b>Fecha de llegada</b></td>
																	<td>".$fechatranza."</td>
																</tr>
																<tr>
																	<td><b>Fecha de salida</b></td>
																	<td>".$datetranx."</td>
																</tr>
																<tr>
																	<td><b>Detalles</b></td>
																	<td>".$detalles."</td>
																</tr>
																<tr>
																	<th colspan='2'>Datos de pago</th>
																</tr>
																<tr>
																	<td><b>Referencia</b></td>
																	<td>".$response->reference."</td>
																</tr>
																<tr>
																	<td><b>Número de autorización</b></td>
																	<td>".$response->auth."</td>
																</tr>
																<tr>
																	<td><b>Tipo de pago</b></td>
																	<td>".$response->cc_type."</td>
																</tr>
																<tr>
																	<td><b>Importe</b></td>
																	<td>".$response->amount." ".$currency."</td>
																</tr>
															</tbody>
														</table>
													</div>
												</body>
												</html>";

											$mailHost = "mail.oktravel.mx"; //cambiar host
											$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
											$mailUsername = "info@oktravel.mx";   // SMTP username
											$mailPassword = "oktravel1118";     // SMTP password
											$mailSubject  =  "Reservacion - ".$id;  // mensaje Subject
											$mailFromName = "Adhara Reservaciones"; // Nombre del remitente
											$emailinterno="reservaciones@adharacancun.com";
											$mimail="programacionweb@gphoteles.com";
											$mail1="reservaciones@gphoteles.com ";
											$mail2="asistente1.reservaciones@gphoteles.com "; 
											$mail3="gerenteenturno@gphoteles.com";
											$mail4="reservaciones3@gphoteles.com";

											$mail = new PHPMailer(true);
											//$mail->SMTPDebug = 2; 
											$mail->isSMTP();
											$mail->Host     = 'okcloud.arvixecloud.com';
											$mail->SMTPAuth = true;
											$mail->Username = 'noreply@animate.adharacancun.com';
											$mail->Password = 'Na_xJiira3$.';
											$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
											$mail->Port       = 587;  
											$mail->setFrom('noreply@animate.adharacancun.com','Adhara Reservaciones');
											$mail->AddAddress($email); 
											$mail->addBCC($mimail); 
											$mail->addBCC($mail1); 
											$mail->addBCC($mail2); 
											$mail->addBCC($mail3); 
											$mail->addBCC($mail4);
											$mail->addBCC($emailinterno);

											$mail->WordWrap = 50;     // set word wrap
											$mail->IsHTML(true);     // send as HTML
											$mail->Subject  =  $mailSubject;
											$mail->Body    =  $mensaje;
											if(!$mail->Send()){

												$query = "UPDATE reservations SET response_email = 'Error al enviar correo de confirmacion al cliente, por favor contactarlo' WHERE id = ?;";
												$stmt6 = $conn->prepare($query);
												$stmt6->bindParam(1,$id);
												$stmt6->execute();
												$conn = null;

											} 
											$conn = null;
						                }    
						            }
						        }
						    }
						    else{
						        $msg = "Error al cambiar de estatus la reserva ->aprobada - Fecha: ".date("Y-m-d H:i:s")."\n";
								$file = fopen("log_santander.txt", "a");
								fwrite($file, $msg . PHP_EOL);
								fclose($file);

								$query = "UPDATE reservations SET response_email = 'Error al enviar correo de confirmacion al cliente, por favor contactarlo' WHERE id = ?;";
								$stmt6 = $conn->prepare($query);
								$stmt6->bindParam(1,$id);
								$stmt6->execute();
								$conn = null;
						    }

						}
						else if(strcmp( $response->response, "denied") == 0){

							$query  = "UPDATE transactions SET estatus = 4 WHERE id = ?;"; //estatus 4 --> DECLINADA
							$stmt2 = $conn->prepare($query);
							$stmt2->bindParam(1,$id);
							$stmt2->execute();
							$count2 = $stmt2-> rowCount();       
			
						}

					}
				    else{

				    	$msg = "Error al dar de alta la respuesta de santander a lBD - Fecha: ".date("Y-m-d H:i:s")."\n";
						$file = fopen("log_santander.txt", "a");
						fwrite($file, $msg . PHP_EOL);
						fclose($file);
				    }

				} catch (Exception $e) {

					$msg = "Error Fatal - Fecha: ".date("Y-m-d H:i:s")."\n".$e;
					$file = fopen("log_santander.txt", "a");
					fwrite($file, $msg . PHP_EOL);
					fclose($file);	    
				}	

			}
		}
		catch (Exception $e)
		{
				$msg = json_encode($e)." - Fecha: ".date("Y-m-d H:i:s")."\n";
				$file = fopen("log_santander.txt", "a");
				fwrite($file, $msg . PHP_EOL);
				fclose($file);
		}
	}

	public function postResponse(){

		try

		{	
			/*if(isset($_POST)){
				$encrypted_xml = $_POST["strResponse"];
				$de = new db();
				$cx =  $de->connection();
				$qq = "INSERT INTO test_post(nombre) VALUES(?);";
				$ss = $cx->prepare($qq);
				$ss->bindParam(1,$encrypted_xml);
				$ss->execute();
				$cx = null;
			}*/

			$today = date("Y-m-d H:i:s");
			$msg =  "\n\nEstoy dentro del metodo POST reserve ".$today;
			echo "estoy dentro del metodo POST reserve ".$today."\n\n\n";
			var_dump($_POST);
			


			if(!file_exists("log_santander.txt")){
				$file = fopen("log_santander.txt", "w");
				fwrite($file, "---- Inicio de log ---- \n\n" . PHP_EOL);
				fclose($file);
			}

			if(!file_exists("santander.txt")){
				$file2 = fopen("santander.txt", "w");
				fwrite($file2, "---- Inicio de log ----" . PHP_EOL);
				fclose($file2);
			}

			

			$encrypted_xml = $_POST["strResponse"]."\n\n metodo response";

			$file = fopen("log_santander.txt", "a");
			fwrite($file, $msg . PHP_EOL);
			fwrite($file, $encrypted_xml . PHP_EOL);
			fclose($file);
			
			$keys = getKeys();
			$key= $keys[4]['Password']; //Semilla
			

			$aes = new AESCrypto();
			$descrypted_xml = $aes->desencriptar($encrypted_xml, $key);
			
			
			$response = new SimpleXMLElement($descrypted_xml);
			$file2 = fopen("santander.txt", "a");
			fwrite($file2, $descrypted_xml. PHP_EOL);
			fclose($file2);

			$estatus = $response->reference;
			
			
			

			$dd = new db();
			$cone = $dd->connection();
			$quer = "INSERT INTO xml_recibidos (estatus,xml_respuesta,created_at,updated_at) VALUES(?,?,?,?);";
			$stt = $cone->prepare($quer);
			$stt->bindParam(1,$estatus);
			$stt->bindParam(2,$descrypted_xml);
			$stt->bindParam(3,$today);
			$stt->bindParam(4,$today);
			$stt->execute();
			$cone = null;

			if(isset($response))
			{
				try {


					$reference = ($response->reference != "") ? $response->reference : "0000";

					$folio = ($response->foliocpagos != "") ? $response->foliocpagos : "0000";
					$auth = ($response->auth != "") ? $response->auth : "0000";
					$cd_response = ($response->cd_response != "") ? $response->cd_response : "none";
					$cd_error = ($response->cd_error != "") ? $response->cd_error : "none";
					$hora = ($response->time != "") ? $response->time : "0000";
					$fecha = ($response->date != "") ? $response->date : "0000";
					$merchant = ($response->nb_merchant != "") ? $response->nb_merchant : "0000";
					$cc_type = ($response->cc_type != "") ? $response->cc_type : "0000";
					$operation = ($response->tp_operation != "") ? $response->tp_operation : "0000";
					$number = ($response->cc_number != "") ? $response->cc_number : "0000";
					$amount = ($response->amount != "") ? $response->amount : "0000";
					$id_url = ($response->id_url != "") ? $response->id_url : "0000";
					$correo = ($response->email != "") ? $response->email : "none@gmail.com";
					$name = "generic";
					$aux = explode("Hotel Adhara Cancun",$response->reference);
					$id = $aux[1];

					
					$db = new db();
					$conn = $db->connection();
					$query = "INSERT INTO pagos_santander (reference,estatus, folio, auth, cd_response, cd_error, hora, fecha, merchant, cc_type, tp_operation, cc_number, amount,id_url,email,name,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$reference);
					$stmt->bindParam(2,$estatus);
					$stmt->bindParam(3,$folio);
					$stmt->bindParam(4,$auth);
					$stmt->bindParam(5,$cd_response);
					$stmt->bindParam(6,$cd_error);
					$stmt->bindParam(7,$hora);
					$stmt->bindParam(8,$fecha);
					$stmt->bindParam(9,$merchant);
					$stmt->bindParam(10,$cc_type);
					$stmt->bindParam(11,$operation);
					$stmt->bindParam(12,$cc_number);
					$stmt->bindParam(13,$amount);
					$stmt->bindParam(14,$id_url);
					$stmt->bindParam(15,$correo);
					$stmt->bindParam(16,$name);
					$stmt->bindParam(17,$today);
					$stmt->bindParam(18,$today);
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0){

						if (strcmp( $response->response, "approved") == 0 ){ //actualizo reserva aceptada

							$query  = "UPDATE transactions SET estatus = 3 WHERE id = ?;"; // ESTATUS 3 ---> APROBADA
							$stmt2 = $conn->prepare($query);
							$stmt2->bindParam(1,$id);
							$stmt2->execute();
							$count2 = $stmt2-> rowCount();
						    if($count2 > 0){

								$query = "SELECT nombre,apellido,correo,ciudad,pais FROM huespedes WHERE id = ?;";
								$stmt3 = $conn->prepare($query);
								$stmt3->bindParam(1,$id);
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
									$stmt4->bindParam(1,$id);
									$stmt4->execute();
									$count4 = $stmt3->rowCount();
						            if($count4 > 0){

										$row2 = $stmt4->fetch(PDO::FETCH_ASSOC);
										$hotel       = $row2['hotel'];
										$fechatranza = $row2['dateFrom'];
										$datetranx   = $row2['dateTo'];
										$detalles    = $row2['detalles'];

										$query = "SELECT currency FROM transactions WHERE id = ?;";
										$stmt5 = $conn->prepare($query);
										$stmt5->bindParam(1,$id);
										$stmt5->execute();
										$count5 = $stmt5->rowCount();
						                if($count5 > 0){

						                  	$row = $stmt5->fetch(PDO::FETCH_ASSOC);
						                  	$currency = $row['currency'];

											//Se actualiza el allotment
											$hotelController = new hotelController();
											$emailController = new emailController();
											$allotment = $hotelController->updateAllotment($row['idRoom']);
											//Se envia el email de que se acabaron los cuartos
											if($allotment == 0)
												$emailController->allotmentOut($room['cuarto']->getNombre(),$id);

					
							                $mensaje = "<!DOCTYPE html>
												<html>
												<head>
													<title>Confirmación de reserva</title>
													<meta charset='UTF-8'>
													<style>
														th,td {
															border: 2px solid #7F5986;
															color: #473934;
														}
														th, td {
															padding: .75rem;
															vertical-align: top;
														}
														table {
															border-collapse: collapse;
														}
													</style>
												</head>
												<body style='font-family: sans-serif;'>
													<div style='width: 481px;'>
														<table>
															<thead>
																<tr>
																	<th colspan='2'>
																		<img src='https://adharacancun.com/img/logos/adhara.png' style='width: 150px; text-align: center;'>
																		<div style='font-size: 24px;'>Datos de reservación</div>
																	</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><b>Hotel</b></td>
																	<td>Hotel Adhara Cancun</td>
																</tr>
																<tr>
																	<td><b>Nombre</b></td>
																	<td>".$cliente."</td>
																</tr>
																<tr>
																	<td><b>Email</b></td>
																	<td>".$email."</td>
																</tr>
																<tr>
																	<td><b>Fecha de llegada</b></td>
																	<td>".$fechatranza."</td>
																</tr>
																<tr>
																	<td><b>Fecha de salida</b></td>
																	<td>".$datetranx."</td>
																</tr>
																<tr>
																	<td><b>Detalles</b></td>
																	<td>".$detalles."</td>
																</tr>
																<tr>
																	<th colspan='2'>Datos de pago</th>
																</tr>
																<tr>
																	<td><b>Referencia</b></td>
																	<td>".$response->reference."</td>
																</tr>
																<tr>
																	<td><b>Número de autorización</b></td>
																	<td>".$response->auth."</td>
																</tr>
																<tr>
																	<td><b>Tipo de pago</b></td>
																	<td>".$response->cc_type."</td>
																</tr>
																<tr>
																	<td><b>Importe</b></td>
																	<td>".$response->amount." ".$currency."</td>
																</tr>
															</tbody>
														</table>
													</div>
												</body>
												</html>";

											$mailHost = "mail.oktravel.mx"; //cambiar host
											$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
											$mailUsername = "info@oktravel.mx";   // SMTP username
											$mailPassword = "oktravel1118";     // SMTP password
											$mailSubject  =  "Reservacion - ".$id;  // mensaje Subject
											$mailFromName = "Adhara Reservaciones"; // Nombre del remitente
											$emailinterno="reservaciones@adharacancun.com";
											$mimail="programacionweb@gphoteles.com";
											$mail1="reservaciones@gphoteles.com ";
											$mail2="asistente1.reservaciones@gphoteles.com "; 
											$mail3="gerenteenturno@gphoteles.com";
											$mail4="reservaciones3@gphoteles.com";

											$mail = new PHPMailer(true);
											//$mail->SMTPDebug = 2; 
											$mail->isSMTP();
											$mail->Host     = 'okcloud.arvixecloud.com';
											$mail->SMTPAuth = true;
											$mail->Username = 'noreply@animate.adharacancun.com';
											$mail->Password = 'Na_xJiira3$.';
											$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
											$mail->Port       = 587;  
											$mail->setFrom('noreply@animate.adharacancun.com','Adhara Reservaciones');
											$mail->AddAddress($email); 
											$mail->addBCC($mimail); 
											$mail->addBCC($mail1); 
											$mail->addBCC($mail2); 
											$mail->addBCC($mail3); 
											$mail->addBCC($mail4);
											$mail->addBCC($emailinterno);

											$mail->WordWrap = 50;     // set word wrap
											$mail->IsHTML(true);     // send as HTML
											$mail->Subject  =  $mailSubject;
											$mail->Body    =  $mensaje;
											if(!$mail->Send()){

												$query = "UPDATE reservations SET response_email = 'Error al enviar correo de confirmacion al cliente, por favor contactarlo' WHERE id = ?;";
												$stmt6 = $conn->prepare($query);
												$stmt6->bindParam(1,$id);
												$stmt6->execute();
												$conn = null;

											} 
											$conn = null;
						                }    
						            }
						        }
						    }
						    else{
						        $msg = "Error al cambiar de estatus la reserva ->aprobada - Fecha: ".date("Y-m-d H:i:s")."\n";
								$file = fopen("log_santander.txt", "a");
								fwrite($file, $msg . PHP_EOL);
								fclose($file);

								$query = "UPDATE reservations SET response_email = 'Error al enviar correo de confirmacion al cliente, por favor contactarlo' WHERE id = ?;";
								$stmt6 = $conn->prepare($query);
								$stmt6->bindParam(1,$id);
								$stmt6->execute();
								$conn = null;
						    }

						}
						else if(strcmp( $response->response, "denied") == 0){

							$query  = "UPDATE transactions SET estatus = 4 WHERE id = ?;"; //estatus 4 --> DECLINADA
							$stmt2 = $conn->prepare($query);
							$stmt2->bindParam(1,$id);
							$stmt2->execute();
							$count2 = $stmt2-> rowCount();       
			
						}

					}
				    else{

				    	$msg = "Error al dar de alta la respuesta de santander a lBD - Fecha: ".date("Y-m-d H:i:s")."\n";
						$file = fopen("log_santander.txt", "a");
						fwrite($file, $msg . PHP_EOL);
						fclose($file);
				    }

				} catch (Exception $e) {

					$msg = "Error Fatal - Fecha: ".date("Y-m-d H:i:s")."\n".$e;
					$file = fopen("log_santander.txt", "a");
					fwrite($file, $msg . PHP_EOL);
					fclose($file);	    
				}	

			}
		}
		catch (Exception $e)
		{
				$msg = json_encode($e)." - Fecha: ".date("Y-m-d H:i:s")."\n";
				$file = fopen("log_santander.txt", "a");
				fwrite($file, $msg . PHP_EOL);
				fclose($file);
		}
	}
}


?>