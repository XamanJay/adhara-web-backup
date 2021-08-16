<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "partial_views/styles.php" ?>
	<style>
		@media(min-width: 200px){

		    #contenido{
				background-size: contain;
			}
		}

		@media(min-width: 600px){
		    #contenido{
				background-size: cover;
			}
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
	<div class="container">
		<div class="row margenD">
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div id="contacto" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#contacto" data-slide-to="0" class="active"></li>
						<li data-target="#contacto" data-slide-to="1"></li>
						<li data-target="#contacto" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="img/contacto/contacto_1.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="img/contacto/contacto_2.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="img/contacto/contacto_3.jpg" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#contacto" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#contacto" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4" id="contactBox">
				<h1>Contáctanos</h1>
				<p>Av. Carlos Nader 1,2,3 SM. 1, MZ. 2, Cancún, Quintana Roo, México, CP.77500</p>
				<p>Llamando sin costo al: 01 800 711-15-31 (México)</p>
				<p>Teléfono: +52 (998) 881 65 00</p>
				<p>Fax: +52 (998) 884 83 76</p>
				<p>reservaciones@gphoteles.com</p>
				<p>grupos@gphoteles.com</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div id="map" style="width: 350px;height: 350px;"></div>
			</div>
		</div>
		<div class="row">
			
		</div>
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
<script>
    function initMap() {
        // Create a map object and specify the DOM element for display.
        var uluru = {lat: 21.167862, lng: -86.824274};
        var map = new google.maps.Map(document.getElementById('map'), {
          center: uluru,
          zoom: 18
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          //icon: 'img/marker.png' // null = default icon
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGp4a2I1yctVHpeRE4SyF_8JQmLtMijdw&callback=initMap"
    async defer></script>
</body>
</html>