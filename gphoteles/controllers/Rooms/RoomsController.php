<?php 

//require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/room.php");

class RoomsController{

	function createRoom($room){
		try {
			$db = new db();
			$conn = $db->connection();
			$query = "INSERT INTO rooms (idHotel,capMax,type,category,priority,description,quantity,kidsAllow,isDeleted) VALUES (?,?,?,?,?,?,?,?,?);";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$room->getIdHotel());
			$stmt->bindParam(2,$room->getCapMax());
			$stmt->bindParam(3,$room->getEnumType());
			$stmt->bindParam(4,$room->getEnumCategory());
			$stmt->bindParam(5,$room->getPriority());
			$stmt->bindParam(6,$room->getDescrip());
			$stmt->bindParam(7,$room->getQuantity());
			$stmt->bindParam(8,$room->getKidsAllow());
			$stmt->bindParam(9,$room->getIsDeleted());
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$conn = false;
				echo "Cuarto se agrego correctamente";
				return true;

			}
		} catch (Exception $e) {
			echo "error al agregar el cuarto <br>";
			print_r($e);
		}
	}

	function getRoom($id , $idHotel){
		try {
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * FROM rooms WHERE id = ? AND idHotel = ? AND isDeleted= ?";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->bindParam(2,$idHotel);
			$stmt->bindParam(3,0);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$room = new rooms();
				$room->setId($row['id']);
				$room->setIdHotel($row['idHotel']);
				$room->setCapMax($row['capMax']);
				$room->setType($row['type']);
				$room->setCategory($row['category']);
				$room->setPriority($row['priority']);
				$room->setDescrip($row['description']);
				$room->setQuantity($row['quantity']);
				$room->setKidsAllow($row['kidsAllow']);
				$room->setIsDeleted($row['isDeleted']);

				$conn=false;
				return $cuarto;

			}
		} catch (Exception $e) {
			
			echo "error al obtener el cuarto <br>";
			print_r($e);
		}
	}

	function getRooms($idHotel){

		try {
			$db= new db();
			$conn = $db->connection();
			$query="SELECT * FROM rooms WHERE idHotel = ? AND isDeleted = ?";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idHotel);
			$stmt->bindParam(2,0);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$rows = $stmt->fetchAll(PDO:: FETCH_ASSOC);
				$lista = array();
				foreach ($rows as $row) {

					$room = new rooms();
					$room->setId($row['id']);
					$room->setIdHotel($row['idHotel']);
					$room->setCapMax($row['capMax']);
					$room->setType($row['type']);
					$room->setCategory($row['category']);
					$room->setPriority($row['priority']);
					$room->setDescrip($row['description']);
					$room->setQuantity($row['quantity']);
					$room->setKidsAllow($row['kidsAllow']);
					$room->setIsDeleted($row['isDeleted']);
					array_push($lista, $room);

				}
				$conn = false;
				return $lista;
			}

		} catch (Exception $e) {
			
		}

	}
}


?>