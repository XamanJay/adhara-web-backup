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
                        <h3>Cargar Temporadas Tarífa Mágica</h3>
                    </div>
                </div>
            </div>

             <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Hotel Adhara Hacienda Cancún</a></li>
                <li role="presentation"><a href="#margaras" aria-controls="margaras" role="tab" data-toggle="tab">Hotel Margaritas Cancún</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                      <div class="dashboard_graph">
                        <form class="" id="season" action="/controllers/Season/TarifaMagicaController.php" method="POST">
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
                                  <input class="form-control" type="text" name="mealAdult" id="mealAdult" value="8" required >
                                </div>
                                <div class="col-md-6">
                                  <label for="mealKid">Desayuno Niños</label>
                                  <input class="form-control" type="text" name="mealKid" id="mealKid" value="7">
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6 col-sm-12" style="text-align: center;">
                              <div class="form-group">
                                <div class="col-md-4">
                                   <label for="adhara">Todas</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="1" >
                                </div>
                                <div class="col-md-4">
                                  <label for="adhara">Con Desayuno</label>
                                  <input class="form-control" type="checkbox" name="adhara[]" id="adhara" value="12">
                                </div>
                                <div class="col-md-4">
                                  <label for="adhara">Sin Desayuno</label>
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

              <div role="tabpanel" class="tab-pane" id="margaras"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                      <div class="dashboard_graph">
                        <form class="" id="margaritas" action="/controllers/Season/TarifaMagicaController.php" method="POST">
                          <div class="row">
                            <div class='col-sm-12 col-md-6'>
                                <div class="form-group">
                                  <div class="col-md-6">
                                    <label for="empieza">Empieza</label>
                                    <div class='input-group date' id='empieza'>
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                      <input type='text' class="form-control" name="empieza" required />
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="termina">Termina</label>
                                    <div class='input-group date' id='termina'>
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
                                  <input class="form-control" type="text" name="mealAdult" id="mealAdult" value="8" required >
                                </div>
                                <div class="col-md-6">
                                  <label for="mealKid">Desayuno Niños</label>
                                  <input class="form-control" type="text" name="mealKid" id="mealKid" value="7">
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6 col-sm-12" style="text-align: center;">
                              <div class="form-group">
                                <div class="col-md-4">
                                   <label for="margara-all">Todas</label>
                                  <input class="form-control" type="checkbox" name="margara[]" id="margara-all" value="1" >
                                </div>
                                <div class="col-md-4">
                                  <label for="margara-D">Con Desayuno</label>
                                  <input class="form-control" type="checkbox" name="margara[]" id="margara-D" value="14">
                                </div>
                                <div class="col-md-4">
                                  <label for="margara-S">Sin Desayuno</label>
                                  <input class="form-control" type="checkbox" name="margara[]" id="margara-S" value="15">
                                </div>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </div>

                          <div class="row" style="margin-top: 30px;">
                            <div class="col-sm-12 col-md-6">
                              <div class="form-group">
                                <button type="submit" class="btn btn-default" style="margin-left: 15px;">Submit</button>
                                <div id="responseM" style="margin-top: 20px;"></div>
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
                $('#endDate').data("DateTimePicker").minDate(e.date.clone().add(1,"d"));
            });

            $('#empieza').datetimepicker({
              format: 'YYYY-MM-DD',
              minDate: new Date()
            });

            $('#termina').datetimepicker({
              format: 'YYYY-MM-DD',
              useCurrent: false //Important! See issue #1075
            });

            $("#empieza").on("dp.change", function (e) {
                $('#endDate').data("DateTimePicker").minDate(e.date.clone().add(1,"d"));
            });

        });
        $(document).ready(function(){

            $("#season").validate({

              rules:{

                empieza:   { required: true, date: true },
                termina:   { required: true, date: true },
                price:     { required: true, number: true,min: 10 },
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
                    console.log(data);
                    var object = JSON.parse(data);
                    if (object.type == "m") {

                      $("#response").html("");

                      if (object.nrD == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' NR con Desayuno</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.nrD == 2){

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' NR con Desayuno</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' NR con Desayuno</div>';
                        $("#response").append(plantilla);
                      }

                      if (object.nrS == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' NR sin Desayuno</div>';
                        $("#response").append(plantilla);
                      }
                      else if(object.nrS == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' NR sin Desayuno</div>';
                        $("#response").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' NR sin Desayuno</div>';
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

            $("#margaritas").validate({

              rules:{

                empieza:   { required: true, date: true },
                termina:   { required: true, date: true },
                price:     { required: true, number: true,min: 10 },
                extra:     { required: true, number: true },
                mealAdult: { required: true, number: true },
                mealKid:   { required: true, number: true },
                margara:    { required: true }

              },
              messages:{

                empieza:   { required: "Selecciona una fecha por favor." },
                termina:   { required: "Selecciona una fecha por favor." },
                price:     { required: "Ingresa un precio base sin impuestos." },
                extra:     { required: "Ingresa un precio para la persona extra." },
                mealAdult: { required: "Ingresa un precio para el desayuno de adulto." },
                mealKid:   { required: "Ingresa un precio para el desayuno de niño." },
                margara:    { required: "Selecciona una Habitación." }
              },
              submitHandler: function(form){
                $.ajax({
                  type: form.method,
                  url: form.action,
                  data: $(form).serialize(),
                  beforeSend: function(){

                  },
                  success: function(data){
                    console.log(data);
                    var object = JSON.parse(data);
                    if (object.type == "m") {

                      $("#responseM").html("");

                      if (object.nrD == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' NR con Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }
                      else if(object.nrD == 2){

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' NR con Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' NR con Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }

                      if (object.nrS == 1) {
                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.success+' NR sin Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }
                      else if(object.nrS == 2){
                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.repeat+' NR sin Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Danger!</strong> '+object.error+' NR sin Desayuno</div>';
                        $("#responseM").append(plantilla);
                      }

                      $('#season')[0].reset();

                    }// fin de m
                    else{

                      if (object.estatus == "success") {

                        var plantilla = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Success!</strong> '+object.message+'</div>';
                        $("#responseM").html("");
                        $("#responseM").append(plantilla);
                        $('#season')[0].reset();

                      }
                      else{

                        var plantilla = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Error!</strong> '+object.message+'</div>';
                        $("#responseM").html("");
                        $("#responseM").append(plantilla);
                      }
                    }// fin del else

                  }// fin del success

                });
              }

            });
        });
    </script>

  </body>
</html>
