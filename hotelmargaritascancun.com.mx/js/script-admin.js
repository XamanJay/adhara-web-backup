$(document).ready(function(){
	
	/*$("#whatsHover").hover(
		function(){
			$(this).append($("<div><img src='/img/whatsInfo.png' class='fluid-img' id='whatsInfo'></div>"));
		},
		function(){
			$(this).find("div:last").remove();
		}
	);*/

	var room = "";
    var adults = "";
    var kids = "";
    var local = "";
	if(Cookies.get("lang") == "es"){
		room = "Habitación";
		adults = "Adultos";
		kids = "Niños";
		local = "es";
	}
	else if(Cookies.get("lang") == "en"){
		room = "Room";
		adults = "Adults";
		kids = "Kids";
		local = "en";
	}
	else{
		room = "Habitación";
		adults = "Adultos";
		kids = "Niños";
		local = "es";
	}
	
    $('#startDate').datetimepicker({
      format: 'YYYY-MM-DD',
      minDate: new Date(),
      locale: local
    });

    $('#endDate').datetimepicker({
      format: 'YYYY-MM-DD',
      useCurrent: false //Important! See issue #1075
    });

    $("#startDate").on("dp.change", function (e) {
        $('#endDate').data("DateTimePicker").minDate(e.date.clone().add(1,"d"));
    });

    $('#fechaEvento').datetimepicker({
      format: 'YYYY-MM-DD',
      minDate: new Date(),
      locale: local
    });


    $("select[name='rooms']").change(function(){

    	
		var value = $(this).val();
		var template = "";
		switch(value){
			case '1':
			$('form .moreRooms').html("");
			break;
			case '2':
			template = "<div class='col-xs-12 col-sm-2 col-md-2'></div><div class='col-xs-12 col-sm-2 col-md-2'></div><div class='form-group col-xs-12 col-sm-2 col-md-2'><p style='color: white;'>"+room+" 2</p></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='adults[]'><option selected value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='kids[]'><option selected value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select></div><div class='col-xs-12 col-sm-2 col-md-2'></div>";
			$('form .moreRooms').html("");
			$('form .moreRooms').append(template);
			break;
			case '3':
			$('form .moreRooms').html("");
			template = "<div class='col-xs-12 col-sm-2 col-md-2'></div><div class='col-xs-12 col-sm-2 col-md-2'></div><div class='form-group col-xs-12 col-sm-2 col-md-2'><p style='color: white;'>"+room+" 2</p></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='adults[]'><option selected value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='kids[]'><option selected value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select></div><div class='col-xs-12 col-sm-2 col-md-2'></div>";
			$('form .moreRooms').append(template);
			template = "<div class='col-xs-12 col-sm-2 col-md-2'></div><div class='col-xs-12 col-sm-2 col-md-2'></div><div class='form-group col-xs-12 col-sm-2 col-md-2'><p style='color: white;'>"+room+" 3</p></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='adults[]'><option selected value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></div><div class='form-group col-md-2'><select class='custom-select centerItems widthCustom' name='kids[]'><option selected value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option></select></div><div class='col-xs-12 col-sm-2 col-md-2'></div>";
			$('form .moreRooms').append(template);
			break;

		}

	});

});