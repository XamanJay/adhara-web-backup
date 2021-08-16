<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class clienteController
{
	
	function __construct(){}

	function create($cliente){
		try {

			$email_ = $cliente->getEmail();
			$username_ = $cliente->getEmail();
			$nombre_ = $cliente->getNombre();
			$lastname_ = $cliente->getApellidoPaterno();
			$lastsecond = $cliente->getApellidoMaterno();
			$puntos_ = $cliente->getPuntos();
			$numero_ = $cliente->getNumeroSocio();
			$empresa_ = $cliente->getEmpresa();
			$telefono_ = $cliente->getTelefono();
			$pais_ = $cliente->getPais();
			$ciudad_ = $cliente->getCiudad();
			$estado_ = $cliente->getEstado();
			$codigo_ = $cliente->getCodigoPostal();
			$direccion_ = $cliente->getDireccion();
			$fecha_ = $cliente->getFecha();
			$active_ = $cliente->getIsActive();
			$pass_ = $cliente->getPassword();
			$db = new db();		
			$conn = $db->connection2();
			$query= "SELECT * FROM users WHERE Email = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$email_);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$conn == null;
				echo json_encode(array("type" => "error" , "message" => "El correo ya se registro con anterioridad."));
			}else{

				$cliente->setId(uniqid("user_",true));
				$id_ = $cliente->getId();
				$qr_ = $id_."?";
				$query = "INSERT INTO users(Id, Username, Email,qr_code,Password) VALUES (?,?,?,?,AES_ENCRYPT('".$pass_."','test'));";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$id_);
				$stmt->bindParam(2,$username_);
				$stmt->bindParam(3,$email_);
				$stmt->bindParam(4,$qr_);
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$query = "INSERT INTO personas(Id, Nombre, Apellido_paterno,Apellido_materno) VALUES (?,?,?,?);";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$id_);
					$stmt->bindParam(2,$nombre_);
					$stmt->bindParam(3,$lastname_);
					$stmt->bindParam(4,$lastsecond);
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0)
					{
						$query = "INSERT INTO clientes(Id, Puntos, NumeroSocio, Empresa, Telefono, Pais, Ciudad, Estado, CodigoPostal, Direccion, Fecha, isActive) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(1,$id_);
						$stmt->bindParam(2,$puntos_);
						$stmt->bindParam(3,$numero_);
						$stmt->bindParam(4,$empresa_);
						$stmt->bindParam(5,$telefono_);
						$stmt->bindParam(6,$pais_);
						$stmt->bindParam(7,$ciudad_);
						$stmt->bindParam(8,$estado_);
						$stmt->bindParam(9,$codigo_);
						$stmt->bindParam(10,$direccion_);
						$stmt->bindParam(11,$fecha_);
						$stmt->bindParam(12,$active_);
						$stmt->execute();
						$count = $stmt->rowCount();
						if($count > 0)
						{
							$clienteController = new clienteController();
							$cliente_id= $clienteController->getId($cliente->getEmail());
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
							

							/*Aqui se genera el PDF */
							require(realpath($_SERVER['DOCUMENT_ROOT']."/pdfController.php"));


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

							$conn == null;
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
			 				//$mail->addAttachment('/pdfs/'.$pdfName);
			 				if($mail->Send()){

			 					echo json_encode(array("type" => "success" , "message" => "Se registro exitosamente!!","mail"=>"success"));
			 				}
			 				else{
			 					echo json_encode(array("type" => "success" , "message" => "Se registro exitosamente!!","mail"=>"Error al enviar mensaje de bienvenida a su email."));
			 				}
							
						}
					}
				}
				$conn == null;
			}
		} catch (Exception $e) {
			$this->abort($cliente->getId());
			echo json_encode(array("type" => "error" , "message" => "Error: Sucedió algo inesperado comunicate con el encargado sobre este problema." ));
 			//Si hubo un problema con la base de datos, favor de descomentar la siguiente linea
			print_r($e);
		}
		return false;

	}

	//Obtener el ID del usuario por Email o Username
	function getId($data){
		try {
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * FROM users WHERE Email = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$conn == null;
				return $rows["Id"];
			}
			else
			{
				echo "No se encontró usuario";
			}
			$conn == null;

		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	function getSocio($id){
		try {
			
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT  NumeroSocio FROM clientes WHERE Id = '$id';";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row['NumeroSocio'];
			}
			else{
				return 0;
			}
			$conn = NULL;

		} catch (Exception $e) {
			print_r($e);
		}
	}


	//Comprobar si existe un cliente

	function exist($data){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM users WHERE Username = :data OR Email = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				return true;
			}

		} catch (Exception $e) {
			echo "Hubo un problema en la conexión a la base de datos.";
		}
		return false;
	}

	//Encontrar el cliente por ID
	function find($id){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM clientes WHERE Id = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$cliente = new cliente();
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$cliente->setNumeroSocio($rows['NumeroSocio']);
				$cliente->setPuntos($rows['Puntos']);
				$cliente->setEmpresa($rows['Empresa']);
				$cliente->setTelefono($rows['Telefono']);
				$cliente->setPais($rows['Pais']);
				$cliente->setCiudad($rows['Ciudad']);
				$cliente->setEstado($rows['Estado']);
				$cliente->setCodigoPostal($rows['CodigoPostal']);
				$cliente->setDireccion($rows['Direccion']);

				$query = "SELECT * FROM personas WHERE Id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$id);
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{	
					$rows = $stmt->fetch(PDO::FETCH_ASSOC);
					$cliente->setNombre($rows['Nombre']);
					$cliente->setApellidoPaterno($rows['Apellido_paterno']);
					$cliente->setApellidoMaterno($rows['Apellido_materno']);

					$query = "SELECT * FROM users WHERE Id = ? ;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$id);
					$stmt->execute();
					$count = $stmt->rowCount();

					if($count > 0)
					{
						$rows = $stmt->fetch(PDO::FETCH_ASSOC);
						$cliente->setId($rows['Id']);
						$cliente->setUsername($rows['Username']);
						$cliente->setEmail($rows['Email']);
						$conn == null;
						return $cliente;
					}
					else
					{
						echo "No se encontró usuario";

					}
				}
				else
				{
					echo "No se encontró persona";

				}
			}
			else
			{
				echo "No se encontró cliente";

			}
			$conn == null;

		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	//Encontrar el usuario por cualquier dato que no sea el ID
	function getCliente($data){
		try {
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * FROM users WHERE Username = :data OR Email = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":data",$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$cliente = new cliente();
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$cliente->setId($rows['Id']);
				$cliente->setUsername($rows['Username']);
				$cliente->setEmail($rows['Email']);

				$query = "SELECT * FROM personas WHERE id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$cliente->getId());
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
					$stmt->bindParam(1,$cliente->getId());
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
						$cliente->setCodigoPostal($rows['CodigoPostal']);
						$cliente->setDireccion($rows['Direccion']);
						$conn == null;
						return $cliente;
					}
					else
					{
						echo "No se encontró cliente";
					}
				}
				else
				{
					echo "No se encontró persona";
				}
			}
			else
			{
				echo "No se encontró usuario";
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	function rol_user($user_id, $rol_id){
		try {
			
			$db = new db();		
			$conn = $db->connection2();
			$query = "INSERT INTO rol_user(User_id, Rol_id) VALUES (?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$user_id);
			$stmt->bindParam(2,$rol_id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$conn == null;
				return true;
			}
		} catch (Exception $e) {
			print_r($e);
		}
		return false;

	}

	function fecha($id){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT fecha from clientes where Id= ?";
			$stmt =$conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$datetime = $row['fecha'];
				$conn = null;
				$date = date("d/m/Y",strtotime($datetime));
				return $date;
			}

		} catch (Exception $e) {

			echo "Error al convertir la fecha";
			print_r($e);

		}
		return false;
	}

	function puntos($id){
		try {
			
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT Puntos from clientes where Id= ?";
			$stmt =$conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {
				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$Puntos = $row['Puntos'];
				return $Puntos;
			}

		} catch (Exception $e) {

			echo "Error al obtener los puntos";
			print_r($e);

		}
		return false;
	}


	function abort($id){
		try {
			
			$db = new db();		
			$conn = $db->connection2();
			$query = "DELETE FROM users WHERE Id = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$conn == null;
				return true;
			}
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}


	/*  VIEJA BASE DE DATOS */
	
	function old_fecha($fecha){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT fecha from adhara_clientes where idc= ?";
			$stmt =$conn->prepare($query);
			$stmt->bindParam(1,$fecha);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$datetime = $row['fecha'];
				$conn = null;
				$date = date("d/m/Y",strtotime($datetime));
				return $date;
			}

		} catch (Exception $e) {

			echo "Error al convertir la fecha";
			print_r($e);

		}
		return false;
	}



}

?>