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
                        <h3>Dolar Tipo de Cambio</h3>
                    </div>
                </div>
            </div>

            <div id="home2"> 
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-xs-6 col-md-6">
                      <div class="dashboard_graph">
                        <table id='tipodeCambio' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Dolar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Dolar</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                      <div class="dashboard_graph">
                        <h2>Hotel Adhara Cancún Promociones</h2>
                        <table id='promoA' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Inicia</th>
                                    <th>Termina</th>
                                    <th>Descuento</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Inicia</th>
                                    <th>Termina</th>
                                    <th>Descuento</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="col-xs-6 col-md-6">
                      <div class="dashboard_graph">
                        <h2>Hotel Margaritas Cancún Promociones</h2>
                        <table id='promoM' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Inicia</th>
                                    <th>Termina</th>
                                    <th>Descuento</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Inicia</th>
                                    <th>Termina</th>
                                    <th>Descuento</th>
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
