<?php 
class EditController{

	public function getEditar($id)
	{
		$idReserva = $id;
		try {

			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * FROM reservations WHERE id = ? AND isDeleted = 0;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idReserva);
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
				$reserva->setIdOpera($row['idOpera']);
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
						//print_r($reserva);
					}
				}
			}
		} catch (Exception $e) {
			echo "Error al obtener la reserva. <br>";
			print_r($e);
		}

		session_start();
		if (isset($_SESSION['user'])) {
			include ("views/Edit/index.php");
		}
		else
			include "views/Home/index.php";
		
	}

}

?>