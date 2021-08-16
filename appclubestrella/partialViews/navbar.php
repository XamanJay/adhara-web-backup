<nav id="navbarMain" class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#">
				<img src="img/logo-brand.png" class="brand-img">
			</a>
			<a class="navbar-brand" href="#">
				Club Estrella
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido, <?php echo $_SESSION["cliente"]->nombre; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="qrcode.php">Registrar código</a></li>
						<li><a href="cuenta.php">Estado de cuenta</a></li>
						<li>
							<a href="#" onclick="logout();">Cerrar sesión</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<form id="form-exit" action="main/success.php" method="POST"><input type="hidden" name="exit"></form>
</nav>
