$(document).ready(function(){
	//Detecta si el mouse está moviendose
	var move = false;
	window.onmousemove = function(){
		move = true;
	};
	setInterval (function() {
		if (!move) {
			focused = false;

		} else {
			move = false;
			focused = true;

		}
	}, 1000);

	//True si la pestaña de la página está activa
	//False si la pestaña de la página está inactiva
	window.onfocus = function() {
		focused = true;
	};
	window.onblur = function() {
		focused = false;
	};


});
var inactivo = 0;	
var focused = true;
Concurrent.Thread.create(function(){
	while(true){
		if(!focused){
			inactivo++;
//			console.log(inactivo);
			Concurrent.Thread.sleep(1000);
		}else{
			inactivo = 0;
		}
	}
});