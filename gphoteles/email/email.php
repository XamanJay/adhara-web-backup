<?php
include "../models/db.php";
include "../models/reservaciones.php";
include "class.phpmailer.php";

if(isset($_POST["correoP"]) && isset($_POST['idP']))

{

	try {

		$db = new db();
		$conn = $db->connection();
		$query = "SELECT * FROM reservations WHERE id = ? AND isDeleted = 0;";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1,$_POST['idP']);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {

			$row = $stmt->fetch(PDO:: FETCH_ASSOC);
			$reserva =  new reservaciones();
			$reserva->setId($row['id']);
			$reserva->setIdCliente($row['idClient']);
			$reserva->setIdTransaccion($row['idTransaction']);
			$reserva->setDateFrom($row['dateFrom']);
			$reserva->setDateTo($row['dateTo']);
			$reserva->setCuartos($row['idRoom']);
			$reserva->setDetalles($row['detalles']);
			$reserva->setResponsable($row['responsable']);
			$reserva->setNotas($row['notas']);
			$reserva->setServicio($row['servicio']);
			$reserva->setHotel($row['hotel']);
			$reserva->setIsDeleted($row['isDeleted']);

			$conn2 = $db->connection();
			$query2 = "SELECT * FROM huespedes WHERE id = ?;";
			$stmt2 = $conn2->prepare($query2);
			$stmt2->bindParam(1,$row['idClient']);
			$stmt2->execute();
			$count2 = $stmt2->rowCount();

			if ($count2 > 0) {

				$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
				$reserva->setNombre($row2['nombre']);
				$reserva->setApellido($row2['apellido']);
				$reserva->setCorreo($row2['correo']);
				$reserva->setTelefono($row2['telefono']);
				$reserva->setPais($row2['pais']);
				$reserva->setCiudad($row2['ciudad']);
				$reserva->setComments($row2['comments']);
				$reserva->setIsClub($row2['isClub']);

				$conn3 = $db->connection();
				$query3 = "SELECT * FROM transactions WHERE id = ?;";
				$stmt3 = $conn3->prepare($query3);
				$stmt3->bindParam(1,$row['idTransaction']);
				$stmt3->execute();
				$count3 = $stmt3->rowCount();

				if ($count3 > 0) {

					$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
					$reserva->setPrice($row3['price']);
					$reserva->setCostoProv($row3['costoProv']);
					$reserva->setCurrency($row3['currency']);
					$reserva->setFormaPago($row3['formaPago']);
					$reserva->setCardType($row3['cardType']);
					$reserva->setEstatus($row3['estatus']);
					$reserva->setDate($row3['dateTransaction']);

					if ($reserva->getHotel() == "Adhara Cancun") {
                        $idres = "AD".$reserva->getId();
                    }

                    else{
                        $idres = "MA".$reserva->getId();
                    }



					$mensaje = '

					<!DOCTYPE html>
					<html>
						<head>
						<meta charset="utf-8">
							<title></title>
						</head>
						<body>
							<strong>NÚMERO DE RESERVACIÓN: '.$idres.'</strong><br /><br />
							<strong>TOTAL A PAGAR: $'.number_format($reserva->getPrice(), 2, '.', ',')." ".$reserva->getCurrency().'</strong><br /><br />

							'.$reserva->getDetalles().'
							<p><big><strong>Reservacion Pendiente de Pago</strong></big></p>

							<p>Muchas gracias por reservar con nosotros. Para poder hacer efectiva su reservaci&oacute;n es necesario hacer el&nbsp;deposito o&nbsp;transferencia por el total de la reservacion.</p>

							<p><strong>Transferencia, SPEI, Dep&oacute;sito en cheque&nbsp;en efectivo</strong></p>

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

							<hr />
							<p><br />
							Para cualquier pregunta referente a su reservaci&oacute;n favor de contactarnos</p>

							<p>Llamada&nbsp;sin costo al: 01 800 711-15-31 (Mexico)<br />
							Telefono: +52 (998) 881 65 00<br />
							Fax: +52 (998) 884 83 76<br />
							reservaciones@gphoteles.com</p>
						</body>
					</html>';

					$mailHost = "mail.oktravel.mx"; //cambiar host
					$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
					$mailUsername = "info@oktravel.mx";  	// SMTP username
					$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
					$mailSubject  =  "Solicitud de deposito - Reservacion ".$idres;  // mensaje Subject
					$mailFromName = $reserva->getHotel()." Servico a Clientes"; // Nombre del remitente
					$to = $_POST['correoP'];
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
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true);       // send as HTML
					$mail->Subject  =  $mailSubject;
					$mail->Body    =  $mensaje;
					if(!$mail->Send()){

				        echo json_encode(array("type" => "error", "message" => "El email no pudo ser enviado."));

				    }else{

				    	echo json_encode(array("type" => "success", "message" => "El email se envio correctamente."));
				    }		
				}
			}
		}

	} catch (Exception $e) {

		echo "Error al obtener la reserva. <br>";
		/*print_r($e);*/
	}

}



else if(isset($_POST['correoD']) && isset($_POST['idD'])){



	try {

		$db = new db();
		$conn = $db->connection();
		$query = "SELECT * FROM reservations WHERE id = ? AND isDeleted = 0;";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(1,$_POST['idD']);
		$stmt->execute();
		$count = $stmt->rowCount();
		if ($count > 0) {

			$row = $stmt->fetch(PDO:: FETCH_ASSOC);
			$reserva =  new reservaciones();
			$reserva->setId($row['id']);
			$reserva->setIdCliente($row['idClient']);
			$reserva->setIdTransaccion($row['idTransaction']);
			$reserva->setDateFrom($row['dateFrom']);
			$reserva->setDateTo($row['dateTo']);
			$reserva->setCuartos($row['idRoom']);
			$reserva->setDetalles($row['detalles']);
			$reserva->setResponsable($row['responsable']);
			$reserva->setNotas($row['notas']);
			$reserva->setServicio($row['servicio']);
			$reserva->setHotel($row['hotel']);
			$reserva->setIsDeleted($row['isDeleted']);

			$conn2 = $db->connection();
			$query2 = "SELECT * FROM huespedes WHERE id = ?;";
			$stmt2 = $conn2->prepare($query2);
			$stmt2->bindParam(1,$row['idClient']);
			$stmt2->execute();
			$count2 = $stmt2->rowCount();
			if ($count2 > 0) {

				$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
				$reserva->setNombre($row2['nombre']);
				$reserva->setApellido($row2['apellido']);
				$reserva->setCorreo($row2['correo']);
				$reserva->setTelefono($row2['telefono']);
				$reserva->setPais($row2['pais']);
				$reserva->setCiudad($row2['ciudad']);
				$reserva->setComments($row2['comments']);
				$reserva->setIsClub($row2['isClub']);

				$conn3 = $db->connection();
				$query3 = "SELECT * FROM transactions WHERE id = ?;";
				$stmt3 = $conn3->prepare($query3);
				$stmt3->bindParam(1,$row['idTransaction']);
				$stmt3->execute();
				$count3 = $stmt3->rowCount();
				if ($count3 > 0) {

					$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
					$reserva->setPrice($row3['price']);
					$reserva->setCostoProv($row3['costoProv']);
					$reserva->setCurrency($row3['currency']);
					$reserva->setFormaPago($row3['formaPago']);
					$reserva->setCardType($row3['cardType']);
					$reserva->setEstatus($row3['estatus']);
					$reserva->setDate($row3['dateTransaction']);

					if ($reserva->getHotel() == "Adhara Cancun") {

                        $idres = "AD".$reserva->getId();
                      }

                    else{

                        $idres = "MA".$reserva->getId();

                     }

					$mensaje = '
					<!DOCTYPE html>
					<html>
						<head>
						<meta charset="utf-8">
							<title></title>
						</head>
						<body>
							<strong>NÚMERO DE RESERVACIÓN: '.$idres.'</strong><br /><br />
							<strong>TOTAL A PAGAR: $'.number_format($reserva->getPrice(), 2, '.', ',')." ".$reserva->getCurrency().'</strong><br /><br />

							'.$reserva->getDetalles().'
							<p><big><strong>Reservacion (Pago a la llegada)</strong></big></p>

							<p>Muchas gracias por reservar con nosotros. Por favor imprima este mensaje y tra&iacute;galo con usted junto con una identificacion valida con fotografia. Es necesario pagar la totalidad de la reservacion a su llegada.</p>
							<p>Para cualquier pregunta referente a su reservaci&oacute;n favor de contactarnos</p>
							<p>Llamada&nbsp;sin costo al: 01 800 711-15-31 (M&eacute;xico)<br />
							Telefono: +52 (998) 881 65 00<br />
							Fax: +52 (998) 884 83 76<br />
							reservaciones@gphoteles.com</p>
						</body>
					</html>';

					$mailHost = "mail.oktravel.mx"; //cambiar host
					$mailFromcuenta = "info@oktravel.mx"; //cambiar remitente
					$mailUsername = "info@oktravel.mx";  	// SMTP username
					$mailPassword = "q4t?)TyGX0y!"; 		// SMTP password
					$mailSubject  =  "Solicitud de Reservacion ".$idres." (Pago a la llegada)";  // mensaje Subject
					$mailFromName = $reserva->getHotel()." Servico a Clientes"; // Nombre del remitente
					$to = $_POST['correoD'];
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
					$mail->WordWrap = 50; // set word wrap
					$mail->IsHTML(true);       // send as HTML
					$mail->Subject  =  $mailSubject;
					$mail->Body    =  $mensaje;
					if(!$mail->Send()){

				    	/*echo "Message was not sent <p>";
				        echo "Mailer Error: " . $mail->ErrorInfo;*/
				        echo json_encode(array("type" => "error", "message" => "El email no pudo ser enviado."));

				    }else{
				    	echo json_encode(array("type" => "success", "message" => "El email se envio correctamente."));
				    }		
				}
			}
		}
	} catch (Exception $e) {

		echo "Error al obtener la reserva. <br>";
		/*print_r($e);*/
	}
}

?>