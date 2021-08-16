<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "partial_views/styles.php" ?>
	<style>
		#contenido {
	    	background-image: url(../img/plecas.png);
	    	background-size: cover;
		}
	</style>
</head>
<body>

<?php include "lang/languaje.php"; ?>
<?php include "partial_views/navbar.php" ?>
<?php include "partial_views/socialMedia.php" ?>
<?php include "partial_views/slider_home.php" ?>
<?php include "partial_views/buscador.php" ?>

<section id="contenido">
	<div class="container margenD" style="text-align: center;">
		<?php 	
			if($_GET){

				if($_GET['estatus'] == "aceptado"){

					if($_GET['msg'] = "Cancelled"){

						echo '
						<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Sigue navegando en <br> </h1>
						<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">Hotel Adhara Hacienda Cancún!</h1>
						<p style="margin-bottom: 60px;">El número de referencia es: <strong id="referencia">No se Generó</strong></p>
						<p style="margin-bottom: 60px;">Mensaje: <strong id="referencia">Se canceló la transacción.</strong></p>';

					}
					else{

						echo '
						<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">¡Gracias por comprar en <br> </h1>
						<h1 style="font-weight: 400;margin-top: 0px;margin-bottom: 45px;" class="f-tra">Hotel Adhara Hacienda Cancún!</h1>
						<p style="margin-bottom: 60px;">Hemos recibido su solicitud, en breve recibirá un correo con <br> información  detallada  sobre su reservación.</p>
						<p style="margin-bottom: 60px;">El número de referencia es: <strong id="referencia">'.$_GET['order'].'</strong></p>
						<p style="margin-bottom: 60px;">Mensaje: <strong id="referencia">'.$_GET['msg'].'</strong></p>
						';
						if($_GET['txn'] != "7" && $_GET['txn'] != "No Value Returned"){

							echo '
								<p style="margin-bottom: 60px;">El número de autorización es: <strong id="referencia">'.$_GET['id'].'</strong></p>
							';
						}
						echo '<a href="/" id="backHome">Regresar</a>';
					}
				}
				else{

					echo '
						<h1 style="font-weight: 400;margin-top: 15px;margin-bottom: 0px;" class="f-tra">Ha ocurrido un problema</h1>
						<p style="margin-bottom: 60px;">El cargo a su tarjeta fue rechazádo por el banco, por favor verifique sus datos e intente de nuevo.</p>
						<p style="margin-bottom: 60px;">Mensaje: <strong id="referencia">'.$_GET['msg'].'</strong></p>
						<a href="/" id="backHome">Regresar</a>
					';
				}
			}
		?>
	</div>
</section>


<?php include "partial_views/footer.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.min.js"></script>
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/moment/locale/es.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/script-admin.js"></script>

</body>
</html>