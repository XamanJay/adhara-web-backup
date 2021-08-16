<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Santander-response Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="/css/404.min.css">

</head>
<body style="background-image: url('/img/background.png');">

	<?php include "lang/languaje.php"; ?>	

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<?php include "views/partial_views/_redes.php"; ?>
	<style>
		h1{
			font-weight: 400;
		}
	</style>
	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>
		
		<div class="container">
			
			<div  id="wrapper-content" style="padding-top: 60px;">

				<?php

	            if($response["success"])
	            {

	                if(strcmp($response["nbResponse"], "Aprobado") == 0 )
	                {
	                    //print_r($response);
	                    echo '<div class="col-md-8 offset-md-2" style="margin-top:80px;">
	                    <img src="/img/icons/success.svg" class="img-responsive" alt="" style="width: 200px; display:block;margin:0px auto;">
	                    <img src="/img/icons/line-error.svg" class="img-responsive" alt="">
	                    <p class="error_">';

	                    if(strcmp($_COOKIE["Lang"], "en") == 0 )
	                    {
	                        echo 'Payment status: <b>'.$response["nbResponse"].' </b><br>
	                        Authorization number: <b>'.$response["nuAut"].'</b><br>
	                        Reference number: <b>'.$response["referenciaPayment"].'</b></br></br>
	                        We have received your request, you will receive an email shortly with detailed information about your reservation.</br>
	                        </div>';
	                    }
	                    else if(strcmp($_COOKIE["Lang"], "es") == 0)
	                    {
	                        echo 'Estado de pago: <b>'.$response["nbResponse"].' </b><br>
	                        Número de autorización: <b>'.$response["nuAut"].'</b><br>
	                        El número de referencia de pago es: <b>'.$response["referenciaPayment"].'</b></br></br>
	                        Hemos recibido su solicitud, en breve recibirá un correo con información detallada sobre su reservación.</br>
	                        </div>';
	                    }
	                    else
	                    {
	                        echo 'Estado de pago: <b>'.$response["nbResponse"].' </b><br>
	                        Número de autorización: <b>'.$response["nuAut"].'</b><br>
	                        El número de referencia de pago es: <b>'.$response["referenciaPayment"].'</b></br></br>
	                        Hemos recibido su solicitud, en breve recibirá un correo con información detallada sobre su reservación.</br>
	                        </div>';
	                    }

	                }
	                else
	                {
	                    echo '<div class="col-md-8 offset-md-2" style="margin-top:80px;">
	                    <img src="/img/icons/caution-error.svg" class="img-responsive" alt="" style="width: 200px; display:block;margin:0px auto;">
	                    <img src="/img/icons/line-error.svg" class="img-responsive" alt="">
	                    <p class="error_">';
	                    if(strcmp($_COOKIE["Lang"], "en") == 0 )
	                    {
	                        echo 'A problem has occurred: <b>'.$response["cdResponse"].'</b></br>';
	                        if(isset($response['nb_error']))
	                        {
	                            echo $response['nb_error'].'</br>';
	                        }
	                        else
	                        {
	                            echo 'The charge to your card was rejected by the bank, please verify your data and try again.</br>';
	                        }
	                        echo '</br>
	                        </div>';
	                    }
	                    else if(strcmp($_COOKIE["Lang"], "es") == 0)
	                    {

	                        echo 'Ha ocurrido un problema: <b>'.$response["cdResponse"].'</b></br>';
	                        if(isset($response['nb_error']))
	                        {
	                            echo $response['nb_error'].'</br>';
	                        }
	                        else
	                        {
	                            echo 'El cargo a su tarjeta fue rechazado por el banco, por favor verifique sus datos e intente de nuevo.</br>';
	                        }
	                        echo '</br>
	                        </div>';

	                    }
	                    else
	                    {
	                        echo 'A problem has occurred: <b>'.$response["cdResponse"].'</b></br>';
	                        if(isset($response['nb_error']))
	                        {
	                            echo $response['nb_error'].'</br>';
	                        }
	                        else
	                        {
	                            echo 'The charge to your card was rejected by the bank, please verify your data and try again.</br>';
	                        }
	                        echo '</br>
	                        </div>';
	                    }

	                }
	            }

            ?>

				<div class="wrapper_text" style="height: 300px;">
					<div class="error-text" id="adhara_text">
						<p>
							<a href="/"> <?php echo $_GLOBALS['home-return']; ?> </a>
						</p>
					</div>
				</div>
				
				<div id="wrapper_footer">
					<?php include "views/partial_views/_footer.php"; ?>
				</div>
			</div>
		</div>
	</div>
	 <!-- Site Overlay 
    <div class="site-overlay"></div>-->
	<!-- Preloading -->
	<!-- <?php include "views/partial_views/_preloading.php"; ?> -->

</body>

<?php include "views/partial_views/_scripts.php"; ?>


</html>