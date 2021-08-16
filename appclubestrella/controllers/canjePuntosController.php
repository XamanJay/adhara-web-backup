<?php

require(realpath($_SERVER['DOCUMENT_ROOT']."/models/canjePuntos.php"));

class canjePuntosController{

	function canjes($idCliente)
	{
		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * FROM  adhara_canjes WHERE idu=?  AND borrado=0 ORDER BY fecha DESC;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idCliente);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {

				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$lista = array();
				foreach ($rows as $row) {

					$canje = new canje();
					$canje->setFecha(date("d/m/Y",strtotime($row['fecha'])));
					$canje->setPremio($row['premio']);
					$canje->setNota($row['nota']);
					$canje->setPuntos($row['puntos']);

					array_push($lista, $canje);


				
				}
				return $lista;
				
			}
			else{

				$lista=" ";
				return $lista;
			}

			$conn == null;

		} catch (Exception $e) {
			
			echo "Error al obtener canjes del cliente";
			print_r($e);
		}

		return false;
	}

	function puntos($idCliente){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * from adhara_puntos where idc=? and borrado=0 and canjeado=0 order by fecha desc;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idCliente);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {

				$rows = $stmt->fetchAll(PDO:: FETCH_ASSOC);
				$lista = array();
				foreach ($rows as $row) {

					$puntos = new puntos();
					$puntos->setFecha(date("d/m/Y",strtotime($row['fecha'])));
					$puntos->setInvoice($row['invoice']);
					$puntos->setRfc($row['rfc']);
					$puntos->setTotal($row['total']);

					array_push($lista, $puntos);

				}
				return $lista;
			}

			$conn ==null;

		} catch (Exception $e) {
			
			echo "Error al obtener los puntos del cliente";
			print_r($e);
		}

		return false;

	}

}



?>