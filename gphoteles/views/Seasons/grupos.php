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
                        <h3>Grupos</h3>
                    </div>
                </div>
            </div>

            <div id="home"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                      <div class="dashboard_graph">
                        <table id='grupos' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Empieza</th>
                                    <th>Termina</th>
                                    <th>Nombre</th>
                                    <th>Hotel</th>
                                    <th>Habitación</th>
                                    <th>Single</th>
                                    <th>Double</th>
                                    <th>Triple</th>
                                    <th>Cuadra</th>
                                    <th>Extra</th>
                                    <th>Meal Adult</th>
                                    <th>Meal Kid</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Empieza</th>
                                    <th>Termina</th>
                                    <th>Nombre</th>
                                    <th>Hotel</th>
                                    <th>Habitación</th>
                                    <th>Single</th>
                                    <th>Double</th>
                                    <th>Triple</th>
                                    <th>Cuadra</th>
                                    <th>Extra</th>
                                    <th>Meal Adult</th>
                                    <th>Meal Kid</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
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

	
  </body>
</html>
