

if(Cookies.get("lang") == "es"){
    console.log("Bienvenido");
} 
else if(Cookies.get("lang") == "en"){
  console.log("Welcome");
}
else{
  Cookies.set("lang","es");
  location.reload();  
}


$(document).ready(function(){

	$("#lang").click(function() {
  		/*console.log(this);
  		var lang = $(this).attr("id");
  		console.log(lang);*/
  		var lang = $(this).children("img").attr("alt");
  		if(lang == "es"){
  			Cookies.set("lang","es");
  			location.reload();
  		}
  		else if(lang == "en"){
  			Cookies.set("lang","en");
  			location.reload();
  		}
  		console.log(lang);
	});

  $( "#lang_mob" ).click(function() {
      /*console.log(this);
      var lang = $(this).attr("id");
      console.log(lang);*/
      var lang = $(this).children("img").attr("alt");
      if(lang == "es"){
        Cookies.set("lang","es");
        location.reload();
      }
      else if(lang == "en"){
        Cookies.set("lang","en");
        location.reload();
      }
      console.log(lang);
  });

}); 