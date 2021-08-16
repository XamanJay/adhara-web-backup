<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel GPHoteles! </title>
    <?php include("views/partialViews/_adminPanelStyles.html"); ?>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- sidebar -->
        <?php include("views/partialViews/_adminPanelSidebar.php"); ?>

        <!-- top navigation -->
        <?php include("views/partialViews/_adminPanelTopNav.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="dashboard_graph">
                        <h3>Cargar Temporadas</h3>
                    </div>
                </div>
            </div>

             <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Hotel Adhara Hacienda Cancún</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hotel Margaritas Cancún</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                      <div class="dashboard_graph">
                        <form class="" id="season" action="/controllers/Season/adharaSeason.php" method="POST">
                          <div class="row">
                            <div class='col-sm-12 col-md-6'>
                                <div class="form-group">
                                  <div class="col-md-6">
                                    <label for="empieza">Empieza</label>
                                    <div class='input-group date' id='startDate'>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                      <input type='text' class="form-control" name="empieza" required />
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="termina">Termina</label>
                                    <div class='input-group date' id='endDate'>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                      <input type='text' class="form-control" name="termina" required />
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <div class="col-md-6">
                                   <label for="price">Precio Base</label>
                                  <input class="form-control" type="text" name="price" id="price">
                                </div>
                                <div class="col-md-6">
                                  <label for="extra">Persona Extra</label>
                                  <input class="form-control" type="text" name="extra" id="extra" value="10" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row" style="margin-top: 30px;">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <div class="col-md-6">
                                   <label for="mealAdult">Desayuno Adulto</label>
                                  <input class="form-control" type="text" name="mealAdult" id="mealAdult" value="10" required >
                                </div>
                                <div class="col-md-6">
                                  <label for="mealKid">Desayuno Niños</label>
                                  <input class="form-control" type="text" name="mealKid" id="mealKid" value="7">
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6 col-sm-12" style="text-align: center;">
                              <div class="form-group">
                                <div class="col-md-2">
                                   <label for="adhara">Todas</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="1" >
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">EP</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="2">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">BB</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="3">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="4">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">EJEC</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="5">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">SUP</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="6">
                                </div>  
                                <div class="clearfix"></div>
                              </div>

                              <div class="form-group" style="margin-top: 20px;">
                                <div class="col-md-2">
                                  <label for="adhara">SUP NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="7">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">SUP BB</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="8">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">EJEC NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="9">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">EJEC BB</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="10">
                                </div>

                                <div class="col-md-2">
                                  <label for="adhara">EP BB NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="11">
                                </div>

                                <div class="col-md-2">
                                  <label for="adhara">SP BB NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="12">
                                </div>
                                <div class="col-md-2">
                                  <label for="adhara">EC BB NR</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="13">
                                </div>

                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>

                          <div class="row" style="margin-top: 30px;">
                            <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                <button type="submit" class="btn btn-default" style="margin-left: 15px;">Submit</button>
                                <div id="response" style="margin-top: 20px;"></div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                              <p style="margin-left: 15px;">Nota: Aqui se selecciona si la temporada que esta apunto de cargarse sera para todas las habitaciones o solo para una o varias habitaciones</p>
                            </div>

                          </div>
            
                        </form>
                      </div>
                    </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">
                            <form class="" id="seasonM" action="/controllers/Season/margarasSeason.php" method="POST">
                              <div class="row">
                                <div class='col-sm-12 col-md-6'>
                                    <div class="form-group">
                                      <div class="col-md-6">
                                        <label for="empiezaM">Empieza</label>
                                        <div class='input-group date' id='startDateM'>
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                          <input type='text' class="form-control" name="empiezaM" required />
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="terminaM">Termina</label>
                                        <div class='input-group date' id='endDateM'>
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                          <input type='text' class="form-control" name="terminaM" required />
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <div class="col-md-6">
                                       <label for="priceM">Precio Base</label>
                                      <input class="form-control" type="text" name="priceM" id="priceM">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="extraM">Persona Extra</label>
                                      <input class="form-control" type="text" name="extraM" id="extraM" value="10" required>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row" style="margin-top: 30px;">
                                <div class="col-sm-12 col-md-6">
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="margin-left: 15px;" name="margaras" id="margaras">Submit</button>
                                    <div id="responseM" style="margin-top: 20px;"></div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>

                        </div>
                    </div>
                </div>
            </div> <!-- fin tab container -->
        </div>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>

    <?php include("views/partialViews/_adminPanelScripts.html"); ?>
    <script type="text/javascript">
        $(function () {
            $('#startDate').datetimepicker({
              format: 'YYYY-MM-DD',
              minDate: new Date()
            });

            $('#endDate').datetimepicker({
              format: 'YYYY-MM-DD',
              useCurrent: false //Important! See issue #1075
            });

            $("#startDate").on("dp.change", function (e) {
                $('#endDate').data("DateTimePicker").minDate(e.date);
            });

            $('#startDateM').datetimepicker({
              format: 'YYYY-MM-DD',
              minDate: new Date()
            });

            $('#endDateM').datetimepicker({
              format: 'YYYY-MM-DD',
              useCurrent: false //Important! See issue #1075
            });

            $("#startDateM").on("dp.change", function (e) {
                $('#endDateM').data("DateTimePicker").minDate(e.date);
            });

        });
        $(document).ready(function(){

            $("#season").validate({

              rules:{

                empieza:   { required: true, date: true },
                termina:   { required: true, date: true },
                price:     { required: true, number: true,min:10 },
                extra:     { required: true, number: true },
                mealAdult: { required: true, number: true },
                mealKid:   { required: true, number: true },
                adhara:    { required: true }

              },
              messages:{

                empieza:   { required: "Selecciona una fecha por favor." },
                termina:   { required: "Selecciona una fecha por favor." },
                price:     { required: "Ingresa un precio base sin impuestos." },
                extra:     { required: "Ingresa un precio para la persona extra." },
                mealAdult: { required: "Ingresa un precio para el desayuno de adulto." },
                mealKid:   { required: "Ingresa un precio para el desayuno de niño." },
                adhara:    { required: "Selecciona una Habitación." }
              },
              submitHandler: function(form){
                $.ajax({
                  type: form.method,
                  url: form.action,
                  data: $(form).serialize(),
                  beforeSend: function(){

                  },
                  success: function(data){
                    var object = JSON.parse(data);
                    if (object.type == "m") {

                      $("#response").html("");

                      if (object.ep == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' EP</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.ep == 2){

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' EP</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' EP</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.bb == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' BB</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.bb == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' BB</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' BB</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.nr == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.nr == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' NR</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.sp == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' SP</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.sp == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' SP</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' SP</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.ec == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' EJEC</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.ec == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' EJEC</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' EJEC</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.ecNR == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' EJEC NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.ecNR == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' EJEC NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' EJEC NR</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.ecBB == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' EJEC BB</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.ecBB == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' EJEC BB</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' EJEC BB</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.spNR == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' Superior NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.spNR == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' Superior NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' Superior NR</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.spBB == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' Superior BB</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.spBB == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' Superior BB</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' Superior BB</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.epBBNR == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' Estandar BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.epBBNR == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' Estandar BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' Estandar BB NR</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.spBBNR == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' Superior BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.spBBNR == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' Superior BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' Superior BB NR</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.ecBBNR == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' Ejecutivo BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.ecBBNR == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' Ejecutivo BB NR</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' Ejecutivo BB NR</div>';
                        $("#response").append(plantilla);
                      }

                      $('#season')[0].reset();

                    }// fin de m
                    else{

                      if (object.estatus == "success") {

                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.message+'</div>';
                        $("#response").html("");
                        $("#response").append(plantilla);
                        $('#season')[0].reset();

                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Error!</strong> '+object.message+'</div>';
                        $("#response").html("");
                        $("#response").append(plantilla);
                      }
                    }// fin del else

                  }// fin del success

                });
              }

            });

            $("#seasonM").validate({

              rules:{
                empiezaM: { required: true, date: true },
                terminaM: { required: true, date: true },
                priceM:   { required: true, number:true,min: 10 },
                extraM:   { required: true, number: true }
              },
              messages:{

                empiezaM: { required: "Selecciona una fecha por favor." },
                terminaM: { required: "Selecciona una fecha por favor." },
                priceM:   { required: "Ingresa un precio base sin impuestos." },
                extraM:   { required: "Ingresa un precio para la persona extra." }
              },
              submitHandler: function(form){

                  $.ajax({
                    type: form.method,
                    url: form.action,
                    data: $(form).serialize(),
                    beforeSend:function(){

                    },
                    success: function(data){
                        var object = JSON.parse(data);
                        if (object.ep == 1) {
                            var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Success!</strong> '+object.success+' EP</div>';
                            $("#responseM").append(plantilla);
                        }
                        else if(object.ep == 2){
                            var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Danger!</strong> '+object.repeat+' EP</div>';
                            $("#responseM").append(plantilla);
                        }
                        else{
                            var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Danger!</strong> '+object.error+' EP</div>';
                            $("#responseM").append(plantilla);
                        }
                        if (object.nr == 1) {
                            var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Success!</strong> '+object.success+' NR</div>';
                            $("#responseM").append(plantilla);
                        }
                        else if(object.nr == 2){
                            var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Danger!</strong> '+object.repeat+' NR</div>';
                            $("#responseM").append(plantilla);
                        }
                        else{
                            var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong>Danger!</strong> '+object.error+' NR</div>';
                            $("#responseM").append(plantilla);
                        }
                        $('#seasonM')[0].reset();
                    }
                  });
              }
            });
        });
    </script>
	
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

  </body>
</html>
