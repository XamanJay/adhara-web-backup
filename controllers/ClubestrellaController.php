<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ClubestrellaController{

	public function postLogin(){

		if ($_POST) {
			if (isset($_POST['correo']) && isset($_POST['security']) ) 
			{
				session_start();
				try {

					$db = new db();
					$conn = $db->connection2();
					$query = "SELECT * FROM users where Username = :username OR  Email = :username AND Password = AES_ENCRYPT(:password,'test')  AND IsDeleted = 0;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(":username",$_POST['correo']);
					$stmt->bindParam(":password",$_POST['security']);
					$stmt->execute();
					$count = $stmt->rowcount();
					if($count > 0)
					{	
						$cliente = new cliente();
						$rows = $stmt->fetch(PDO::FETCH_ASSOC);
						$cliente->setId($rows['Id']);
						$cliente->setUsername($rows['Username']);
						$cliente->setEmail($rows['Email']);

						$query = "SELECT * FROM personas WHERE id = ? ;";
						$idClient = $cliente->getId();
						$stmt = $conn->prepare($query);
						$stmt->bindParam(1,$idClient);
						$stmt->execute();
						$count = $stmt->rowCount();
						if($count > 0)
						{
							$rows = $stmt->fetch(PDO::FETCH_ASSOC);
							$cliente->setNombre($rows['Nombre']);
							$cliente->setApellidoPaterno($rows['Apellido_paterno']);
							$cliente->setApellidoMaterno($rows['Apellido_materno']);

							$query = "SELECT * FROM clientes WHERE id = ? ;";
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1,$idClient);
							$stmt->execute();
							$count = $stmt->rowCount();
							if($count > 0)
							{
								$rows = $stmt->fetch(PDO::FETCH_ASSOC);
								$cliente->setNumeroSocio($rows['NumeroSocio']);
								$cliente->setPuntos($rows['Puntos']);
								$cliente->setEmpresa($rows['Empresa']);
								$cliente->setTelefono($rows['Telefono']);
								$cliente->setPais($rows['Pais']);
								$cliente->setCiudad($rows['Ciudad']);
								$cliente->setEstado($rows['Estado']);
								$cliente->setFecha($rows['Fecha']);
								$cliente->setCodigoPostal($rows['CodigoPostal']);
								$cliente->setDireccion($rows['Direccion']);
								$_SESSION["cliente"] = $cliente;
								$conn == null;
								echo "1";
							}
						}
					}
					else{
						unset($_SESSION["cliente"]);
						echo "2";;
					}
					$conn == null;
					return 0;

				} catch (Exception $e) {
					unset($_SESSION["cliente"]);
					echo "Surgió un problema...";
					print_r($e);
				}
			}
		}
		else{
			echo "ERROR 404: NOT FOUND";
		}

	}

	public function postRegister(){


		if($_POST){
		 	if(isset($_POST["nombre"]) &&isset($_POST["username"]) &&isset($_POST["email"]) &&isset($_POST["password2"]) &&isset($_POST["contraseña"])&&isset($_POST["telefono"])&&isset($_POST["empresa"])&&isset($_POST["pais"])&&isset($_POST["ciudad"])&&isset($_POST["estado"])&&isset($_POST["direccion"])&&isset($_POST["codigoPostal"]) &&isset($_POST['apellidoP']) &&isset($_POST['apellidoM']))
		 	{

		 		try {

		 			$cliente = new cliente();
		 			$clienteController = new clienteController();
		 			$cliente->setUsername($_POST["username"]);
		 			$cliente->setEmail($_POST["email"]);
		 			$cliente->setPassword($_POST["password2"]);
		 			$cliente->setNombre($_POST["nombre"]);
		 			$cliente->setApellidoPaterno($_POST['apellidoP']);
		 			$cliente->setApellidoMaterno($_POST['apellidoM']);
		 			$cliente->setEmpresa($_POST["empresa"]);
		 			$cliente->setTelefono($_POST["telefono"]);
		 			$cliente->setPais($_POST["pais"]);
		 			$cliente->setCiudad($_POST["ciudad"]);
		 			$cliente->setEstado($_POST["estado"]);
		 			$cliente->setCodigoPostal($_POST["codigoPostal"]);
		 			$cliente->setDireccion($_POST["direccion"]);
		 			$cliente->setPuntos(0);
		 			$cliente->setFecha(date("Y-m-d H:i:s"));
		 			$cliente->setIsActive(1);
		 			
		 			if($clienteController->create($cliente)){

		 				/*$cliente_id= $clienteController->getId($cliente->getUsername());
		 				$clienteController->rol_user($cliente_id, 2); //Cambiar a nombre del rol en vez del ID
		 				$numeroSocio = $clienteController->getSocio($cliente_id);
 						$pdfName = "clubestrella".$numeroSocio.".pdf";
						$pdf_content= '<!DOCTYPE html>
								<html>
								<head>
									<title>Registro Club estrella</title>
									<meta charset="UTF-8">
									<meta name="viewport" content="width=device-width, initial-scale=1">
									<style>
										th,td {
											border: 2px solid #dee2e6;color: #666a6d;
										}
										th, td {
											padding: 15px;vertical-align: top;
										}
										table {
											border-collapse: collapse;padding: 35px;
										}
										img{
											width: 130px;margin-left: 90px;
										}
										h1{
											font-size: 24px;margin-top: 5px;text-align: center;
										}
										div{
											width: 481px;
										}
									</style>
								</head>
								<body>
									<div>
										<table>
											<thead>
											<tr>
												<th colspan="2">
													<img src="/img/clubestrella/logo.png">
													<h1>Bienvenido a Club Estrella</h1>
												</th>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td><b>Numero de Socio</b></td>
													<td>'.$numeroSocio.'</td>
												</tr>
												<tr>
													<td><b>Nombre</b></td>
													<td>'.$cliente->getNombre().'</td>
												</tr>
												<tr>
													<td><b>Apellido</b></td>
													<td>'.$cliente->getApellidoPaterno().'</td>
												</tr>
												<tr>
													<td><b>Fecha de registro</b></td>
													<td>'.$cliente->getFecha().'</td>
												</tr>
												<tr>
													<td><b>Correo electronico</b></td>
													<td>'.$cliente->getEmail().'</td>
												</tr>
											</tbody>
										</table>
									</div>
								</body>
								</html>';
						

						Aqui se genera el PDF 
						require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/pdfController.php"));

		 				$Subject  =  "Confirmación de registro a Clubestrella";
		 				$To = $cliente->email;

		 				$Message = "<!DOCTYPE html>
							<html>
							<head>
								<title>Confirmación de reserva</title>
								<meta charset='UTF-8'>
								<meta name='viewport' content='width=device-width, initial-scale=1'>
								<style>
									th,td {
										border: 2px solid #dee2e6;
										color: #666a6d;
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
												<img src='https://clubestrella.mx/img/logo.png' style='width: 130px; text-align: center;'>
												<div style='font-size: 24px;'>Bienvenido a Club Estrella</div>
											</th>
										</tr>
										</thead>
										<tbody>
											<tr>
												<td><b>Numero de Socio</b></td>
												<td>".$numeroSocio."</td>
											</tr>
											<tr>
												<td><b>Nombre</b></td>
												<td>".$cliente->getNombre()."</td>
											</tr>
											<tr>
												<td><b>Apellido</b></td>
												<td>".$cliente->getApellidoPaterno()."</td>
											</tr>
											<tr>
												<td><b>Fecha de registro</b></td>
												<td>".$cliente->getFecha()."</td>
											</tr>
											<tr>
												<td><b>Correo electronico</b></td>
												<td>".$cliente->getEmail()."</td>
											</tr>
										</tbody>
									</table>
								</div>
							</body>
							</html>";

		 				$mail = new PHPMailer(true);
		 				$mail->isSMTP();
						$mail->Host     = 'okcloud.arvixecloud.com';
						$mail->SMTPAuth = true;
						$mail->Username = 'noreply@animate.adharacancun.com';
						$mail->Password = 'Na_xJiira3$.';
						$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    					$mail->Port       = 587;  
						$mail->setFrom('noreply@animate.adharacancun.com','Clubestrella');
		 				$mail->AddAddress($To);
		 				$mail->WordWrap = 50; 
		 				$mail->IsHTML(true);  
		 				$mail->Subject = $Subject;
		 				$mail->Body = $Message;
		 				$mail->addAttachment('/pdfs/'.$pdfName);
		 				if($mail->Send()){

		 					echo json_encode(array("type" => "success" , "message" => "Se registro exitosamente!!","mail"=>"success"));
		 				}
		 				else{
		 					echo json_encode(array("type" => "success" , "message" => "Se registro exitosamente!!","mail"=>"Error al enviar mensaje de bienvenida a su email."));
		 				}*/

		 			}
		 			
		 		} catch (Exception $e) {
		 			//echo json_encode(array("type" => "error" , "message" => "Hubo un problema con la conexión a la base de datos." ));
		 			echo json_encode(array("type" => "error" , "message" => "Error inesperado, intente de nuevo." ));
		 			return false;
		 		}
		 	}

		}
 
	}

	public function postRecover(){
		if ($_POST) {
			if (isset($_POST['correoPass'])) {
				
				try {

					$db = new db();
					$conn = $db->connection2();
					$query = "SELECT AES_DECRYPT(Password,'test')  FROM users WHERE Email = ?;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$_POST['correoPass']);
					$stmt->execute();
					$count = $stmt->rowCount();
					if ($count > 0) {
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						
						$recoveryPass=$row["AES_DECRYPT(Password,'test')"];

						
						$To = $_POST['correoPass'];
						//$To = "juan.alucard.02@gmail.com";

						$Message = "<!DOCTYPE html>
						<html>
						<head>
							<title>clubestrella</title>
							<meta charset='UTF-8'>
						</head>
						<body style='font-family: sans-serif;'>
							<div style='width: 400px;'>
								<p>
								<h4 style='text-align: center; width: 100%;'>Recuperacion de Contraseña</h4>
								</p>
								<p>
									Su Password es: ".$recoveryPass."
								</p>
								
							</div>
						</body>
						</html>
						";

						$mail = new PHPMailer(true);
						//$mail->setLanguage('en');
						//$mail->SMTPDebug = 2; 
						/*$mail->SMTPOptions = array(
						    'ssl' => array(
						        'verify_peer' => false,
						        'verify_peer_name' => false,
						        'allow_self_signed' => true
						    )
						);*/
						$mail->isSMTP();
						$mail->Host     = 'okcloud.arvixecloud.com';
						$mail->SMTPAuth = true;
						$mail->Username = 'noreply@animate.adharacancun.com';
						$mail->Password = 'Na_xJiira3$.';
						$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    					$mail->Port       = 587;  
						$mail->setFrom('noreply@animate.adharacancun.com','Clubestrella');
						$mail->addAddress($To,'User');
						$mail->WordWrap = 50; 
						$mail->isHTML(true);  
						$mail->Subject = 'Recuperacion de Password Clubestrella';
						$mail->Body = $Message;
						$mail->Send();

						echo 1;
						
					}
					else{
						echo 0;
					}

				} catch (Exception $e) {
					echo "Error al recuperar la contraseña <br>";
					print_r($e);
				}
			}
		}
	}

	public function postLogoff(){
		session_start();
		unset($_SESSION["cliente"]);

		echo json_encode(array("type" => "success"));

	}

}



?>