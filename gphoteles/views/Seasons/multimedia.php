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
                        <h3>Multimedia GPHoteles Cancún</h3>
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
                    <div class="col-xs-12 col-md-12 col-sm-12">

                      <div id="imgSlide">
                        <?php 

                          $multimediaController = new multimediaController();

                          $idHotel = 1;
                          $seccion = 1;//Seccion de Home
                          $categoria = 1;//Categoria de Sliders
                          $idioma = 0;
                          $imgSlide = $multimediaController->getImg($idHotel,$seccion,$categoria,$idioma);   
                          foreach ($imgSlide as $img) {
                        ?>
                            <div class='col-xs-12 col-sm-6 col-md-6'>
                              <img src='/img/adhara/img_slider/<?php echo $img->getUrl(); ?>' alt='<?php echo $img->getNombre(); ?>' class='img-responsive'>
                            </div>
                            <div class='col-xs-12 col-sm-6 col-md-6'>
                              <form enctype="multipart/form-data" action="/Multimedia/img" method="POST">
                                  <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                                  <input type="hidden" name="MAX_FILE_SIZE" value="900000" />
                                  <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
                                  Enviar este fichero: <input name="banner-home" type="file" required />
                                  <input type="number" name="idHotel" value="1" style="display: none;">
                                  <input type="number" name="seccion" value="1" style="display: none;">
                                  <input type="number" name="categoria" value="1" style="display: none;">
                                  <input type="number" name="idioma" value="0" style="display: none;">
                                  <input type="submit" value="Enviar fichero" />
                              </form>
                            </div>
                        <?php
                          }
                        ?>
                      </div>

                      
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <?php phpinfo(); ?>
                      </div>
                      

                    </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">
                            <form class="" id="seasonM" action="" method="GET">
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
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>

                          <?php 

                          if (isset($_GET['margaras'])) {
                            
                            if (isset($_GET['priceM'])) {
                              $price = $_GET['priceM'];
                            }
                            if (isset($_GET['empiezaM'])) {
                              $startDate = $_GET['empiezaM'];
                            }
                            if (isset($_GET['terminaM'])) {
                              $endDate = $_GET['terminaM'];
                            }
                            if (isset($_GET['extraM'])) {
                              $extraPerson = $_GET['extraM'];
                            }

                            $seasonController = new SeasonsController();
                            $margaritasId= 2;

                            /* Habitacion Estandar EP Margaritas */
                            $seasonM = $seasonController->createEPM($price,$startDate,$endDate,$extraPerson);
                            $seasonController->createSeason($seasonM,$margaritasId);

                            /* Habitacion Estandar NR Margaritas */
                            $seasonNRM = $seasonController->createNRM($price,$startDate,$endDate,$extraPerson);
                            $seasonController->createSeason($seasonNRM,$margaritasId);

                          }

                          ?>

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
    </script>
	
  </body>
</html>
