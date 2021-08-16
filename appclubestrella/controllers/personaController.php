<?php
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/persona.php"));

class personaController
{
	
	function __construct(){}

	function create($persona){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query= "SELECT * FROM users WHERE Username = ? OR Email = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$persona->getUsername());
			$stmt->bindParam(2,$persona->getEmail());
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$conn == null;
				echo "El correo o el nombre de usuario ya han sido registrados.";
			}else{

				$persona->setId(uniqid("user_",true));
				$query = "INSERT INTO users(Id, Username, Email,Password) VALUES (?,?,?,AES_ENCRYPT('".$persona->getPassword()."','test'))";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$persona->getId());
				$stmt->bindParam(2,$persona->getUsername());
				$stmt->bindParam(3,$persona->getEmail());
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$query = "INSERT INTO personas(Id, Nombre, Apellido_paterno,Apellido_materno) VALUES (?,?,?,?)";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$persona->getId());
					$stmt->bindParam(2,$persona->getNombre());
					$stmt->bindParam(3,$persona->getApellidoPaterno());
					$stmt->bindParam(4,$persona->getApellidoMaterno());
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0)
					{
						$conn == null;
						echo "Dado de alta exitoso";
						return true;
					}
				}
				$conn == null;
			}
		} catch (Exception $e) {
			echo "Ocurrió un error al registrar Persona, faltaron algunos datos o hubo un problema con la conexión a la base de datos.";
			$this->abort($cliente->getId());
			print_r($e);
		}
		return false;

	}

	//Obtener el ID del usuario por Email o Username
	function getId($data){
		try {
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * FROM users WHERE Username = :data OR Email = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":data",$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				$conn == null;
				return $rows["Id"];
			}
			else
			{
				echo "No se encontró usuario";
			}
			$conn == null;

		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	//Encontrar la persona por ID
	function find($id){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM personas WHERE Id = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$persona = new persona();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$persona->setNombre($rows[0]['Nombre']);
				$persona->setApellidoPaterno($rows[0]['Apellido_paterno']);
				$persona->setApellidoMaterno($rows[0]['Apellido_materno']);

				$query = "SELECT * FROM users WHERE Id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$id);
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$persona->setId($rows[0]['Id']);
					$persona->setUsername($rows[0]['Username']);
					$persona->setEmail($rows[0]['Email']);
					$conn == null;
					return $persona;
				}
				else
				{
					echo "No se encontró usuario";
				}
			}
			else
			{
				echo "No se encontró persona";
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	//Encontrar el usuario por cualquier dato que no sea el ID
	function getPersona($data){
		try {
			$db = new db();
			$conn = $db->connection2();
			$query = "SELECT * FROM users WHERE Username = :data OR Email = :data ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(":data",$data);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$persona = new persona();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$persona->setId($rows[0]['Id']);
				$persona->setUsername($rows[0]['Username']);
				$persona->setEmail($rows[0]['Email']);

				$query = "SELECT * FROM personas WHERE id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$persona->getId());
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$persona->setNombre($rows[0]['Nombre']);
					$persona->setApellidoPaterno($rows[0]['Apellido_paterno']);
					$persona->setApellidoMaterno($rows[0]['Apellido_materno']);
					$conn == null;
					return $persona;
				}
				else
				{
					echo "No se encontró persona";
				}
			}
			else
			{
				echo "No se encontró usaurio";
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	function rol_user($user_id, $rol_id){
		try {
			
			$db = new db();		
			$conn = $db->connection2();
			$query = "INSERT INTO rol_user(User_id, Rol_id) VALUES (?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$user_id);
			$stmt->bindParam(2,$rol_id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$conn == null;
				return true;
			}
			$conn == null;
		} catch (Exception $e) {
			print_r($e);
		}
		return false;

	}
	function abort($id){
		try {
			
			$db = new db();		
			$conn = $db->connection2();
			$query = "DELETE FROM users WHERE Id = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$conn == null;
				return true;
			}
		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}


}

?>