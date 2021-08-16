<?php 
echo realpath($_SERVER['DOCUMENT_ROOT']);
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/db.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/cliente.php"));

if (isset($_POST['exit'])) {
	session_start();
	unset($_SESSION["cliente"]);
	header( "Location: ../index.php" );
}
else
{

	if ($_POST) {

		if (isset($_POST['username']) && isset($_POST['password']) ) 
		{

			session_start();
			try {

				$db = new db();
				$conn = $db->connection2();
				$query = "SELECT * FROM users where Username = :username OR  Email = :username AND Password = AES_ENCRYPT(:password,'test')  AND IsDeleted = 0;";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(":username",$_POST['username']);
				$stmt->bindParam(":password",$_POST['password']);
				$stmt->execute();
				$count = $stmt->rowcount();
				if ($count > 0) {

					$cliente = new cliente();
					$rows = $stmt->fetch(PDO::FETCH_ASSOC);
					$cliente->setId($rows['Id']);
					$cliente->setUsername($rows['Username']);
					$cliente->setEmail($rows['Email']);

					$query = "SELECT * FROM personas WHERE id = ? ;";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(1,$cliente->getId());
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count > 0)
					{
						$rows = $stmt->fetch(PDO::FETCH_ASSOC);
						$cliente->setNombre($rows['Nombre']);
						$cliente->setApellidoPaterno($rows['Apellido_paterno']);
						$cliente->setApellidoMaterno($rows['Apellido_materno']);

						$query = "SELECT * FROM clientes WHERE id = ? ;";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(1,$cliente->getId());
						$stmt->execute();
						$count = $stmt->rowCount();
						if($count > 0)
						{
							$rows = $stmt->fetch(PDO::FETCH_ASSOC);
							$cliente->setNumeroSocio($rows['NumeroSocio']);
							$cliente->setPuntos($rows['Puntos']);
							$cliente->setEmpresa($rows['Empresa']);
							$cliente->setTelefono($rows['Telefono']);
							$cliente->setPais($rows['Pais']);
							$cliente->setCiudad($rows['Ciudad']);
							$cliente->setEstado($rows['Estado']);
							$cliente->setFecha($rows['Fecha']);
							$cliente->setCodigoPostal($rows['CodigoPostal']);
							$cliente->setDireccion($rows['Direccion']);
							$_SESSION["cliente"] = $cliente;
							$conn == null;
							header( "Location: ../qrcode.php");
						}
					}

				}
				else
				{
					unset($_SESSION["cliente"]);
					echo'<script type="text/javascript">
						alert("Usuario o Password escritos incorrectamente");
						window.location="https://appclubestrella.adharacancun.com"
						</script>';
					//header( "Location: ../index.php" );

				}
				$conn = null;

			} catch (Exception $e) {

				echo "error al buscar usuario";
				print_r($e);
			}
		}
		else
		{
			echo "NOT FOUND1";
		}
	}
	else{

		echo "NOT FOUND2";
	}


}

?>