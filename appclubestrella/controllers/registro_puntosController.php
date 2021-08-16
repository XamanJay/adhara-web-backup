<?php 

	//require("../models/registro_puntos.php");
	require (realpath($_SERVER['DOCUMENT_ROOT']."/models/registro_puntos.php"));

	class registro_puntosController
	{

		function create($registro_puntos)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "INSERT into registro_puntos (idCliente,fecha,registro_fiscal,rfc,referencia,puntos,estado) VALUES (?,?,?,?,?,?,?);";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$registro_puntos->getIdCliente());
				$stmt->bindParam(2,$registro_puntos->getFecha());
				$stmt->bindParam(3,$registro_puntos->getRegistroFiscal());
				$stmt->bindParam(4,$registro_puntos->getRfc());
				$stmt->bindParam(5,$registro_puntos->getReferencia());
				$stmt->bindParam(6,$registro_puntos->getPuntos());
				$stmt->bindParam(7,$registro_puntos->getEstado());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					echo "Registro exitoso";
					$conn = null;
					return true;
				}
				$conn = null;

			} catch (Exception $e) {
				
				echo "Error al insertar un registro";
				print_r($e);
			}

			return false;
		}

		function getPuntos($idCliente)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "SELECT * from registro_puntos where idCliente= ? AND estado = 1;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1, $idCliente);
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					$lista_puntos = array();
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $row) {

						$registro_puntos = new registro_puntos();
						$registro_puntos->setId($row['id']);
						$registro_puntos->setIdCliente($row['idCliente']);
						$registro_puntos->setFecha($row['fecha']);
						$registro_puntos->setReferencia($row['referencia']);
						$registro_puntos->setRfc($row['rfc']);
						$registro_puntos->setPuntos($row['puntos']);
						$registro_puntos->setEstado($row['estado']);

						array_push($lista_puntos, $registro_puntos);
					}
					$conn = null;
					return $lista_puntos;
				}
				else
					{
						echo "No se tiene ningun registro";
					}

				$conn = null;

			} catch (Exception $e) {
				
				echo "Error al encontrar registros";
				print_r($e);
			}

			return false;

		}

		function habilitar($registro_puntos)
		{

			try {

				$db = new db();
				$conn = $db->connection2();
				$query = "UPDATE registro_puntos SET estado = 1 where id= ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1, $registro_puntos->getId());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					echo "Registro de puntos habilitado";
					$conn = null;
					return true;
				}

				$conn = null;
				
			} catch (Exception $e) {
				
				echo "Error al habilitar el registro de puntos";
				print_r($e);
			}
			return false;
		}

		function quitar($registro_puntos)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "UPDATE registro_puntos SET estado = 0 where id = ?;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$registro_puntos->getId());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0 ) {

					echo "Registro deshabilitado exitosamente";
					$conn = null;
					return true;
				}
				$conn = null;

			} catch (Exception $e) {
				
				echo "Error al deshabilitar el registro de puntos";
				print_r($e);
			}
			return false;
		}
	}

?>