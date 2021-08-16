<?php 

require (realpath($_SERVER['DOCUMENT_ROOT']."/models/canjes.php"));


class canjeController{

	function create($canje){
		
		try
		{

			$db = new db();
			$conn = $db->connection2();
			$query = "INSERT into canjes (idCliente,fecha,representante,nota,puntos,estado) VALUES (?,?,?,?,?,?); CALL sumatoria('".$canje->getIdCliente()."');";
			$stmt = $conn->prepare($query);
			$stmt->bindparam(1,$canje->getIdCliente());
			$stmt->bindparam(2,$canje->getFecha());
			$stmt->bindParam(3,$canje->getRepresentante());
			$stmt->bindParam(4,$canje->getNota());
			$stmt->bindparam(5,$canje->getPuntos());
			$stmt->bindparam(6,$canje->getEstado());

			$stmt->execute();
			$count= $stmt->rowcount();
			if ($count > 0) {
				$lastId = $conn->lastInsertId();
				$conn = null;
				return $lastId;

			}
			
		} catch (Exception $e) {

			echo "Ocurrió un error al registrar el canje.";
			print_r($e);
			
		}
		return false;
	}

	function getId($data)
	{

		try {

			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT id FROM canjes WHERE idCliente = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindparam(1,$data);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$lista_id= array();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $row) {

					array_push($lista_id, $row['id']);
				}
				$conn = null;
				return $lista_id;
			}

			else
				echo "Error al obtener el id";

			$conn = null;
			
		} catch (Exception $e) {
			
			echo "Error en kla consulta para obtener el id del canje";
			print_r($e);
		}

		return false;
	}

	function getCanjes($idCliente)
	{

		try {

			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * from canjes where idCliente = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindparam(1,$idCliente);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {
				$lista = array();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $row) {
					# code...
					$canje = new canjes();
					$canje->setId($row['id']);
					$canje->setIdCliente($row['idCliente']);
					$canje->setFecha($row['fecha']);
					$canje->setPuntos($row['puntos']);
					$canje->setEstado($row['estado']);
					$canje->setNota($row['nota']);
					$canje->setRepresentante($row['representante']);

					array_push($lista, $canje);
				}

				$conn = null;
				return $lista;

			}
			else{
				return false;
			}
			$conn = null;
		} catch (Exception $e) {
			
			print_r($e);
		}
		return false;
	}

	function canje_premio($canje_id,$premio_id){

		try {
			
			$db = new db();
			$conn = $db->connection2();
			$query = "INSERT into canje_premio(canje_id,premio_id) VALUES (?,?);";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$canje_id);
			$stmt->bindParam(2,$premio_id);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$conn = null;
				return true;
			}
			$conn = null;
		} catch (Exception $e) {
			
			echo "error al agregar canje_premio";
			print_r($e);
		}
		return false;
	}

	function Find_canje_premio($canje_id){

		try {
			
			$premios = array();

			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT premio_id FROM canje_premio WHERE canje_id = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$canje_id);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $row) {
					# code...
					$premio = $row['premio_id'];
					array_push($premios, $premio);
				}

				$conn = null;
				return $premios;
			}
			$conn = null;
		} catch (Exception $e) {
			
			echo "error al agregar canje_premio";
			print_r($e);
		}
		return false;
	}


}

?>