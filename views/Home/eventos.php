<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Somos Adhara Cancún</title>
	<?php include "views/partial_views/_styles.php"; ?>
	<!-- Estilos vista piscina -->
	<link rel="stylesheet" href="css/eventos.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC" rel="stylesheet">

	<?php include "views/partial_views/_unitegallery.php"; ?>

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
				<!-- test mobile -->
				<div id="tittle">
					<img src="img/eventos/logo.png" alt="Adhara Eventos">
				</div>

				<div class="row eventos-text" id="box-eventos">
					<div class="col-xs-12 col-sm-6 col-md-6 space text-padd">
						<h4 style="text-align: left;"><?php echo $_GLOBALS['eventos-h2']; ?></h4>
						<p><?php echo $_GLOBALS['eventos-sec1']; ?></p>

					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space">
						<img src="img/eventos/postre.png" class="img-fluid" alt="Eventos Adhara">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space" style="margin-bottom: 80px;">
						<img src="img/eventos/eventos.png" class="img-fluid" alt="Eventos Adhara">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space text-padd">
						<h4 style="text-align: right;"><?php echo $_GLOBALS['eventos-h3']; ?></h4>
						<p><?php echo $_GLOBALS['eventos-sec2']; ?></p>

					</div>
					<!-- <div class="col-xs-12 col-sm-12 col-md-12">
						<img src="img/eventos/noche.png" alt="Adhara Eventos" class="img-fluid" style="margin-bottom: 80px;">
					</div> -->
					<div class="col-xs-12 col-sm-6 col-md-6 space text-padd">
						<h4 style="text-align: left;"><?php echo $_GLOBALS['eventos-h4']; ?></h4>
						<!-- <p>Actualmente Eventos Adhara tiene alianzas comerciales que brindan servicio de alimentos a varios corporativos y marcas premium.</p> -->
						<p><?php echo $_GLOBALS['eventos-sec3']; ?></p>

					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space">
						<img src="img/eventos/catering.png" class="img-fluid" alt="Eventos Adhara">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space">
						<img src="img/eventos/menu.png" class="img-fluid" alt="Eventos Adhara">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space text-padd">
						<h4 style="text-align: right;"><?php echo $_GLOBALS['eventos-h6']; ?></h4>
						<p><?php echo $_GLOBALS['eventos-sec4']; ?></p>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<img src="img/eventos/canapes.png" alt="Adhara Eventos" class="img-fluid" style="margin-bottom: 50px;">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space text-padd">
						<h4 style="text-align: left;"><?php echo $_GLOBALS['eventos-h5']; ?></h4>
						<p><?php echo $_GLOBALS['eventos-sec5']; ?></p>
						<p><?php echo $_GLOBALS['eventos-sec6']; ?></p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 space">
						<img src="img/eventos/instalaciones.png" class="img-fluid" alt="Eventos Adhara">
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 home">
						<img src="<?php echo $_GLOBALS['eventos-img']; ?>" alt="Salones" class="img-fluid">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<h3 style="margin-top: 60px;margin-bottom: 50px;text-align: center;color: #513b85;font-family: 'Cinzel', serif;"><?php echo $_GLOBALS['eventos-p2'] ?></h3>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 home">
						<img src="<?php echo $_GLOBALS['eventos-img2']; ?>" alt="Salones" class="img-fluid">
					</div>
					<div class="col-xs-12 col-sm-12 mobile">
						<img src="<?php echo $_GLOBALS['eventos-salones-mob']; ?>" alt="Salones" class="img-fluid">
					</div>
					
				</div>

				<form action="/eventos" method="POST" style="width: 100%;" id="eventos-form">
					<div class="row" id="father-form">
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="nombre"><?php echo $_GLOBALS['eventos-name']; ?></label>
							<div class="input-group">
								<input type="text" class="form-control" name="nombre" aria-describedby="basic-addon1">
								<div class="clearfix"></div>
								<label for="nombre" class="error" style="color: red;"></label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="fecha_evento"><?php echo $_GLOBALS['eventos-fecha']; ?></label>
							<div class='input-group' id='startDate'>
								<div class="input-group-prepend calendar_">
									<span class="input-group-text" style="background-color: #513b85;border: 1px solid #513b85;">
										<i class="far fa-calendar-alt" style="color: white"></i>
									</span>
								</div>
								<input type='text' id="fecha_evento" class="form-control input_" name="fecha_evento" value="<?php echo $today; ?>" autocomplete="off"  />
								<div class="clearfix"></div>
								<label for="fecha_evento" class="error" style="color: red;"></label>
					        </div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="pax"><?php echo $_GLOBALS['eventos-pax']; ?></label>
							<div class="input-group">
								<input type="text" class="form-control" name="pax" aria-describedby="basic-addon1">
								<div class="clearfix"></div>
								<label for="pax" class="error" style="color: red;"></label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="telefono"><?php echo $_GLOBALS['eventos-telefono']; ?></label>
							<div class="input-group">
								<input type="text" class="form-control" name="telefono" aria-describedby="basic-addon1">
								<div class="clearfix"></div>
								<label for="telefono" class="error" style="color: red;"></label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="email"><?php echo $_GLOBALS['eventos-email']; ?></label>
							<div class="input-group">
								<input type="email" class="form-control" name="email" aria-describedby="basic-addon1">
								<div class="clearfix"></div>
								<label for="email" class="error" style="color: red;"></label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<label for="tipo_evento"><?php echo $_GLOBALS['eventos-tipo']; ?></strong></label>
							<div class="input-group">
								<input type="text" class="form-control" name="tipo_evento" aria-describedby="basic-addon1">
								<div class="clearfix"></div>
								<label for="tipo_evento" class="error" style="color: red;"></label>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 child-form">
							<p><?php echo $_GLOBALS['eventos-servicios-label']; ?></p>
						</div>
						<!-- <div class="col-xs-12 col-sm-12 col-md-12">
							<p></p>
						</div> -->
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<p><?php echo $_GLOBALS['eventos-servicios-h']; ?></p>
							<ul class="services">
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Servicios_Audio" name="Servicios_Audio">
									    <label for="Servicios_Audio"><span><?php echo $_GLOBALS['eventos-servicios-p']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Servicios_Proyector" name="Servicios_Proyector">
									    <label for="Servicios_Proyector"><span><?php echo $_GLOBALS['eventos-servicios-p3']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Servicios_Rotafolio" name="Servicios_Rotafolio">
									    <label for="Servicios_Rotafolio"><span><?php echo $_GLOBALS['eventos-servicios-p5']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Servicios_Pantalla" name="Servicios_Pantalla">
									    <label for="Servicios_Pantalla"><span><?php echo $_GLOBALS['eventos-servicios-p2']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Servicios_Tarima" name="Servicios_Tarima">
									    <label for="Servicios_Tarima"><span><?php echo $_GLOBALS['eventos-servicios-p4']; ?></span></label>
									</div>
								</li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<p><span><?php echo $_GLOBALS['eventos-servicios-p6']; ?></p>
							<ul class="services">
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Alimentos_Desayuno" name="Alimentos_Desayuno">
									    <label for="Alimentos_Desayuno"><?php echo $_GLOBALS['eventos-servicios-p7']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Alimentos_Comida" name="Alimentos_Comida">
									    <label for="Alimentos_Comida"><span><?php echo $_GLOBALS['eventos-servicios-p9']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Alimentos_Cena" name="Alimentos_Cena">
									    <label for="Alimentos_Cena"><span><?php echo $_GLOBALS['eventos-servicios-p11']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Alimentos_Cafe" name="Alimentos_Cafe">
									    <label for="Alimentos_Cafe"><span><?php echo $_GLOBALS['eventos-servicios-p8']; ?></span></label>
									</div>
								</li>
								<li>
									<div class="checkbox">
									    <input type="checkbox" id="Alimentos_Canapes" name="Alimentos_Canapes">
									    <label for="Alimentos_Canapes"><span><?php echo $_GLOBALS['eventos-servicios-p10']; ?></span></label>
									</div>
								</li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 child-form">
							<p><?php echo $_GLOBALS['eventos-servicios-p12']; ?></p>
							<textarea name="coments" id="" cols="26" rows="9" style="resize: none;width: 100%;"></textarea>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 child-form">
							<button class="btn btn-primary" type="submit" id="send"><?php echo $_GLOBALS['eventos-send']; ?></button>
							<img src="img/loading.gif" alt="loading..." class="loading">
							<div class="alert" role="alert" id="response"></div>
						</div>
					</div>
				</form>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<img src="img/eventos/logo_foot.png" alt="Adhara Eventos" id="logo_eventos">
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 event_img">
					<!-- <h3>Galería</h3> -->
					
					<div id="gallery" style="display:none;">

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/cake.png"
						     data-image="img/eventos/galeria/cake.png"
						     data-description="Pastel"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/bebida.png"
						     data-image="img/eventos/galeria/bebida.png"
						     data-description="Bebida"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/chile.png"
						     data-image="img/eventos/galeria/chile.png"
						     data-description="Mole"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/acomodado.png"
						     data-image="img/eventos/galeria/acomodado.png"
						     data-description="Mole"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/comida.png"
						     data-image="img/eventos/galeria/comida.png"
						     data-description="Those are yellow flowers"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/flor.png"
						     data-image="img/eventos/galeria/flor.png"
						     data-description="This is butterfly"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/estudio.png"
						     data-image="img/eventos/galeria/estudio.png"
						     data-description="This is a boat"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/mesa.png"
						     data-image="img/eventos/galeria/mesa.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/evento.png"
						     data-image="img/eventos/galeria/evento.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/morado.png"
						     data-image="img/eventos/galeria/morado.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/.png"
						     data-image="img/eventos/galeria/.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/jardin.png"
						     data-image="img/eventos/galeria/jardin.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/pasta.png"
						     data-image="img/eventos/galeria/pasta.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/jardin_.png"
						     data-image="img/eventos/galeria/jardin_.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/pastel.png"
						     data-image="img/eventos/galeria/pastel.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/mole.png"
						     data-image="img/eventos/galeria/mole.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/rosa.png"
						     data-image="img/eventos/galeria/rosa.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/pay.png"
						     data-image="img/eventos/galeria/pay.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/sopa.png"
						     data-image="img/eventos/galeria/.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/postre.png"
						     data-image="img/eventos/galeria/postre.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/salon.png"
						     data-image="img/eventos/galeria/salon.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>
						<a href="#">
						<img alt="Adhara Eventos"
						     src="img/eventos/thums/veruda.png"
						     data-image="img/eventos/galeria/veruda.png"
						     data-description="This is a woman"
						     style="display:none">
						</a>

							 
					</div>
				</div>
				<a href="https://api.whatsapp.com/send?phone=529981478870" target="_blank"><img src="img/eventos/whatsapp.png" alt="WhatsApp" id="eventos-whats"></a>

				<div class="wrapper_text" style="height: 150px;background-color: white;">
					<div class="eventos-text" style="text-align: center;margin-top: 0px;">
						<a href="/" style="text-decoration: none;color: #473934;"> <?php echo $_GLOBALS['home-return']; ?> </a>
					</div>
				</div>

				<div class="box-foot d-flex align-items-end justify-content-center">
					<img src="img/eventos/cristal.png" alt="Cristal" id="cristal">
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
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">

	$(document).ready(function(){

		$("#gallery").unitegallery();

	});
	
	$("#eventos-form").validate({

    	rules: {
            email: { required:true, email: true},
            nombre: { required:true, minlength: 3},      
            fecha_evento: { required:true, minlength: 3},   
            pax: { required:true, minlength: 1},   
            telefono: { required:true, minlength: 8},   
            tipo_evento: { required:true},     
	     },
        messages: {
            email : "Debe introducir un email válido.",
            nombre: "Introducir tu nombre.",
            fecha_evento: "Introducir una fecha.",
            pax: "Introducir numero de personas.",
            telefono: "Introducir tu número de contacto.",
            tipo_evento: "Introducir tipo de evento.",
        },
        submitHandler: function(form){

            $.ajax({
                type: form.method,
                url: form.action,
                data: $(form).serialize(),
                beforeSend: function(){
					$("#send").css("display","none");
					$(".loading").css("display","block");
					$("#response").css("display","none");
				},
                success: function(data){
                	console.log(data);
                	var object = JSON.parse(data);
                	$("#response").css("display","block");
                	if(object.type = "success"){
                		$("#send").css("display","block");
                		$(".loading").css("display","none");
                		$("#response").removeClass("alert-danger");
                		$("#response").addClass("alert-success");
                		$("#response").css("width","300px");
                		$("#response").html("");
                		$("#response").append(object.message);
                		$('#eventos-form')[0].reset();
                	}
                	else{
                		$("#send").css("display","block");
                		$(".loading").css("display","none");
                		$("#response").removeClass("alert-success");
                		$("#response").addClass("alert-danger");
                		$("#response").css("width","400px");
                		$("#response").html("");
                		$("#response").append(object.message);
                	}
                	
          	
                }
            });
        }
	});
</script>

</html>