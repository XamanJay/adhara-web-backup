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

                        <h3>Reserva ID: <?php echo $idReserva; ?> </h3>

                    </div>

                </div>



                <div class="col-xs-12 col-md-12">

                  

                  <!-- Nav tabs -->

                  <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Reserva</a></li>

                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Solicitar Deposito</a></li>

                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Solicitar Pago en Destino</a></li>

                  </ul>



                  <!-- Tab panes -->

                  <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="home">

                      <div class="row" style="margin-top: 30px;">

                        <div class="col-xs-12 col-sm-6 col-md-6">

                          <div class="row">

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Fecha de Compra:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo date('l, F d, Y, g:i a', strtotime($reserva->getDate())); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Servicio:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getServicio(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Fecha Llegada:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo date('l, F d, Y', strtotime($reserva->getDateFrom())); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Fecha Salida:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo date('l, F d, Y', strtotime($reserva->getDateTo())); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Total:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo "$ ".number_format($reserva->getPrice(), 2, '.', ',')." ".$reserva->getCurrency(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Detalles:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getDetalles(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Comentarios:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getComments(); ?></p>

                            </div>
                            <div class="col-xs-5 col-sm-4 col-md-4">
                              <p>Id Opera:</p>
                            </div>
                            <div class="col-xs-7 col-sm-8 col-md-8">
                              <p> <?php echo $reserva->getIdOpera(); ?></p>
                            </div>

                          </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">

                          <div class="row">

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Cliente:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getNombre()." ".$reserva->getApellido(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Correo:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getCorreo(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Ciudad:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getCiudad(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Pais:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getPais(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Telefono:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getTelefono(); ?></p>

                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-4">

                              <p>Confirmacion:</p>

                            </div>

                            <div class="col-xs-7 col-sm-8 col-md-8">

                              <p> <?php echo $reserva->getResponsable(); ?></p>

                            </div>



                          </div>

                        </div>

                      </div>

                    </div> <!-- EndSeccion Visualizar datos -->

                    <!-- Begin send message to client -->

                    <div role="tabpanel" class="tab-pane fade" id="profile">

                      <div class="container">

                        <form action="" id="sendPago">

                          <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4 form-group">

                              <label for="correoP">Correo</label>

                              <input type="text" name="correoP" class="form-control" value="<?php echo $reserva->getCorreo(); ?>">

                              <input type="hidden" name="idP" value="<?php echo $reserva->getId(); ?>">

                            </div>

                            <div class="col-xs-12 col-sm-2 col-md-2 form-group">

                              <button class="form-control" id="sendP" style="margin-top: 25px;background-color: black; color: white;">Enviar</button>

                              <div id="loadingP" style="display: none;"><img src="/img/loading.gig" alt="Loading..."></div>

                              <div class="hidden" id="responseP"></div>

                            </div>

                          </div>

                        </form>

                        <?php 



                          if ($reserva->getHotel() == "Adhara Cancun") {

                            echo "<img src='/img/logos/adhara.png' alt='Hotel Adhara Cancun' style='width: 150px;'>";

                            $idres = "AD".$reserva->getId();

                          }

                          else{
                            echo "<img src='/img/logos/margaritas.png' alt='Hotel Margaritas Cancun' style='width: 150px;'>";
                            $idres = "MA".$reserva->getId();
                          }
                          echo "<br><h3>NUMERO DE RESERVACIÓN: ".$idres." </h3>";
                          echo "<h4>Total a pagar: $".number_format($reserva->getPrice(), 2, '.', ',')." ".$reserva->getCurrency()."</h4>";
                          echo $reserva->getDetalles();
                          echo "<br><br><h5>Reservación Pendiente de Pago</h5>

                                <p>Muchas gracias por reservar con nosotros. Para poder hacer efectiva su reservación es necesario hacer el depósito o transferencia por el total de la reservación.</p>
                                <p>Transferencia, SPEI, Depósito en cheque en efectivo</p>
                                <hr>
                                <br><b>BANAMEX </b></br>
                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
                                <p>Sucursal: 7001</p>
                                <p>Cuenta: 6366976</p>
                                <p>CLABE: 002 691 700 163 669 765</p>
                                <p>Referencia: Número de Reservación (ver arriba)</p>
                                <hr>
                                <b>SANTANDER</b></br>
                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
                                <p>Cuenta: 65500356884</p>
                                <p>CLABE: 014 691 655 003 568 849</p>
                                <p>Referencia: Número de Reservación (ver arriba)</p>
                                <hr>
                                <b>SANTANDER DLS</b></br>
                                <p>Razón social: PENINSULAR DE HOTELES SA DE CV</p>
                                <p>Cuenta: 82500066595</p>
                                <p>CLABE: 014 691 825 000 665 957</p>
                                <p>Referencia: Número de Reservación (ver arriba)</p>
                                <hr>
                                <b><p>Importante: Es necesario enviar el comprobante de pago al correo reservaciones@gphoteles.com</p>
                                <p>Para cualquier pregunta referente a su reservación favor de contactarnos</p>

                                <p>Llamada sin costo al: 01 800 711-15-31 (México)<br>
                                  Teléfono: +52 (998) 881 65 00<br>
                                  Fax: +52 (998) 884 83 76<br>
                                  reservaciones@gphoteles.com</p>";
                        ?>
                      </div>

                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="messages">
                      <div class="container"> 
                        <form action="" id="sendDestino">
                          <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 form-group">
                              <label for="correoD">Correo</label>
                              <input type="text" name="correoD" class="form-control" value="<?php echo $reserva->getCorreo(); ?>">
                              <input type="hidden" name="idD" value="<?php echo $reserva->getId(); ?>">
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2 form-group">
                              <button class="form-control" id="sendD" style="margin-top: 25px;background-color: black; color: white;">Enviar</button>
                              <div id="loadingD" style="display: none;"><img src="/img/loading.gif" alt="Loading..." style="width: 30px;"></div>
                              <div class="hidden" id="responseD"></div>
                            </div>
                          </div>
                        </form>

                        <?php 
                          echo "<h4>Total a pagar: $".number_format($reserva->getPrice(), 2, '.', ',')." ".$reserva->getCurrency()."</h4>";

                          echo $reserva->getDetalles();

                          echo "<br><br><h3>Reservación (Pago a la llegada)</h3>
                                <br>
                                <p>Muchas gracias por reservar con nosotros. Por favor imprima este mensaje y traígalo con usted junto con una identificación válida con fotografía. Es necesario pagar la totalidad de la reservación a su llegada.</p>
                                <p>Para cualquier pregunta referente a su reservación favor de contactarnos</p>
                                <p>Llamada sin costo al: 01 800 711-15-31 (México)<br>
                                  Teléfono: +52 (998) 881 65 00<br>
                                  Fax: +52 (998) 884 83 76<br>
                                  reservaciones@gphoteles.com</p>";
                        ?>

                      </div>
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

    <script type="text/javascript">

        $(document).ready(function(){



            $("#sendPago").validate({



              rules:{

                correoP:{required: true, email: true},

              },

              messages:{

                correoP:{required: "Pon un correo válidoop."}

              },

              submitHandler: function(form){

                $.ajax({



                  type: "POST",

                  url: "/email/email.php",

                  data: $(form).serialize(),

                  beforeSend:function(){

                    $("#sendP").css("display","none");

                    $("#loadingP").css("display", "block");

                  },

                  success:function(data){

                    $("#sendP").css("display", "block");

                    $("#loadingP").css("display", "none");

                    console.log(data);

                    var object = JSON.parse(data);

                    console.log(object);

                    if (object.type = "success") {

                      $("#responseP").html("");

                      $("#responseP").removeClass("hidden");

                      $("#responseP").addClass("bg-success");

                      $("#responseP").append(object.message);

                    }

                    else{

                      $("#responseP").html("");

                      $("#responseP").removeClass("hidden");

                      $("#responseP").addClass("bg-danger");

                      $("#responseP").append(object.message);

                    }

                  }

                });



              }



            });



            $("#sendDestino").validate({



              rules:{

                correoD:{required: true, email: true},

              },

              messages:{

                correoD:{required: "Pon un correo válido."}

              },

              submitHandler: function(form){

                $.ajax({



                  type: "POST",

                  url: "/email/email.php",

                  data: $(form).serialize(),

                  beforeSend:function(){

                    $("#sendD").css("display","none");

                    $("#loadingD").css("display", "block");

                  },

                  success:function(data){

                    $("#sendD").css("display", "block");

                    $("#loadingD").css("display", "none");

                    console.log(data);

                    var object = JSON.parse(data);

                    if (object.type == "success") {

                      $("#responseD").html("");

                      $("#responseD").removeClass("hidden");

                      $("#responseD").addClass("bg-success");

                      $("#responseD").append(object.message);

                    }

                    else{

                      $("#responseD").html("");

                      $("#responseD").removeClass("hidden");

                      $("#responseD").addClass("bg-danger");

                      $("#responseD").append(object.message);

                    }

                  }

                });



              }



            });



        });

    </script>

	

  </body>



</html>