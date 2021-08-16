<?php 

require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/db.php");
require(realpath($_SERVER['DOCUMENT_ROOT'])."/models/hotel.php");

class HotelsController{
	
	function createHotel($hotel){
		try {

			$db = new db();
			$conn = $db->connection();
			$query = "INSERT INTO hotels (name,address,phone) VALUES (?,?,?);";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$hotel->getName());
			$stmt->bindParam(2,$hotel->getAddress());
			$stmt->bindParam(3,$hotel->getPhone());
			$stmt->execute();
			$count= $stmt->rowCount();
			if ($count > 0) {
				$conn = null;
				echo "exito al agregar el hotel";
			}
			
		} catch (Exception $e) {
			
			echo "error al agregar el hotel <br>";
			print_r($e);
		}
	}

	function findHotel($id){
		try {
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT * FROM hotels WHERE id = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count >  0) {

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$hotel = new hotel();
				$hotel->setId($row['id']);
				$hotel->setName($row['name']);
				$hotel->setAddress($row['address']);
				$hotel->setPhone($row['phone']);

				$conn = null;
				return $hotel;
			}
		} catch (Exception $e) {
			echo "error al buscar el hotel <br>";
			print_r($e);
		}
	}
}

?>