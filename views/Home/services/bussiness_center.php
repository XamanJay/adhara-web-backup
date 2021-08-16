<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include "views/partial_views/_styles.php"; ?>
	<title>Bussiness Center Adhara Cancún</title>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/services/pool.css">

</head>
<body style="background-image: url('/img/background.png');">

	<?php include "lang/languaje.php"; ?>	

	<!-- Navbar mobile -->
    <?php include "views/partial_views/_navbar_mobile.php"; ?>

	<!-- Redes Sociales -->
	<?php include "views/partial_views/_redes.php"; ?>

	<div id="general">
		<!-- Navbar -->
		<?php include "views/partial_views/_navbar.php"; ?>
		
		<div class="container">
			
			<div  id="wrapper-content" style="padding-top: 60px;">
				<!-- Buscardor -->
				<?php include "views/partial_views/_search.php"; ?>

				<!-- test mobile -->
				<div class="wrapper_text">
					<div class="pool-text">
						<img src="/img/services/pool/pool-icon.png" alt="Gimnasio" id="pool_icon">
						<h4 class="tittle"><?php echo $_GLOBALS['bussiness-h1']; ?></h4>
						<p><?php echo $_GLOBALS['bussiness-p']; ?></p>

					</div>
				</div>

				<div class="wrapper_img">
					<img src="img/services/bussiness_center/bussiness.png" alt="Bussiness Center" class="img-fluid desktop">
					<img src="img/services/bussiness_center/bussiness_mob.png" alt="Bussiness Center" class="img-fluid mobile">
					<div class="row text_side">
						<div class="col-xs-12 col-sm-6 offset-sm-6 col-md-6 offset-md-6 box_" id="room_text">
							<div class="animation fadeIn-right" style="background-color: rgba(91, 26, 21, 0.7);">
								<div class="text_cage">
									<h2><?php echo $_GLOBALS['bussiness-h2']; ?></h2>
									<p><?php echo $_GLOBALS['bussiness-p3']; ?></p>
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrapper_text" style="height: 300px;">
					<div class="text_box">
						<p><?php echo $_GLOBALS['bussiness-p4']; ?></p>
					</div>
				</div>
				<div class="wrapper_img">
					<img src="img/services/bussiness_center/bussiness-1.png" alt="Bussiness Center" class="img-fluid desktop">
					<img src="img/services/bussiness_center/bussiness-1_mob.png" alt="Bussiness Center" class="img-fluid mobile">
				</div>
				
				
				<div class="wrapper_text" style="height: 300px;">
					<div class="pool-text" id="adhara_text" style="text-align: center;">
						<a href="/" style="text-decoration: none;color: #473934;"> <?php echo $_GLOBALS['home-return']; ?> </a>
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
<script type="text/javascript">
	
	$(document).ready(function(){

		$(window).scroll(function(){

	        if($("#room_text").visible(true)){
	        	$("#room_text").addClass("letGo");
	        }
	        else{
	        	$("#room_text").removeClass("letGo");
	        }
    	});


	});

</script>

</html>