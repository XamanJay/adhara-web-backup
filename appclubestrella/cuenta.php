
<?php

require(realpath($_SERVER['DOCUMENT_ROOT']."/models/db.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/clienteController.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/canjeController.php"));
require(realpath($_SERVER['DOCUMENT_ROOT']."/controllers/registro_puntosController.php"));


session_start();
if(!isset($_SESSION['cliente'])){
	header("Location: index.php");
	return false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Clubestrella</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" type="image/png" href="img/club.png" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Roboto:300,400,500,700" rel="stylesheet">
	
</head>
<body background="img/fondo.jpg" >

	<?php include("partialViews/navbar.php"); ?>

	<div class="container">
		<div id="registro" class="col-xs-12 col-md-12">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="col-xs-7 col-md-7">
						<div class="row">
							<div class="col-xs-2 col-md-2">
								<img src="img/avatar.png" alt="hola" id="avatar-detalle">
							</div>
							<div class="col-xs-10 col-md-10">
								<h1 id="tittle-detalle"><?php echo $_SESSION['cliente']->getNombre()." ".$_SESSION['cliente']->getApellidoPaterno();?></h1>
							</div>
						</div>

					</div>
					<div class="col-xs-5 col-md-5">
						<div class="col-xs-5 col-md-5">
							<span class="puntoles ">
								<?php 
								$puntos = $_SESSION['cliente']->getPuntos();
								echo $puntos;
								?>

							</span>
						</div>
						<img src="img/bolas2.png" class="col-xs-3 col-md-3" style="margin-top: 5px;" alt="Puntos">
					</div>
				</div>
				<div class="col-xs-offset-7 col-md-offset-7 col-xs-5 col-md-5" style="margin-top: -30px;">
					<p style="color:white; line-height: 1.4; margin-left: 16px;">
						<strong>Email:</strong> <?php echo $_SESSION['cliente']->getEmail(); ?><br />
						<strong>Empresa:</strong> <?php echo $_SESSION['cliente']->getEmpresa(); ?><br />
						<strong>Número de socio:</strong> <?php echo $_SESSION['cliente']->getNumeroSocio(); ?><br />
						<strong>Fecha de registro:</strong> <?php 
						$fecha= date("d/m/Y",strtotime($_SESSION['cliente']->getFecha()));
						echo $fecha;
						?>
					</p>
				</div>
			</div>
			<br />
			<div class="row">

				<?php 

				$total = $_SESSION['cliente']->getPuntos();
				if ($total > 0){?>
				<span class="tituloazul" style="font-size: 20px; color: white;">Canjes</span><br />
				<div class="col-xs-12 col-md-12">
					<div class="row fierro">
						<div class="col-xs-2 col-md-2"><p class="blaqui">Fecha</p></div>
						<div class="col-xs-3 col-md-3"><p class="blaqui">Premio</p></div>
						<div class="col-xs-5 col-md-5"><p class="blaqui">Referencia</p></div>
						<div class="col-xs-2 col-md-2"><p class="blaqui almost">Puntos</p></div>
					</div>
					<div class="row flor">
						<div class="techo col-xs-12 col-md-12">													
							<?php 

							$canjeController = new canjeController();
							$row = $canjeController->getCanjes($_SESSION['cliente']->getId());
							if (empty($row)) {

								?>
								<div class="col-xs-12 col-md-12">
									<p style="color:black">NO TIENE CANJES POR EL MOMENTO</p>
								</div>
								<?php	
							}
							else{

								foreach ($row as $canje) {
									?>   
								
										<div class="col-xs-2 col-md-2">
											<p class="negri"><?php echo $canje->getFecha(); ?></p>
										</div>
										<div class="col-xs-3 col-md-3">
											<p class="negri"><?php echo $canje->getRepresentante(); ?></p>
										</div>
										<div class="col-xs-5 col-md-5">
											<p class="negri"><?php echo $canje->getNota(); ?></p>
										</div>
										<div class="col-xs-2 col-md-2">
											<p class="negri"><?php echo $canje->getPuntos(); ?></p>
										</div>
										
										<hr class="linea col-xs-12 col-md-12">
							<?php }} ?>
						
						</div>
					</div>
				</div>
				<br />	
				<?php } ?>
				<span class="tituloazul" style="font-size: 20px; color: white;">Puntos</span><br />
				<div class="col-xs-12 col-md-12">
					<div class="row fierro">
						<div class="col-xs-2 col-md-2"><p class="blaqui">Fecha</p></div>
						<div class="col-xs-5 col-md-5"><p class="blaqui">Referencia</p></div>
						<div class="col-xs-3 col-md-3"><p class="blaqui">RFC</p></div>
						<div class="col-xs-2 col-md-2"><p class="blaqui almost">Puntos</p></div>
					</div>
					<div class="row flor">
						<div class="techo col-xs-12 col-md-12">													
							<?php 
							$registro_puntosController = new registro_puntosController();

							$rows = $registro_puntosController->getPuntos($_SESSION['cliente']->getId());
							if(!empty($rows)){

								foreach ($rows as $puntos) {

									?>   
										<div class="col-xs-2 col-md-2">
											<p class="negri"><?php echo $puntos->getFecha(); ?></p>
										</div>
										<div class="col-xs-5 col-md-5">
											<p class="negri"><?php echo $puntos->getReferencia(); ?></p>
										</div>
										<div class="col-xs-3 cold-md-3">
											<p class="negri"><?php echo $puntos->getRfc(); ?></p>
										</div>
										<div class="col-xs-2 col-md-2">
											<p class="negri"><?php echo $puntos->getPuntos(); ?></p>
										</div>
										<hr class="linea col-xs-12 col-md-12">
									<?php 
								} 
							}

							?>
							<br>
						</div>
					</div>
				</div>
			</div> <!-- fin del row -->
			
		</div> <!-- termina div de 800px -->
	</div><!-- fin container -->
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/Concurrent.Thread.js"></script>
<script type="text/javascript" src="js/cierre-forzoso.js"></script>


</html>