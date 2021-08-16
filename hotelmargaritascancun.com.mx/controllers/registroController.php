 <?php


 if($_POST){
 	if(isset($_POST["nombre"]) &&isset($_POST["username"]) &&isset($_POST["email"]) &&isset($_POST["password2"]) &&isset($_POST["contraseña"])&&isset($_POST["telefono"])&&isset($_POST["empresa"])&&isset($_POST["pais"])&&isset($_POST["ciudad"])&&isset($_POST["estado"])&&isset($_POST["direccion"])&&isset($_POST["codigoPostal"]) &&isset($_POST['apellidoP']) &&isset($_POST['apellidoM']))
 	{

 		try {
 			include "../models/db.php";
 			require ("clienteController.php");
 			include_once("../reservation/class.phpmailer.php");

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
 				$cliente_id= $clienteController->getId($cliente->getUsername());
 				$clienteController->rol_user($cliente_id, 2); //Cambiar a nombre del rol en vez del ID

 				$Host = "mail.oktravel.mx";
 				$From = "info@oktravel.mx";
 				$Username = "info@oktravel.mx";
 				$Password = "q4t?)TyGX0y!";
 				$Subject  =  "Confirmación de registro a Clubestrella";
 				$FromName = "Clubestrella";
 				$To = $cliente->email;

 				$Message = "<!DOCTYPE html>
 				<html>
 				<head>
 					<title>Bienvenido a clubestrella</title>
 					<meta charset='UTF-8'>
 				</head>
 				<body style='font-family: sans-serif;'>
 					<div style='width: 400px;'>
 						<p>
 						<h4 style='text-align: center; width: 100%;'>Hola, ".$cliente->getNombre()."</h4>
 						</p>
 						<img style='width: 400px; height: auto;' src='https://clubestrella.mx/img/email/bienvenida.jpg' alt='bienvenidos'>
 					</div>
 				</body>
 				</html>
 				";

 				$mail = new PHPMailer();
 				$mail->SetLanguage('en');
 				$mail->IsSMTP();
 				$mail->Host     = $Host;
 				$mail->SMTPAuth = true;
 				$mail->Username = $Username;
 				$mail->Password = $Password;
 				$mail->From     = $From;
 				$mail->FromName = $FromName;
 				$mail->AddAddress($To);
 				$mail->WordWrap = 50; 
 				$mail->IsHTML(true);  
 				$mail->Subject = $Subject;
 				$mail->Body = $Message;
 				$mail->Send();

 			}

 		} catch (Exception $e) {
 			echo json_encode(array("type" => "error" , "message" => "Hubo un problema con la conexión a la base de datos." ));
 			return false;
 		}
 	}

 }
 ?>