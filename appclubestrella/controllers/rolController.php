<?php

require("../models/rol.php");

class rolController
{
	
	function __construct(){}

	function create($rol){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query= "SELECT * FROM roles WHERE Rol = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$rol->getRol());
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$conn == null;
				echo "El rol ya ha sido registrado.";
			}else{
				$query = "INSERT INTO roles(Rol) VALUES (?)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$rol->getRol());
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$conn == null;
					echo "Dado de alta exitoso";
					return true;
				}
				else
				{
					echo "Ocurrió un error al registrar Rol";
				}
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	//Encontrar el rol por ID
	function find($id){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM roles WHERE Id = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$rol = new rol();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$rol->setId($rows[0]['Id']);
				$rol->setRol($rows[0]['Rol']);
				$conn == null;
				return $rol;
			}
			else
			{
				echo "No se encontró el rol";
			}
			$conn == null;

		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}
	//Obtener el ID del rol
	function getId($data){
		try {
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * FROM Roles WHERE Rol = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":data",$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$persona = new persona();
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$conn == null;
				return $rows["Id"];
			}
			else
			{
				echo "No se encontró el rol";
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}
	//Encontrar el rol por cualquier dato que no sea el ID
	function getRol($data){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM roles WHERE Rol = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":data",$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$rol = new rol();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$rol->setId($rows[0]['Id']);
				$rol->setRol($rows[0]['Rol']);
				$conn == null;
				return $rol;
			}
			else
			{
				echo "No se encontró el rol";
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}


}


?>