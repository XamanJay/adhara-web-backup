<?php
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/db.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/cliente.php"));

session_start();
if($_POST){

	if(!file_exists("log.txt")){
		$file = fopen("log.txt", "w");
		fwrite($file, "---- Inicio de log ----" . PHP_EOL);
		fclose($file);
	}

	if(isset($_POST["re"])&&isset($_POST["rr"])&&isset($_POST["tt"])&&isset($_POST["id"])){
		date_default_timezone_set("America/Cancun");
		$cliente = new cliente();
		$cliente = $_SESSION['cliente'];
		$messagelog = "";
		$re = $_POST["re"];
		$rr = $_POST["rr"];
		$tt = $_POST["tt"];
		$id = $_POST["id"];
		$factura   = "?re=".$re."&rr=".$rr."&tt=".$tt."&id=".$id;
		$idCliente = $_SESSION['cliente']->getId();

		if(strcmp($re, "PHO8803074X4") == 0 || strcmp($re, "OKT130624DUA") == 0){
			//Comprobación de si ya esta registrado el folio fiscal
			try {
			// Consulta el estado de una factura en el SAT
			// @ToRo 2016 https://tar.mx/tema/facturacion-electronica.html
				$options=array('trace'=>true, 'stream_context'=>stream_context_create( ['http' => ['timeout'=>1] ] ));
				$client = new SoapClient("https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl",$options);
				$resultado = $client->Consulta(['expresionImpresa'=>$factura]);

				$objeto = $resultado->ConsultaResult;
				$estadoFolio = $objeto->Estado;
				if(strcmp($estadoFolio, "Vigente") == 0){
					$db = new db();
					$conn = $db->connection2();
					$query= "SELECT registro_fiscal FROM registro_puntos WHERE registro_fiscal = ? ;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$id);
					$stmt->execute();
					$count = $stmt->rowCount();
					$tt = round($_POST["tt"]);
					$tt = $tt; //* 2; //Puntos dobles PROMO SEPTIEMBRE / 2017
					if($count <= 0){

						$query = "INSERT INTO registro_puntos(idCliente,fecha,registro_fiscal,rfc,referencia,puntos) VALUES (?,?,?,?,?,?); CALL sumatoria('".$idCliente."');";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(1,$idCliente);
						$stmt->bindParam(2,date("Y-m-d H:i:s"));
						$stmt->bindParam(3,$id);
						$stmt->bindParam(4,$rr);
						$stmt->bindParam(5,$re);
						$stmt->bindParam(6,$tt);
						$stmt->execute();
						$count = $stmt->rowCount();
						if($count > 0){

						//Mensaje LOG.txt
							$messagelog = $cliente->nombre." ha sido registrado exitosamente. Puntos registrados:  ".$tt." - Fecha: ".date("Y-m-d H:i:s", time());
							$file = fopen("log.txt", "a");
							fwrite($file, $messagelog. PHP_EOL);
							fclose($file);
							echo json_encode(
								array(
									"type" => "success" , 
									"title" => "Código correcto",  
									"message" => "Tu código ha sido registrado exitosamente, has registrado: ".$tt." puntos."
									)
								);


							session_start();
							$query = "SELECT * FROM users where Email = ? AND IsDeleted = 0;";
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1,$_SESSION['cliente']->getEmail());
							$stmt->execute();
							$count = $stmt->rowcount();
							if ($count > 0) {

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
										$cliente->setFecha($rows['Fecha']);
										$cliente->setCodigoPostal($rows['CodigoPostal']);
										$cliente->setDireccion($rows['Direccion']);
										$_SESSION["cliente"] = $cliente;
							
									}
								}

							}

						}
						else {

							$messagelog = $cliente->nombre." intentó registrar puntos. Problema al registrar puntos, verificar la tabla o los datos que sean correctos - Fecha: ".date("Y-m-d H:i:s", time());
							$file = fopen("log.txt", "a");
							fwrite($file, $messagelog. PHP_EOL);
							fclose($file);
							echo json_encode(
								array(
									"type" => "error" , 
									"title" => "Ocurrió un problema",  
									"message" => "Hubo un problema, favor de comunicarse con Dpto. de Desarrollo." 
									)
								);
							}//*/
						}
						else {
							$messagelog = $cliente->nombre." intentó registrar puntos. El folio fiscal ya ha sido registrado. - Fecha: ".date("Y-m-d H:i:s", time());
							$file = fopen("log.txt", "a");
							fwrite($file, $messagelog. PHP_EOL);
							fclose($file);
							echo json_encode(
								array(
									"type" => "info" , 
									"title" => "Código usado",  
									"message" => "El código que usted intentó ingresar ya ha sido registrado." 
									)
								);
						}

					}
					else{
						$messagelog = $cliente->nombre." intentó registrar un folio fiscal [".$factura."] no vigente con estado [".$estadoFolio."] - Fecha: ".date("Y-m-d H:i:s", time());
						$file = fopen("log.txt", "a");
						fwrite($file, $messagelog. PHP_EOL);
						fclose($file);
						echo json_encode(
							array(
								"type" => "warning" , 
								"title" => "Código no vigente o no encontrado",  
								"message" => "El código que usted intentó ingresar no está vigente o no se encontró (Inténtelo de nuevo)." 
								)
							);
					}
				}
				catch (Exception $e) {
					$file = fopen("log.txt", "a");
					fwrite($file, $e." - Fecha: ".date("Y-m-d H:i:s", time()). PHP_EOL);
					fclose($file);
					echo json_encode(
						array(
							"type" => "error" , 
							"title" => "Ocurrió un problema",  
							"message" => "Hubo un problema, favor de comunicarse con Dpto. de Desarrollo." 
							)
						);

				}

			}
			else {
				$messagelog = $cliente->nombre." intentó registrar una factura [".$factura."] que no pertenece al grupo peninsular de hoteles. - Fecha: ".date("Y-m-d H:i:s", time());
				$file = fopen("log.txt", "a");
				fwrite($file, $messagelog. PHP_EOL);
				fclose($file);
				echo json_encode(
					array(
						"type" => "error" , 
						"title" => "Ups!",  
						"message" => "Esta factura no pertenece al grupo peninsular de hoteles"
						)
					);
			}	
		}
		return false;

	}
	?>