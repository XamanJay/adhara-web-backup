<div class="container-fluid" style="background-color: #ee57b5;padding-top: 20px;">
	<form action="disponibilidad.php" method="POST" id="buscador">
		<div class="form-row">
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-llegada']; ?></strong></p>
					<div class='input-group date' id='startDate'>
						<span class="input-group-addon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
						<input type='text' class="form-control widthCustom" name="empieza" required placeholder="llegada" value="<?php echo ($_POST&&(isset($_POST['empieza'])) ? $_POST['empieza'] : ''); ?>" />
			        </div>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-salida']; ?></strong></p>
					<div class='input-group date' id='endDate'>
						<span class="input-group-addon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
						<input type='text' class="form-control widthCustom" name="termina" required placeholder="salida" value="<?php echo ($_POST&&(isset($_POST['termina'])) ? $_POST['termina'] : ''); ?>" />
			        </div>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-rooms']; ?></strong></p>
					<select class="custom-select centerItems widthCustom" name="rooms" id="rooms" required>
						<?php 
							if (isset($_POST['rooms'])) {
								echo '<option selected value="'.$_POST['rooms'].'">'.$_POST['rooms'].'</option>';
							}
							else{
								echo '<option selected value="1">1</option>';
							}
						?>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<p style="margin-bottom: 0px;color: white;"><strong><?php echo $_GLOBALS['search-adults']; ?></strong></p>
					<select class="custom-select centerItems widthCustom" name="adults[0]" required>
						<?php 
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
					<select class="custom-select centerItems widthCustom" name="kids[0]" required>
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
					<button type="submit" class="btn btn-primary centerItems widthCustom" id="enviarBut" name="btnSearch"><?php echo $_GLOBALS['search-btn']; ?></button>
				</div>
				
		</div>
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
								<div class="form-row" >
									<div class="form-group" style="width:100%;">
										<button type="submit" class="btn btn-primary centerItems widthCustom" id="sendP" name="btnSearch" style="margin-top: 0px;">
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
	</form>
</div>