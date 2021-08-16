<div class="container-fluid" style="background-color: #310707de;padding-top: 20px;">
	<form action="/room" method="POST" id="buscador" onsubmit="return dateCustom();">
		<div class="form-row">
				<div class="form-group col-md-2">
					<input type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>" readonly name="csrf_token">
					<input type="hidden" value="false" readonly name="quick">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-from']; ?></strong></p>
					<div class='input-group' id='startDate'>
						<div class="input-group-prepend calendar_">
							<span class="input-group-text">
								<i class="far fa-calendar-alt" style="color: white"></i>
							</span>
						</div>
						<input type='text' id="llegada" class="form-control widthCustom input_" name="empieza" required placeholder="llegada" value="<?php echo (isset($_POST['empieza']) ? $_POST['empieza'] : ''); ?>" autocomplete="off" />
			        </div>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-to']; ?></strong></p>
					<div class='input-group' id='endDate'>
						<div class="input-group-prepend calendar_">
							<span class="input-group-text">
								<i class="far fa-calendar-alt" style="color: white"></i>
							</span>
						</div>
						<input type='text' id="termina" class="form-control widthCustom input_" name="termina" required placeholder="salida" value="<?php echo (isset($_POST['termina']) ? $_POST['termina'] : ''); ?>" autocomplete="off" />
			        </div>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-rooms']; ?></strong></p>
					<select class="custom-select centerItems widthCustom input_" name="rooms" id="rooms" required>
						<?php 
							if (isset($_POST['rooms'])) {

								switch ($_POST['rooms']) {
									case 1:
										echo '<option selected value="'.$_POST['rooms'].'">'.$_POST['rooms'].'</option>
											<option value="2">2</option>
											<option value="3">3</option>';		
										break;
									case 2:
										echo '
											<option value="1">1</option>
											<option selected value="'.$_POST['rooms'].'">'.$_POST['rooms'].'</option>
											<option value="3">3</option>';
										break;
									case 3:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option selected value="'.$_POST['rooms'].'">'.$_POST['rooms'].'</option>';
									default:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>';
										break;
								}
							}
							else{
								echo '
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-adults']; ?></strong></p>
					<select class="custom-select centerItems widthCustom input_" name="adults[0]" required>
						<?php 
						print_r($_POST['adults']);
							if (isset($_POST['adults'])) {

								switch ($_POST['adults'][0]) {
									case 1:
										echo '<option selected value="'.$_POST['adults'][0].'">'.$_POST['adults'][0].'</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>';		
										break;
									case 2:
										echo '
											<option value="1">1</option>
											<option selected value="'.$_POST['adults'][0].'">'.$_POST['adults'][0].'</option>
											<option value="3">3</option>
											<option value="4">4</option>';
										break;
									case 3:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option selected value="'.$_POST['adults'][0].'">'.$_POST['adults'][0].'</option>
											<option value="4">4</option>';
									case 4:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option selected value="'.$_POST['adults'][0].'">'.$_POST['adults'][0].'</option>';
									default:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>';
										break;
								}
							}
							else{
								echo '
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-kids']; ?></strong></p>
					<select class="custom-select centerItems widthCustom input_" name="kids[0]" required>
						<?php 
							if (isset($_POST['kids'])) {
								switch ($_POST['kids'][0]) {
									case 0:
										echo '
											<option selected value="'.$_POST['kids'][0].'">'.$_POST['kids'][0].'</option>
											<option value="1">1</option>	
											<option value="2">2</option>
											<option value="3">3</option>';		
										break;
									case 1:
										echo '<option value="0">0</option>
											<option selected value="'.$_POST['kids'][0].'">'.$_POST['kids'][0].'</option>
											<option value="2">2</option>
											<option value="3">3</option>';		
										break;
									case 2:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option selected value="'.$_POST['kids'][0].'">'.$_POST['kids'][0].'</option>
											<option value="3">3</option>';
										break;
									case 3:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option selected value="'.$_POST['kids'][0].'">'.$_POST['kids'][0].'</option>';
									default:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>';
										break;
								}
							}
							else{
								echo '
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>';
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-code']; ?></strong></p>
					<input type="text" name="code-user" class="widthCustom form-control input_" placeholder="#optional">
				</div>
		</div>
		<?php 
			if($_POST&&isset($_POST['rooms'])&& $_POST['rooms'] > 1){
				echo "";
			}
			else{
				echo '<div class="form-row" id="searchBox">
							<div class="form-group col-md-2 offset-md-10" id="down">
								<button type="submit" class="btn btn-primary center-item" id="sendP" name="btnSearch" style="margin-top: 0px;">
									'.$_GLOBALS['search-enter'].'
								</button>
							</div>
						</div>'	;
			}
		?>

		<div class="form-row moreRooms">

			<?php 
				if($_POST&&isset($_POST['rooms'])&&isset($_POST['adults'])&&isset($_POST['kids'])){

					for($i = 1; $i < $_POST['rooms']; $i++) {
						$test = $i+1;
						echo "

							<div class='col-xs-12 col-sm-2 col-md-2'></div>
							<div class='col-xs-12 col-sm-2 col-md-2'></div>
							<div class='form-group col-xs-12 col-sm-2 col-md-2'>
								<p style='color: white;'>".$_GLOBALS['search-room']." ".$test."</p>
							</div>
							<div class='form-group col-md-2'>
								<select class='custom-select centerItems widthCustom' name='adults[".$i."]'>";
								switch ($_POST['adults'][$i]) {
									case 1:
										echo '<option selected value="'.$_POST['adults'][$i].'">'.$_POST['adults'][$i].'</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>';		
										break;
									case 2:
										echo '
											<option value="1">1</option>
											<option selected value="'.$_POST['adults'][$i].'">'.$_POST['adults'][$i].'</option>
											<option value="3">3</option>
											<option value="4">4</option>';
										break;
									case 3:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option selected value="'.$_POST['adults'][$i].'">'.$_POST['adults'][$i].'</option>
											<option value="4">4</option>';
									case 4:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option selected value="'.$_POST['adults'][$i].'">'.$_POST['adults'][$i].'</option>';
									default:
										echo '
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>';
										break;
								}
						echo"	</select>
							</div>
							<div class='form-group col-md-2'>
								<select class='custom-select centerItems widthCustom' name='kids[".$i."]' >";
								switch ($_POST['kids'][$i]) {
									case 0:
										echo '
											<option selected value="'.$_POST['kids'][$i].'">'.$_POST['kids'][$i].'</option>
											<option value="1">1</option>	
											<option value="2">2</option>
											<option value="3">3</option>';		
										break;
									case 1:
										echo '<option value="0">0</option>
											<option selected value="'.$_POST['kids'][$i].'">'.$_POST['kids'][$i].'</option>
											<option value="2">2</option>
											<option value="3">3</option>';		
										break;
									case 2:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option selected value="'.$_POST['kids'][$i].'">'.$_POST['kids'][$i].'</option>
											<option value="3">3</option>';
										break;
									case 3:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option selected value="'.$_POST['kids'][$i].'">'.$_POST['kids'][$i].'</option>';
									default:
										echo '
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>';
										break;
								}
						echo"	</select>
							</div>";
						if(($_POST['rooms']-1) == $i){
							echo '
							<div class="col-xs-12 col-sm-2 col-md-2">
								<div class="form-row">
									<div class="form-group" style="width:100%;">
										<button type="submit" class="btn btn-primary center-item" id="sendP" name="btnSearch" style="margin-top: 0px;">
											'.$_GLOBALS['search-enter'].'
										</button>
									</div>
								</div>
							</div>';
							
						}
						else{
							echo '<div class="col-xs-12 col-sm-2 col-md-2"></div>';
						}
					}
				}

			?>

		</div>
		<div class="clearfix"></div>
	</form>

</div>
<div class="row" style="margin: 0px;background-color: #F9EFE4;padding-top: 0px;padding-left: 5px;">
	<div class="col-xs-12 col-sm-4 col-md-4 bg-danger text-white" id="warning-custom"></div>
</div>