<?php 
//require(realpath($_SERVER['DOCUMENT_ROOT']."/models/db.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/multimedia.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/Ftp/FtpClient.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/Ftp/FtpException.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/models/Ftp/FtpWrapper.php"));

class multimediaController{

	function getImg($idHotel,$seccion,$categoria,$idioma){
		try {

			// 1: Hotel Adhara, 2: Hotel Margaritas
			//seccion Home
			//categoria slider
			$isDeleted = FALSE;
			$db= new db();
			$conn = $db->connection();
			$query = "SELECT * FROM multimedia WHERE idHotel = ? AND seccion = ? AND categoria = ? AND idioma = ? AND isDeleted = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idHotel);
			$stmt->bindParam(2,$seccion);
			$stmt->bindParam(3,$categoria);
			$stmt->bindParam(4,$idioma);
			$stmt->bindParam(5,$isDeleted);
			$stmt->execute();
			$count = $stmt->rowCount();
			if ($count > 0) {
				if ($count == 1) {

					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					$multimedia = new multimedia();
					$lista = array();

					$multimedia->setId($row['id']);
					$multimedia->setIdHotel($row['idHotel']);
					$multimedia->setNombre($row['nombre']);
					$multimedia->setUrl($row['url']);
					$multimedia->setSeccion($row['seccion']);
					$multimedia->setCategoria($row['categoria']);
					$multimedia->setIdioma($row['idioma']);
					$multimedia->setResponsivo($row['responsivo']);
					$multimedia->setIsDeleted($row['isDeleted']);
					array_push($lista, $multimedia);
					$conn = NULL;
					return $lista;
				}
				else{

					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

					$lista = array();
					foreach ($rows as $row) {
						
						$multimedia = new multimedia();
						$multimedia->setId($row['id']);
						$multimedia->setIdHotel($row['idHotel']);
						$multimedia->setNombre($row['nombre']);
						$multimedia->setUrl($row['url']);
						$multimedia->setSeccion($row['seccion']);
						$multimedia->setCategoria($row['categoria']);
						$multimedia->setIdioma($row['idioma']);
						$multimedia->setResponsivo($row['responsivo']);
						$multimedia->setIsDeleted($row['isDeleted']);
						array_push($lista, $multimedia);
					}

					$conn = NULL;
					return $lista;
				}
			}

		} catch (Exception $e) {
			echo "Error al obtener imagenes de la BD.";
			print_r($e);
			
		}
	}

	public function postImg(){

		if (isset($_POST)) {
			if (isset($_POST['idHotel']) && isset($_POST['seccion']) && isset($_POST['categoria']) && isset($_POST['idioma'])) {

				print_r($_FILES['banner-home']);

				$dir_subida = realpath($_SERVER['DOCUMENT_ROOT']."/img/adhara/img_slider/");
				$fichero_subido = $dir_subida."/". basename($_FILES['banner-home']['name']);
				echo $fichero_subido."\n";
				echo '<pre>';
				if (move_uploaded_file($_FILES['banner-home']['tmp_name'], $fichero_subido)) {

				    echo "El fichero es válido y se subió con éxito.\n";

				} else {
				    echo "¡Posible ataque de subida de ficheros!\n";
				}

				echo 'Más información de depuración:';
				print_r($_FILES);

				print "</pre>";

				$ftpservername = "ftp.adharacancun.com";
				$ftpusername = "bersekeer@adharacancun.com";
				$ftppassword = "Harimakenji01@";
				$ftpdirectory = '/public_html/sitetest/img/slider-home/'; // leave blank
				$localdirectory = "/img/adhara/img_slider/";
				$ftpsourcefile = $_FILES['banner-home']['tmp_name'];
				$ftpdestinationfile = $ftpdirectory.$_FILES['banner-home']['name'];

				
				$conn_id = ftp_connect($ftpservername);
				if ( $conn_id == false )
				{
					echo "FTP open connection failed to $ftpservername \n" ;
					return false;
				}
				$login_result = ftp_login($conn_id, $ftpusername, $ftppassword);
				if ((!$conn_id) || (!$login_result)) {
					echo "FTP connection has failed!\n";
					echo "Attempted to connect to " . $ftpservername . " for user " . $ftpusername . "\n";
					
				} else {
					echo "Connected to " . $ftpservername . ", for user " . $ftpusername . "\n";
				}
				/*if ( strlen( $ftpdirectory ) > 0 )
				{
					if (ftp_chdir($conn_id, $ftpdirectory )) {
						echo "Current directory is now: " . ftp_pwd($conn_id) . "\n";

						$contents = ftp_nlist($conn_id, ".");

						// output $contents
						var_dump($contents);
					} else {
						echo "Couldn't change directory on $ftpservername\n";
						
					}
				}*/
				ftp_pasv ( $conn_id, true ) ;
				$upload = ftp_put( $conn_id, $ftpdestinationfile, $ftpsourcefile, FTP_BINARY );
				print_r($upload);
				if (!$upload) {
					echo "$ftpservername: FTP upload has failed!\n";
					
				} else {
					echo "Uploaded " . $ftpsourcefile . " to " . $ftpservername . " as " . $ftpdestinationfile . "\n";
				}
				ftp_close($conn_id);
				
				
			}
		}

	}

}

?>