<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login GpHoteles</title>
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/styles.css">
	<style>
		html{
			height: 100%;
		}

		body{
			min-height: 100%;
		}
	</style>
</head>
<body>

	<div id="loginPanel">
		<h4>Panel de administrador</h4>
		<img src="/img/logos/gph.png" alt="Grupo Peninsular de Hoteles" id="gphImg">
		<form action="" id="loginForm">
			<input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			<input type="text" class="hidden" readonly value="<?php echo $_SESSION['token']; ?>" name="key" id="key">
			<button class="center-block" id="sendForm">Enviar</button>
			<div id="loadForm" style="display: none;text-align: center;" class="center-block"><img src="/img/loading.gif" alt="Loading..."></div>
			<p id="alert"></p>
		</form>
	</div>
	
</body>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$("#loginForm").validate({

			rules:{
				username: { required: true, email: true},
				password: { required: true, minlength: 4}
			},
			messages: {
				username: { required: "Introduce un usuario/correo"},
				password: { required: "Introduce un password"}
			},
			submitHandler: function(form){
				$.ajax({
					type: "POST",
					url: "/login",
					data: $(form).serialize(),
					beforeSend: function(){
						$("#sendForm").css('display', 'none').fadeIn();
						$("#loadForm").css('display','block').fadeIn();
					},
					success: function(data){
						var object = JSON.parse(data);
						console.log(object);
						if (object.type = "success") {
							window.location.reload(true);
						}
						else{
							$('#alert').addClass('bg-danger');
							$('#alert').html(object.message);
							$("form input[name='password']").val("");
						}
					},
					failed: function(result){
						console.log("failed");
					}

				});
			}

		});
	});
</script>
</html>