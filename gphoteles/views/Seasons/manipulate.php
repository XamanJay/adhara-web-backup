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
                        <h3>StopSales/Rooms</h3>
                    </div>
                </div>
            </div>

             <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">StopSales</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Rooms</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-12 col-md-12">
                      <div class="dashboard_graph">
                        <table id='stopSales' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Habitación</th>
                                    <th>Empieza</th>
                                    <th>Termina</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Habitación</th>
                                    <th>Empieza</th>
                                    <th>Termina</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">
                            <table id='rooms' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Capacidad</th>
                                        <th>Allotment</th>
                                        <th>kidsAllow</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Capacidad</th>
                                        <th>Allotment</th>
                                        <th>kidsAllow</th>
                                    </tr>
                                </tfoot>
                            </table>
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

	
  </body>
</html>
