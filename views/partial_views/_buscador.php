<div class="row" id="delimiter-box">
	<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 offset-md-2 offset-lg-2 offset-xl-2">
		<form action="/room" method="POST" id="sendData">
			<div class="row" id="box-search">
				<div class="col-12 col-sm-6 col-md-4-col-lg-4 col-xl-4 input-group">
					<div class="input-group-prepend">
						<img src="img/icons/calendar.png" class="calendar-b" id="calendar" alt="">
					</div>
					<input type="text" class="form-control date-input" placeholder="<?php echo $_GLOBALS['search-dates']; ?>" id="start" autocomplete="off" aria-label="Fechas a reservar" name="empieza">
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 input-group input-guest">
					<div class="input-group-prepend">
						<img src="img/icons/guests.png" class="icon-search" alt="">
					</div>
					<input type="text" class="form-control input-style" name="paxs_rooms" id="pax_rooms" readonly placeholder="1pax, 1hab">
					<div class="layout-room">
						<div class=" ">
							<div id="room_1" class="pax-room">
								<div class="header.room">
									<span><img src="img/icons/bed.png" alt="Room.1" class="bed-room" style="width: 25px;"> <?php echo $_GLOBALS['search-room']; ?> 1</span>
								</div>
								<div class="body room">
									<div class="room_feature" id="room_1_adult">
										<?php echo $_GLOBALS['search-adults']; ?> 
										<div class="controls-box room_adult">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">1</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature" id="room_1_kid">
										<?php echo $_GLOBALS['search-kids']; ?>
										<div class="controls-box room_kid">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">0</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature pax_Age" id="room_1_age">
										<p style="font-size: 11px;text-align: center;">Edad de los menores (0 a 12 años)</p>
										
									</div>
									<div class="room_feature" id="room_apply">
										<span class="label-plus">+ <?php echo $_GLOBALS['search-room']; ?> </span>
										<button class="plus-room" style="float:right;"><?php echo $_GLOBALS['search-apply']; ?></button>
									</div>
								</div>
									
							</div>
							<div id="room_2" class="pax-room">
								<div class="header.room">
									<span><img src="img/icons/bed.png" alt="Room.1" class="bed-room" style="width: 25px;"> <?php echo $_GLOBALS['search-room']; ?> 2</span>
									<div class="minus-room"><?php echo $_GLOBALS['search-delete']; ?></div>
								</div>
								<div class="body room">
									<div class="room_feature" id="room_2_adult">
										<?php echo $_GLOBALS['search-adults']; ?> 
										<div class="controls-box room_adult">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">1</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature" id="room_2_kid">
										<?php echo $_GLOBALS['search-kids']; ?>
										<div class="controls-box room_kid">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">0</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature pax_Age" id="room_2_age">
										<p style="font-size: 11px;text-align: center;">Edad de los menores (0 a 12 años)</p>
									</div>
									<div class="room_feature" id="room_apply">
										<span class="label-plus">+ <?php echo $_GLOBALS['search-room']; ?> </span>
										<button class="plus-room" style="float:right;"><?php echo $_GLOBALS['search-apply']; ?></button>
									</div>
								</div>
							</div>
							<div id="room_3" class="pax-room">
								<div class="header.room">
									<span><img src="img/icons/bed.png" alt="Room.1" class="bed-room" style="width: 25px;"> <?php echo $_GLOBALS['search-room']; ?> 3</span>
									<div class="minus-room"><?php echo $_GLOBALS['search-delete']; ?></div>
								</div>
								<div class="body room">
									<div class="room_feature" id="room_3_adult">
										<?php echo $_GLOBALS['search-adults']; ?> 
										<div class="controls-box room_adult">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">1</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature" id="room_3_kid">
										<?php echo $_GLOBALS['search-kids']; ?>
										<div class="controls-box room_kid">
											<button class="btn-controls down"><img src="img/icons/minus.png" alt=""></button>
											<span class="total-pax">0</span>
											<button class="btn-controls up"><img src="img/icons/plus.png" alt=""></button>
										</div>
									</div>
									<div class="room_feature pax_Age" id="room_3_age">
										<p style="font-size: 11px;text-align: center;">Edad de los menores (0 a 12 años)</p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
					<input type="text" class="form-control date-input" name="code" id="code" placeholder="#Code">
				</div>
				<div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
					<button type="submit" class="btn btn-primary" id="search-btn"><?php echo $_GLOBALS['search-enter']; ?></button>
					<input type="hidden" class="form-control" name="startDate" id="startDate" readonly>
					<input type="hidden" class="form-control" name="endDate" id="endDate" readonly>
					<input type="hidden" class="form-control" name="total-paxs" value="1" readonly>
					<input type="hidden" class="form-control" name="room.1.adults" id="room_1" value="1" readonly>
					<input type="hidden" class="form-control" name="room.1.kids" id="kid_1" value="0" readonly>
					<input type="hidden" class="form-control" name="adults" value="1" readonly>
					<input type="hidden" class="form-control" name="kids" value="0" readonly>
					<input type="hidden" class="form-control" name="rooms" value="1" readonly>
					<input type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>" readonly name="csrf_token">
					<div id="extras"></div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	
$(document).ready(function(){

	var picker = new Litepicker({ 
		element: document.getElementById('start'),
		singleMode: false,
		minDate:moment(),
		onSelect: function(date1, date2) { 

			$("input[name='startDate']").val(picker.getStartDate().format('YYYY-MM-DD'));
			$("input[name='endDate']").val(picker.getEndDate().format('YYYY-MM-DD'));
		}
	});

	var iconPick = new Litepicker({ 
		element: document.getElementById('calendar'),
		singleMode: false,
		minDate:moment(),
		onSelect: function(date1, date2) { 
			$("input[name='startDate']").val(iconPick.getStartDate().format('YYYY-MM-DD'));
			$("input[name='endDate']").val(iconPick.getEndDate().format('YYYY-MM-DD'));
			var str = "";
			str = iconPick.getStartDate().format('YYYY-MM-DD')+' - '+iconPick.getEndDate().format('YYYY-MM-DD');
			$('#start').val(str);
		}
	});

	var rooms = 1;
	var years = 'años';
	if(Cookies.get("lang") == "en"){
		years = "years";
	}
	$("#pax_rooms").on('click',function(){
		$(".rooms_all").css('display','block');
	});

	$('.date-input').on('click',function(){
		if($(".rooms_all").css('display') == 'block'){
			$(".rooms_all").css('display','none');
		}
	});

	$("#search-btn").on('click',function(){
		if($(".rooms_all").css('display') == 'block'){
			$(".rooms_all").css('display','none');
		}
	});

	$(".plus-room").on('click',function(e){
		e.preventDefault();
		if($(".rooms_all").css('display') == 'block'){
			$(".rooms_all").css('display','none');
		}
	});

	var warning_kids = '<p style="font-size: 11px;text-align: center;">Edad de los menores (0 a 12 años)</p>';

	var age_template = '<select name="" id="" class="form-control ageKids">'+
						'<option value="0">0 '+years+'</option>'+
						'<option value="1">1 '+years+'</option>'+
						'<option value="2">2 '+years+'</option>'+
						'<option value="3">3 '+years+'</option>'+
						'<option value="4">4 '+years+'</option>'+
						'<option value="5">5 '+years+'</option>'+
						'<option value="6">6 '+years+'</option>'+
						'<option value="7">7 '+years+'</option>'+
						'<option value="8">8 '+years+'</option>'+
						'<option value="9">9 '+years+'</option>'+
						'<option value="10">10 '+years+'</option>'+
						'<option value="11">11 '+years+'</option>'+
						'<option value="12">12 '+years+'</option>'+
					'</select>';			

	$(".room_feature .label-plus").on('click',addRoom);

	$(".minus-room").on('click',deleteRoom);

	function deleteRoom(){
		var element = $(this).parents()[1];
		var spanAdults = $(element).find('span')[1];
		var spanKids = $(element).find('span')[2];
		//Para obtener valores de un W.fn.init JQUERY
		var pax_ = parseInt($(spanAdults).text()) + parseInt($(spanKids).text());
		var paxs = $("input[name='total-paxs']").val();
		var total = paxs - pax_;
		

		if(rooms == 3){
			var parent = $(element).siblings()[1];
			$("input[name='room.3.adults']").remove();
			$("input[name='room.3.kids']").remove();
		}
		else{
			var parent = $(element).siblings()[0];
			$("input[name='room.2.adults']").remove();
			$("input[name='room.2.kids']").remove();
		}

		var children = $(parent).find('span')[3];
		$(children).parent().css('display','block');
		$(element).css('display','none');
		rooms--;

		var newPlaceholder = total+"pax, "+rooms+"hab";
		$("#pax_rooms").attr('placeholder',newPlaceholder);
		$("input[name='total-paxs']").val(total);
		$("input[name='adults']").val(total);
		$("input[name='rooms']").val(rooms);
	}

	function addRoom(){
		console.log($(this).parent());
		var element = $(this).parent().css('display','none');
		var paxs = 0;
		if(rooms < 3){

			rooms++;
			$("input[name='rooms']").val(rooms);
			if(rooms == 2){
				paxs = $("input[name='total-paxs']").val();
				paxs++;
				var newPlaceholder = paxs+"pax, "+rooms+"hab";

				$("#pax_rooms").attr('placeholder',newPlaceholder);
				$("input[name='total-paxs']").val(paxs);
				var adult = $("input[name='adults']").val();
				adult++
				$("input[name='adults']").val(adult);
				$("#room_2").css('display','block');
				var inputs_room = '<input type="hidden" class="form-control" name="room.'+rooms+'.adults" value="1" readonly><input type="hidden" class="form-control" name="room.'+rooms+'.kids" value="0" readonly>';
				$("#extras").append(inputs_room);
				

			}

			if(rooms == 3){
				paxs = $("input[name='total-paxs']").val();
				paxs++;
				var newPlaceholder = paxs+"pax, "+rooms+"hab";
				
				$("#pax_rooms").attr('placeholder',newPlaceholder);
				$("input[name='total-paxs']").val(paxs);
				var adult = $("input[name='adults']").val();
				adult++
				$("input[name='adults']").val(adult);
				$("#room_3").css('display','block');
				var inputs_room = '<input type="hidden" class="form-control" name="room.'+rooms+'.adults" value="1" readonly><input type="hidden" class="form-control" name="room.'+rooms+'.kids" value="0" readonly>';
				$("#extras").append(inputs_room);
				
			}
		}
	
	}


	$(".room_adult .up").on('click',function(e){
		e.preventDefault();
		var element = $(this).siblings('.total-pax');
		var divParent = $(this).parents()[1];
		var pax = parseInt(element[0].innerHTML);
		if(pax < 4){
			pax++; 
			element.html(pax);
			var pax_ = parseInt($("input[name='total-paxs']").val());
			if(pax_)
				pax_++;

			var newPlaceholder = pax_+"pax, "+rooms+"hab";
			$("#pax_rooms").attr('placeholder',newPlaceholder);
			$("input[name='total-paxs']").val(pax_);
			var actualAdults = $("input[name='adults']").val();
			actualAdults++;
			$("input[name='adults']").val(actualAdults);

			switch($(divParent).attr('id')){

				case 'room_1_adult':
					$("input[name='room.1.adults']").val(pax);
					break;
				case 'room_2_adult':
					$("input[name='room.2.adults']").val(pax);
					break;
				case 'room_3_adult':
					$("input[name='room.3.adults']").val(pax);
					break;
			}

		}


		if(pax == 2){
			var element = $(this).siblings('.disabled');
			$(element).removeClass('disabled').addClass('down');
			$(element).css('cursor','pointer');
		}

		if(pax == 4){
			$(this).removeClass('up').addClass('disabled');
			$(this).css('cursor','not-allowed');
		}

	});

	$(".room_adult .down").on('click',function(e){
		e.preventDefault();
		var element = $(this).siblings('.total-pax');
		var divParent = $(this).parents()[1];
		var pax = parseInt(element[0].innerHTML);
		if(pax > 1){
			pax--; 
			element.html(pax);
			var pax_ = parseInt($("input[name='total-paxs']").val());
			if(pax_)
				pax_--;

			var newPlaceholder = pax_+"pax, "+rooms+"hab";
			$("#pax_rooms").attr('placeholder',newPlaceholder);
			$("input[name='total-paxs']").val(pax_);
			var actualAdults = $("input[name='adults']").val();
			actualAdults--;
			$("input[name='adults']").val(actualAdults);

			switch($(divParent).attr('id')){

				case 'room_1_adult':
					console.log("room 1 adult");
					$("input[name='room.1.adults']").val(pax);
					break;
				case 'room_2_adult':
					$("input[name='room.2.adults']").val(pax);
					break;
				case 'room_3_adult':
					$("input[name='room.3.adults']").val(pax);
					break;
			}

		}

		
		if(pax == 1){
			$(this).removeClass('down').addClass('disabled');
			$(this).css('cursor','not-allowed');
		}

		if(pax ==3){
			var element = $(this).siblings('.disabled');
			$(element).removeClass('disabled').addClass('up');
			$(element).css('cursor','pointer');
		}

	});


	$(".room_kid .up").on('click',function(e){
		e.preventDefault();
		var element = $(this).siblings('.total-pax');
		var divParent = $(this).parents()[1];
		var pax = parseInt(element[0].innerHTML);
		if(pax < 3){
			pax++; 
			element.html(pax);
			var pax_ = parseInt($("input[name='total-paxs']").val());
			if(pax_)
				pax_++;

			var newPlaceholder = pax_+"pax, "+rooms+"hab";
			$("#pax_rooms").attr('placeholder',newPlaceholder);
			$("input[name='total-paxs']").val(pax_);
			var actualKids = $("input[name='kids']").val();
			actualKids++;
			$("input[name='kids']").val(actualKids);

			//pax_Age es la clase donde deben de ir los selects para la edad
			switch($(divParent).attr('id')){

				case 'room_1_kid':
					$("input[name='room.1.kids']").val(pax);
					$("#room_1_age").append(age_template);
					break;
				case 'room_2_kid':
					$("input[name='room.2.kids']").val(pax);
					$("#room_2_age").append(age_template);
					break;
				case 'room_3_kid':
					$("input[name='room.3.kids']").val(pax);
					$("#room_3_age").append(age_template);
					break;
			}

		}


		if(pax == 1){
			var element = $(this).siblings('.disabled');
			$(element).removeClass('disabled').addClass('down');
			$(element).css('cursor','pointer');
		}

		if(pax == 3){
			$(this).removeClass('up').addClass('disabled');
			$(this).css('cursor','not-allowed');
		}

	});

	$(".room_kid .down").on('click',function(e){
		e.preventDefault();
		var element = $(this).siblings('.total-pax');
		var divParent = $(this).parents()[1];
		var pax = parseInt(element[0].innerHTML);
		if(pax >= 1){
			pax--; 
			element.html(pax);
			var pax_ = parseInt($("input[name='total-paxs']").val());
			if(pax_)
				pax_--;

			var newPlaceholder = pax_+"pax, "+rooms+"hab";
			$("#pax_rooms").attr('placeholder',newPlaceholder);
			$("input[name='total-paxs']").val(pax_);
			var actualKids = $("input[name='kids']").val();
			actualKids--;
			$("input[name='kids']").val(actualKids);

			switch($(divParent).attr('id')){

				case 'room_1_kid':
					$("input[name='room.1.kids']").val(pax);
					$("#room_1_age select:last-child").remove();
					break;
				case 'room_2_kid':
					$("input[name='room.2.kids']").val(pax);
					$("#room_2_age select:last-child").remove();
					break;
				case 'room_3_kid':
					$("input[name='room.3.kids']").val(pax);
					$("#room_3_age select:last-child").remove();
					break;
			}

		}


		if(pax == 0){
			$(this).removeClass('down').addClass('disabled');
			$(this).css('cursor','not-allowed');
		}

		if(pax ==2){
			var element = $(this).siblings('.disabled');
			$(element).removeClass('disabled').addClass('up');
			$(element).css('cursor','pointer');
		}

	});

});
</script>