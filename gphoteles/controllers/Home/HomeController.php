<?php 

/**
* 
*/
class HomeController
{
	
	function __construct()
	{
	}

	public function anyIndex(){

		include "views/Home/index.php";
	}

	public function getHome(){
		include "views/Home/index.php";
	}

	public function getPanel(){
		session_start();
		if (isset($_SESSION['user'])) {
			include "views/Panel/index.php";
		}
		else{
			header( "Location: /login" );
		}
	}
	
	public function getFormula(){
		include "views/Home/formula.php";
	}

	public function getLogin(){
		session_start();
		if (!isset($_SESSION['user'])) {
			$token = hash("sha512", rand(-999,time())."5oYUnTr0L^");
			unset($_SESSION["token"]);
			$_SESSION['token'] = $token;
			/*try {
				$correo = "gerencia.recepcion@gphoteles.com";
				$password = "Gerencia31+";
				$nombre = "Jorge";
				$db = new db();
				$conn = $db->connection();
				$query = "INSERT INTO administrators (correo,password,nombre) VALUES (:correo,AES_ENCRYPT(:password,'gphoteles'),:nombre)";
				$stmt = $conn->prepare($query);
				$stmt->bindParam(":correo",$correo);
				$stmt->bindParam(":password",$password);
				$stmt->bindParam(":nombre",$nombre);
				$stmt->execute();
				$count = $stmt->rowCount();
				if ($count > 0) {
					echo "Exito al agregar administrador";
					$conn = null;
				}

			} catch (Exception $e) {
					print_r($e);
			}*/
			include ("views/Panel/login.php");
		}
		else{
			header("Location: /panel");
		}
		
	}

	public function postLogin(){

		if (isset($_POST)) {
			session_start();
			if (strcmp($_SESSION['token'], $_POST['key']) == 0) {

				if (isset($_POST['username']) && isset($_POST['password'])) {
					try {
						if(!file_exists("log.txt")){

							$file = fopen("log.txt", "w");
							fwrite($file, "-- Inicio de log --". PHP_EOL);
							fclose($file);
						}

						$db = new db();
						$conn = $db->connection();
						$query = "SELECT * FROM administrators WHERE correo = :username AND password = AES_ENCRYPT(:password,'gphoteles') AND isDeleted = 0;";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(":username",$_POST['username']);
						$stmt->bindParam(":password",$_POST['password']);
						$stmt->execute();
						$count = $stmt->rowCount();
						if ($count > 0) {
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							$admin = new users();
							$admin->setId($row['id']);
							$admin->setCorreo($row['correo']);
							$admin->setAdmin($row['nombre']);

							$file = fopen("log.txt", "a");
							fwrite($file, $admin->getAdmin()."(".$admin->getCorreo().") inició sesion: ".date("Y-m-d H:i:s",time()).PHP_EOL);
							fclose($file);

							$_SESSION['user'] = $admin;
							$conn = null;

							echo json_encode(array('type' => "success" ,"message" => "" ));
							return false;
						}
						else{
							$file = fopen("log.txt", "a");
							fwrite($file, $_POST['username']." intentó iniciar sesion ".date("Y-m-d H:i:s",time()).PHP_EOL);
							fclose($file);
							echo json_encode(array("type" => "error", "message" => "Email o password incorrectos."));
						}
					} catch (Exception $e) {
						$file = fopen("log.txt", "a");
						fwrite($file, "Error en el Login: ".$e." -Fecha: ".date("Y-m-d H:i:s",time()).PHP_EOL);
						fclose($file);
						echo json_encode(array("type" => "error", "message" => "Ocurrió un problema al intentar iniciar sesion póngase en contacto con soporte programacionweb@gphoteles.com."));
					}
				}
			}
		}
	}

	public function getLogoff(){
		session_start();
		unset($_SESSION["user"]);

		header( "Location: /login" );
	}

}

?>