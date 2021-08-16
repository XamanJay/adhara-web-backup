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
                        <h3>Reservaciones</h3>
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

                            <h4>Habitación Estandar No Reembolsable (NR)</h4>
                            <table id='seasonsNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Estandar con Alimentos No Reembolsable (BB NR)</h4>
                            <table id='seasonsBBNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">
                            <h4>Habitación Estandar (EP)</h4>

                            <table id='seasonsEP' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Estandar con Alimentos (BB)</h4>
                            <table id='seasonsBB' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Superior NR (SP,NR)</h4>
                            <table id='seasonsSPNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Superior BB NR (SP,BB NR)</h4>
                            <table id='seasonsSPBBNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Superior (SP)</h4>
                            <table id='seasonsSP' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Superior BB (SP,BB)</h4>
                            <table id='seasonsSPBB' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
    
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Ejecutiva NR (EC,NR)</h4>
                            <table id='seasonsECNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Ejecutiva BB NR (EC,BB NR)</h4>
                            <table id='seasonsECBBNR' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Ejecutiva (EC)</h4>
                            <table id='seasonsEC' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Ejecutiva BB (EC,BB)</h4>
                            <table id='seasonsECBB' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
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
                            <h4>Tarifa Magica (Desayuno)</h4>

                            <table id='margaraNRD' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">
                            <h4>Tarifa Magica (EP)</h4>

                            <table id='margaraNRS' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Estandar (EP)</h4>
                            <table id='seasonsEPM' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-12 col-md-12">
                          <div class="dashboard_graph">

                            <h4>Habitación Estandar (NR)</h4>
                            <table id='seasonsNRM' class="dataTable table table-striped table-bordered table-responsive wrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Empieza</th>
                                        <th>Termina</th>
                                        <th>Sencillo</th>
                                        <th>Doble</th>
                                        <th>Triple</th>
                                        <th>Cuadra</th>
                                        <th>Extra</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
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
