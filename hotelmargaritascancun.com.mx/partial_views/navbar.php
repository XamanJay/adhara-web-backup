<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #070a25;padding: 0px;">

	<a class="navbar-brand" href="/" style=";padding: 0px;"><img src="/img/logo.png" alt="Margaritas Cancún" style="width: 200px"></a>
	<button class="navbar-toggler" type="button" id="mobileBar" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav mr-auto">
			<li id="whatsHover" class="desktop">
				<a href="https://api.whatsapp.com/send?phone=529981221861" target="_blank"><img src="<?php echo $_GLOBALS['header_whats']; ?>" alt="Whatsapp" class="img-fluid"></a>
			</li>
			<li class="mobile">
				<a href="https://api.whatsapp.com/send?phone=529981221861" target="_blank"><img src="<?php echo $_GLOBALS['header_whats']; ?>" alt="Whatsapp" class="img-fluid"></a>
			</li>
		</ul>
		<ul class="navbar-nav " id="barStuff">
			<li class="nav-item active">
				<a class="nav-link align-self-center" href="/somos.php"><?php echo $_GLOBALS['nav-somos']; ?> <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link align-self-center" href="/habitaciones.php"><?php echo $_GLOBALS['nav-rooms']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link align-self-center" href="/servicios.php"><?php echo $_GLOBALS['nav-servicios']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link align-self-center" href="https://clubestrella.mx" target="_blank" id="clubestrella"><img src="/img/clubestrella.png" alt="Clubestrella">Clubestrella</a>
			</li>
			<li class="nav-item">
				<a class="nav-link align-self-center" href="/contacto.php"><?php echo $_GLOBALS['nav-contacto']; ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link align-self-center" href="#" id="lang"><img src="<?php echo $_GLOBALS['flag_src']; ?>" alt="<?php echo $_GLOBALS['flag_alt']; ?>" class="flags"></a>
			</li>
		</ul>
	</div>
</nav>