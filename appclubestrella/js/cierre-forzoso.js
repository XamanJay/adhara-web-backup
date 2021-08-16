var inactivo = 0; //tiempo inactivo

var tiempo_permitido = 300 //en segundos	

Concurrent.Thread.create(function(){

	while(true){

		if(inactivo == tiempo_permitido){

			logout();
			Concurrent.Thread.stop();
		}

		else

		{
			inactivo++;

			//console.log(inactivo);

			Concurrent.Thread.sleep(1000);

		}

	}

});



function logout(){

	$("#form-exit").submit();

	return false;

}