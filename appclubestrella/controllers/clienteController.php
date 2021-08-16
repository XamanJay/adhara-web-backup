<?php
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/cliente.php"));

class clienteController
{
	
	function __construct(){}

	function create($cliente){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query= "SELECT * FROM users WHERE Username = ? OR Email = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$cliente->getUsername());
			$stmt->bindParam(2,$cliente->getEmail());
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				$conn == null;
				echo "<label style='color:red;'>El correo o el nombre de usuario ya han sido registrados.</label>";
			}else{

				$cliente->setId(uniqid("user_",true));
				$query = "INSERT INTO users(Id, Username, Email,Password) VALUES (?,?,?,AES_ENCRYPT('".$cliente->getPassword()."','test'));";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$cliente->getId());
				$stmt->bindParam(2,$cliente->getUsername());
				$stmt->bindParam(3,$cliente->getEmail());
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$query = "INSERT INTO personas(Id, Nombre, Apellido_paterno,Apellido_materno) VALUES (?,?,?,?);";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$cliente->getId());
					$stmt->bindParam(2,$cliente->getNombre());
					$stmt->bindParam(3,$cliente->getApellidoPaterno());
					$stmt->bindParam(4,$cliente->getApellidoMaterno());
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0)
					{
						$query = "INSERT INTO clientes(Id, Puntos, NumeroSocio, Empresa, Telefono, Pais, Ciudad, Estado, CodigoPostal, Direccion, Fecha) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(1,$cliente->getId());
						$stmt->bindParam(2,$cliente->getPuntos());
						$stmt->bindParam(3,$cliente->getNumeroSocio());
						$stmt->bindParam(4,$cliente->getEmpresa());
						$stmt->bindParam(5,$cliente->getTelefono());
						$stmt->bindParam(6,$cliente->getPais());
						$stmt->bindParam(7,$cliente->getCiudad());
						$stmt->bindParam(8,$cliente->getEstado());
						$stmt->bindParam(9,$cliente->getCodigoPostal());
						$stmt->bindParam(10,$cliente->getDireccion());
						$stmt->bindParam(11,$cliente->getFecha());
						$stmt->execute();
						$count = $stmt->rowCount();
						if($count > 0)
						{
							$conn == null;
							echo "<label style='color:green;'>Dado de alta exitoso</label>";
							return true;
						}
					}
				}
				$conn == null;
			}
		} catch (Exception $e) {
			$this->abort($cliente->getId());
			echo "Ocurrió un error al registrar Cliente, faltaron algunos datos o hubo un problema con la conexión a la base de datos.";
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

	//Encontrar el cliente por ID
	function find($id){
		try {
			$db = new db();		
			$conn = $db->connection2();
			$query = "SELECT * FROM clientes WHERE Id = ? ;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{	
				$cliente = new cliente();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$cliente->setEmpresa($rows[0]['NumeroSocio']);
				$cliente->setPuntos($rows[0]['Puntos']);
				$cliente->setEmpresa($rows[0]['Empresa']);
				$cliente->setTelefono($rows[0]['Telefono']);
				$cliente->setPais($rows[0]['Pais']);
				$cliente->setCiudad($rows[0]['Ciudad']);
				$cliente->setEstado($rows[0]['Estado']);
				$cliente->setCodigoPostal($rows[0]['CodigoPostal']);
				$cliente->setDireccion($rows[0]['Direccion']);

				$query = "SELECT * FROM personas WHERE Id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$id);
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{	
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$cliente->setNombre($rows[0]['Nombre']);
					$cliente->setApellidoPaterno($rows[0]['Apellido_paterno']);
					$cliente->setApellidoMaterno($rows[0]['Apellido_materno']);

					$query = "SELECT * FROM users WHERE Id = ? ;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$id);
					$stmt->execute();
					$count = $stmt->rowCount();

					if($count > 0)
					{
						$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$cliente->setId($rows[0]['Id']);
						$cliente->setUsername($rows[0]['Username']);
						$cliente->setEmail($rows[0]['Email']);
						$conn == null;
						return $cliente;
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
			}
			else
			{
				echo "No se encontró cliente";

			}
			$conn == null;

		} catch (Exception $e) {
			print_r($e);
		}
		return false;
	}

	//Encontrar el usuario por cualquier dato que no sea el ID
	function getCliente($data){
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
				$cliente = new cliente();
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$cliente->setId($rows[0]['Id']);
				$cliente->setUsername($rows[0]['Username']);
				$cliente->setEmail($rows[0]['Email']);

				$query = "SELECT * FROM personas WHERE id = ? ;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(1,$cliente->getId());
				$stmt->execute();
				$count = $stmt->rowCount();
				if($count > 0)
				{
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$cliente->setNombre($rows[0]['Nombre']);
					$cliente->setApellidoPaterno($rows[0]['Apellido_paterno']);
					$cliente->setApellidoMaterno($rows[0]['Apellido_materno']);

					$query = "SELECT * FROM clientes WHERE id = ? ;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$cliente->getId());
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0)
					{
						$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$cliente->setEmpresa($rows[0]['NumeroSocio']);
						$cliente->setPuntos($rows[0]['Puntos']);
						$cliente->setEmpresa($rows[0]['Empresa']);
						$cliente->setTelefono($rows[0]['Telefono']);
						$cliente->setPais($rows[0]['Pais']);
						$cliente->setCiudad($rows[0]['Ciudad']);
						$cliente->setEstado($rows[0]['Estado']);
						$cliente->setCodigoPostal($rows[0]['CodigoPostal']);
						$cliente->setDireccion($rows[0]['Direccion']);
						$conn == null;
						return $cliente;
					}
					else
					{
						echo "No se encontró cliente";
					}
				}
				else
				{
					echo "No se encontró persona";
				}
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
		} catch (Exception $e) {
			print_r($e);
		}
		return false;

	}

	function fecha($id){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT fecha from clientes where Id= ?";
			$stmt =$conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$datetime = $row['fecha'];
				$conn = null;
				$date = date("d/m/Y",strtotime($datetime));
				return $date;
			}

		} catch (Exception $e) {

			echo "Error al convertir la fecha";
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


	/*  VIEJA BASE DE DATOS */
	
	function old_fecha($fecha){

		try {
			
			$db = new db();
			$conn = $db->connection();
			$query = "SELECT fecha from adhara_clientes where idc= ?";
			$stmt =$conn->prepare($query);
			$stmt->bindParam(1,$fecha);
			$stmt->execute();
			$count = $stmt->rowcount();
			if ($count > 0) {

				$row = $stmt->fetch(PDO:: FETCH_ASSOC);
				$datetime = $row['fecha'];
				$conn = null;
				$date = date("d/m/Y",strtotime($datetime));
				return $date;
			}

		} catch (Exception $e) {

			echo "Error al convertir la fecha";
			print_r($e);
		
		}
		return false;
	}

	function puntostot($idCliente){

		try {

			$db = new db();
			$conn = $db->connection();
			$query = "SELECT sum(total) as cuantos from adhara_puntos where idc= ? and borrado=0 and canjeado=0";
			$stmt = $conn ->prepare($query);
			$stmt->bindParam(1,$idCliente);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {

					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$totalpoints=$row["cuantos"];
				

					$query2 = "SELECT sum(puntos) as cuantos from adhara_canjes where idu=?";
					$stmt = $conn->prepare($query2);
					$stmt->bindParam(1,$idCliente);
					$stmt->execute();
					$count2 = $stmt->rowCount();
					if ($count2 > 0) {

						$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
						$totalcanje = $row2['cuantos'];
						$totalpuntos=$totalpoints-$totalcanje;
						if ($totalpuntos <= 0) {
							
							$totalpuntos==0;
							return $totalpuntos;
						}
						else{
							return $totalpuntos;


						}
					}
					else
					{
						$totalcanje==0;
						$totalpuntos=$totalpoints-$totalcanje;

					}
				
			}

		$conn == null;

		} catch (Exception $e) {
			
			echo "Error al mostrar los puntos";
			print_r($e);
		}

		return false;

	}

	
							

}

?>