<?php

	require ("../models/premio.php");

	class premioController
	{

		function create($premio)
		{
			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "INSERT into premios(premio,puntos,estado) VALUES (?,?,?);";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$premio->getNombre());
				$stmt->bindParam(2,$premio->getPuntos());
				$stmt->bindparam(3,$premio->getEstado());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {
					
					echo "Premio agregado exitosamente";
					$conn = null;
					return true;
				}
				else{

					echo "Error con el premio";


				}
				$conn= null;


			} catch (Exception $e) {

				echo "Error al agregar el premio";
				print_r($e);
				
			}
			return false;
		}

		function getPremio($data)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "SELECT * FROM premios where id= ? AND estado=1;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$data);
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					$premio = new premios();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$premio->setId($row['id']);
					$premio->setNombre($row['premio']);
					$premio->setPuntos($row['puntos']);
					$premio->setEstado($row['estado']);
					$conn = null;
					return $premio;

				}
				else{

					echo "No se encontro el premio";
				}

				$conn=null;

			} catch (Exception $e) {
				
				echo "Error en la consulta de premios";
				print_r($e);
			}

			return false;

		}

		function getPremios()
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "SELECT premio from premios;";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					$lista = array();
					$rows = $stmt->fetchAll(PDO:: FETCH_ASSOC);
					foreach ($rows as $row) {
						
						$premio = new premios();
						$premio->setNombre($row['premio']);

						array_push($lista, $premio);
					}
					$conn = null;
					return $lista;
				}
				$conn = null;

			} catch (Exception $e) {

				echo "Error al obtener los premios";
				print_r($e);
				
			}
			return false;
		}

		function getId($data)
		{

			try {

				$db= new db();
				$conn = $db->connection2();
				$query = "SELECT id from premios where premio = ?;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$data);
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0 ) {
					
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$conn == null;
					return $row["id"];
				}
				else
					echo "Error al obtener el id del producto";

				$conn = null;
				
			} catch (Exception $e) {
				
				echo "Error al obtener el id del producto";
			}

			return false;

		}

		function quitar($premio)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "UPDATE premios SET estado= 0 WHERE id = ? ";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$premio->getId());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {
					
					echo "Premio borrado";
					$conn= null;
					return true;
				}
				else
				{
					echo "Error al borra premio";

				}
				$conn = null;

			} catch (Exception $e) {
				
				echo "Error al actualizar premios";
				print_r($e);
			}
			return false;
		}

		function habilitar($premio)
		{

			try {
				
				$db = new db();
				$conn = $db->connection2();
				$query = "UPDATE premios SET estado = 1 WHERE id =?;";
				$stmt = $conn->prepapre($query);
				$stmt->bindParam(1,$premio->getId());
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					echo "Premio habilitado";
					$conn = null;
					return true;
				}
				else
					echo "Error al habilitar el premio";

				$conn = null;


			} catch (Exception $e) {
			
				echo "Error en la consulta para habilitar premio";
				print_r($e);

			}
			return false;
		}

	}



?>