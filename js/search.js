function dateCustom() {

    var checkin = new Date(buscador.llegada.value);
    var checkout = new Date(buscador.termina.value);
    var today = new Date();

    if(checkin >= checkout || checkout <= checkin){
     	$("#warning-custom").css("display","block");
     	$("#warning-custom").html("");
     	$("#warning-custom").append("<p style='margin-bottom:0px;'>Fechas Incorrectas</p>");
     	//console.log("Error fechas malas");
     	return false;
    }
    else if(checkin <= today || checkout <= today){
    	$("#warning-custom").css("display","block");
     	$("#warning-custom").html("");
     	$("#warning").append("<p style='margin-bottom:0px;'>La fecha debe ser mayor a hoy</p>");
     	return false;
    }
    else{
     	//console.log("All good");
     	return true
    }
}

$(document).ready(function(){

	var room = "";
    var adults = "";
    var kids = "";
    var local = "";
    var search = "";
	if(Cookies.get("lang") == "es"){
		room = "Habitación";
		adults = "Adultos";
		kids = "Niños";
		local = "es";
		search = "Buscar";
	}
	else if(Cookies.get("lang") == "en"){
		room = "Room";
		adults = "Adults";
		kids = "Kids";
		local = "en";
		search = "Search";
	}
	else{
		room = "Habitación";
		adults = "Adultos";
		kids = "Niños";
		local = "es";
		search = "Buscar";
	}

	$('#startDate').click(function() {
    	$("#checkin", $(this).closest(".input-group")).focus();
  	});
  	$('#endDate').click(function() {
    	$("#checkout", $(this).closest(".input-group")).focus();
  	});

    var from = $( "#checkin" )
			.datepicker({
			minDate: new Date(),
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			setDate: new Date()
		}),
		to = $( "#checkout" ).datepicker({
			minDate: new Date(),
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd"
		});


	$('#startDatee').click(function() {
    	$("#llegada", $(this).closest(".input-group")).focus();
  	});
  	$('#endDatee').click(function() {
    	$("#termina", $(this).closest(".input-group")).focus();
  	});


    var from = $( "#llegada" )
			.datepicker({
			minDate: new Date(),
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd"
		}),
		to = $( "#termina" ).datepicker({
			minDate: new Date(),
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd"
		});


	var from = $( "#fecha_evento" )
			.datepicker({
			minDate: new Date(),
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			setDate: new Date()
		});
 

    /*$('#fechaEvento').datepicker({
      format: 'YYYY-MM-DD',
      minDate: new Date(),
      locale: local
    });*/

	var searchBtn = $("#down");
	//console.log(searchBtn);
    
    $("select[name='rooms']").change(function(){

		var value = $(this).val();
		var template = "";
		switch(value){
			case '1':
			$('form .moreRooms').html("");
			//$("#searchBox").append(searchBtn);
			template = `
				<div class="form-row" id="searchBox" style="width:100%;">
					<div class="form-group col-md-2 offset-md-10" id="down">
						<button type="submit" class="btn btn-primary centerItems widthCustom" id="sendP" name="btnSearch" style="margin-top: 0px;">
							${search}
						</button>
					</div>
				</div>
			`;
			$('form .moreRooms').append(template);
			//searchBtn.appendTo("#buscador");
			break;
			case '2':

			$("#down").detach();
			template = `
			<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='form-group col-xs-12 col-sm-2 col-md-2'>
				<p style='color: white;'>${room} 2</p>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='adults[]' required>
					<option value='1' selected>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
				</select>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='kids[]' required>
					<option value='0' selected>0</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
				</select>
			</div>
			<div class='col-xs-12 col-sm-2 col-md-2'>
				<button type="submit" class="btn btn-primary centerItems widthCustom" id="sendP" name="btnSearch" style="margin-top: 0px;margin-bottom:20px;">
						${search}
				</button>
			</div>`;

			$('form .moreRooms').html("");
			$('form .moreRooms').append(template);
			break;
			case '3':
			$("#down").detach();
			$('form .moreRooms').html("");
			template = `<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='form-group col-xs-12 col-sm-2 col-md-2'>
				<p style='color: white;'>${room} 2</p>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='adults[]' required>
					<option value='1' selected>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
				</select>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='kids[]' required>
					<option value='0' selected>0</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
				</select>
			</div>
			<div class='col-xs-12 col-sm-2 col-md-2'></div>`;

			$('form .moreRooms').append(template);
			template = `<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='col-xs-12 col-sm-2 col-md-2'></div>
			<div class='form-group col-xs-12 col-sm-2 col-md-2'>
				<p style='color: white;'>${room} 3</p>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='adults[]' required>
					<option value='1' selected>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
				</select>
			</div>
			<div class='form-group col-md-2'>
				<select class='custom-select centerItems widthCustom' name='kids[]' required>
					<option value='0' selected>0</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
				</select>
			</div>
			<div class='col-xs-12 col-sm-2 col-md-2'>
				<button type="submit" class="btn btn-primary centerItems widthCustom" id="sendP" name="btnSearch" style="margin-top: 0px;margin-bottom:20px;">
						${search}
				</button>
			</div>`;

			$('form .moreRooms').append(template);
			break;

		}

	});

});