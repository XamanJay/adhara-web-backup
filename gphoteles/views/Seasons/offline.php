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
                  <h3>Reservaciones Offline</h3>
               </div>
            </div>
         </div> 
         <div class="row" style="margin-bottom: 20px;">
            <div class="col-xs-12 col-md-12">
               <div class="dashboard_graph">
                  <form action="" id="reservaForm">
                     <p><strong>Información del Cliente:</strong></p>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="name" class="label-control">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <label for="email" class="label-control">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                        <label for="estado" class="label-control">Estado / Región</label>
                        <input type="text" name="estado" id="estado" class="form-control" required>
                        <label for="pais" class="label-control">País</label>
                        <select name="pais" id="pais" class="form-control">
                           <option value=' selected='selected'>Seleccionar</option>
                           <option value='MX' >Mexico</option>
                           <option value='US' >United States</option>
                           <option value=''>--</option>
                           <option value='AF' >Afghanistan</option>
                           <option value='AL' >Albania</option>
                           <option value='DZ' >Algeria</option>
                           <option value='AS' >American Samoa</option>
                           <option value='AD' >Andorra</option>
                           <option value='AO' >Angola</option>
                           <option value='AI' >Anguilla</option>
                           <option value='AQ' >Antarctica</option>
                           <option value='AG' >Antigua and Barbuda</option>
                           <option value='AR' >Argentina</option>
                           <option value='AM' >Armenia</option>
                           <option value='AW' >Aruba</option>
                           <option value='AU' >Australia</option>
                           <option value='AT' >Austria</option>
                           <option value='AZ' >Azerbaidjan</option>
                           <option value='BS' >Bahamas</option>
                           <option value='BH' >Bahrain</option>
                           <option value='BD' >Bangladesh</option>
                           <option value='BB' >Barbados</option>
                           <option value='BY' >Belarus</option>
                           <option value='BE' >Belgium</option>
                           <option value='BZ' >Belize</option>
                           <option value='BJ' >Benin</option>
                           <option value='BM' >Bermuda</option>
                           <option value='BT' >Bhutan</option>
                           <option value='BO' >Bolivia</option>
                           <option value='BA' >Bosnia-Herzegovina</option>
                           <option value='BW' >Botswana</option>
                           <option value='BV' >Bouvet Island</option>
                           <option value='BR' >Brazil</option>
                           <option value='IO' >British Indian Ocean</option>
                           <option value='BN' >Brunei Darussalam</option>
                           <option value='BG' >Bulgaria</option>
                           <option value='BF' >Burkina Faso</option>
                           <option value='BI' >Burundi</option>
                           <option value='KH' >Cambodia</option>
                           <option value='CM' >Cameroon</option>
                           <option value='CA' >Canada</option>
                           <option value='CV' >Cape Verde</option>
                           <option value='KY' >Cayman Islands</option>
                           <option value='CF' >Central African Republic</option>
                           <option value='CC' >Cocos (Keeling) Islands</option>
                           <option value='CO' >Colombia</option>
                           <option value='KM' >Comoros</option>
                           <option value='CG' >Congo</option>
                           <option value='CK' >Cook Islands</option>
                           <option value='CR' >Costa Rica</option>
                           <option value='HR' >Croatia</option>
                           <option value='CU' >Cuba</option>
                           <option value='CY' >Cyprus</option>
                           <option value='CZ' >Czech Republic</option>
                           <option value='TD' >Chad</option>
                           <option value='CL' >Chile</option>
                           <option value='CN' >China</option>
                           <option value='CX' >Christmas Island</option>
                           <option value='DK' >Denmark</option>
                           <option value='DJ' >Djibouti</option>
                           <option value='DM' >Dominica</option>
                           <option value='DO' >Dominican Republic</option>
                           <option value='TP' >East Timor</option>
                           <option value='EC' >Ecuador</option>
                           <option value='EG' >Egypt</option>
                           <option value='SV' >El Salvador</option>
                           <option value='GQ' >Equatorial Guinea</option>
                           <option value='EE' >Estonia</option>
                           <option value='ET' >Ethiopia</option>
                           <option value='FK' >Falkland Islands</option>
                           <option value='FO' >Faroe Islands</option>
                           <option value='FJ' >Fiji</option>
                           <option value='FI' >Finland</option>
                           <option value='SU' >Former USSR</option>
                           <option value='FR' >France</option>
                           <option value='GF' >French Guyana</option>
                           <option value='TF' >French Southern Territories</option>
                           <option value='GA' >Gabon</option>
                           <option value='GM' >Gambia</option>
                           <option value='GE' >Georgia</option>
                           <option value='DE' >Germany</option>
                           <option value='GH' >Ghana</option>
                           <option value='GI' >Gibraltar</option>
                           <option value='GB' >Great Britain/UK</option>
                           <option value='GR' >Greece</option>
                           <option value='GL' >Greenland</option>
                           <option value='GD' >Grenada</option>
                           <option value='GP' >Guadeloupe (French)</option>
                           <option value='GU' >Guam (USA)</option>
                           <option value='GT' >Guatemala</option>
                           <option value='GN' >Guinea</option>
                           <option value='GW' >Guinea Bissau</option>
                           <option value='GY' >Guyana</option>
                           <option value='HT' >Haiti</option>
                           <option value='HM' >Heard &amp; McDonald Islands</option>
                           <option value='HN' >Honduras</option>
                           <option value='HK' >Hong Kong</option>
                           <option value='HU' >Hungary</option>
                           <option value='IS' >Iceland</option>
                           <option value='IN' >India</option>
                           <option value='ID' >Indonesia</option>
                           <option value='IR' >Iran</option>
                           <option value='IQ' >Iraq</option>
                           <option value='IE' >Ireland</option>
                           <option value='IL' >Israel</option>
                           <option value='IT' >Italy</option>
                           <option value='CI' >Ivory Coast</option>
                           <option value='JM' >Jamaica</option>
                           <option value='JP' >Japan</option>
                           <option value='JO' >Jordan</option>
                           <option value='KZ' >Kazakhstan</option>
                           <option value='KE' >Kenya</option>
                           <option value='KI' >Kiribati</option>
                           <option value='KW' >Kuwait</option>
                           <option value='KG' >Kyrgyzstan</option>
                           <option value='LA' >Laos</option>
                           <option value='LV' >Latvia</option>
                           <option value='LB' >Lebanon</option>
                           <option value='LS' >Lesotho</option>
                           <option value='LR' >Liberia</option>
                           <option value='LY' >Libya</option>
                           <option value='LI' >Liechtenstein</option>
                           <option value='LT' >Lithuania</option>
                           <option value='LU' >Luxembourg</option>
                           <option value='MO' >Macau</option>
                           <option value='MK' >Macedonia</option>
                           <option value='MG' >Madagascar</option>
                           <option value='MW' >Malawi</option>
                           <option value='MY' >Malaysia</option>
                           <option value='MV' >Maldives</option>
                           <option value='ML' >Mali</option>
                           <option value='MT' >Malta</option>
                           <option value='MH' >Marshall Islands</option>
                           <option value='MQ' >Martinique</option>
                           <option value='MR' >Mauritania</option>
                           <option value='MU' >Mauritius</option>
                           <option value='YT' >Mayotte</option>
                           <option value='MX' >Mexico</option>
                           <option value='FM' >Micronesia</option>
                           <option value='MD' >Moldavia</option>
                           <option value='MC' >Monaco</option>
                           <option value='MN' >Mongolia</option>
                           <option value='MS' >Montserrat</option>
                           <option value='MA' >Morocco</option>
                           <option value='MZ' >Mozambique</option>
                           <option value='MM' >Myanmar</option>
                           <option value='NA' >Namibia</option>
                           <option value='NR' >Nauru</option>
                           <option value='NP' >Nepal</option>
                           <option value='NL' >Netherlands</option>
                           <option value='AN' >Netherlands Antillas</option>
                           <option value='NT' >Neutral Zone</option>
                           <option value='NC' >New Caledonia</option>
                           <option value='NZ' >New Zealand</option>
                           <option value='NI' >Nicaragua</option>
                           <option value='NE' >Niger</option>
                           <option value='NG' >Nigeria</option>
                           <option value='NU' >Niue</option>
                           <option value='NF' >Norfolk Island</option>
                           <option value='KP' >North Corea</option>
                           <option value='MP' >Northern Mariana Islands</option>
                           <option value='NO' >Norway</option>
                           <option value='OM' >Oman</option>
                           <option value='PK' >Pakistan</option>
                           <option value='PW' >Palau</option>
                           <option value='PA' >Panama</option>
                           <option value='PG' >Papua New Guinea</option>
                           <option value='PY' >Paraguay</option>
                           <option value='PE' >Peru</option>
                           <option value='PH' >Philippines</option>
                           <option value='PN' >Pitcairn Island</option>
                           <option value='PL' >Poland</option>
                           <option value='PF' >Polynesia</option>
                           <option value='PT' >Portugal</option>
                           <option value='PR' >Puerto Rico</option>
                           <option value='QA' >Qatar</option>
                           <option value='RE' >Reunion</option>
                           <option value='RO' >Romania</option>
                           <option value='RU' >Russian Federation</option>
                           <option value='RW' >Rwanda</option>
                           <option value='GS' >S. Georgia Is. </option>
                           <option value='SH' >Saint Helena</option>
                           <option value='KN' >Saint Kitts &amp; Nevis Anguilla</option>
                           <option value='LC' >Saint Lucia</option>
                           <option value='PM' >Saint Pierre and Miquelon</option>
                           <option value='ST' >Saint Tome and Principe</option>
                           <option value='VC' >Saint Vicent &amp; Grenadines</option>
                           <option value='WS' >Samoa</option>
                           <option value='SM' >San Marino</option>
                           <option value='SA' >Saudi Arabia</option>
                           <option value='SN' >Senegal</option>
                           <option value='SC' >Seychelles</option>
                           <option value='SL' >Sierra Leone</option>
                           <option value='SG' >Singapore</option>
                           <option value='SK' >Slovak Republic</option>
                           <option value='SI' >Slovenia</option>
                           <option value='SB' >Solomon Islands</option>
                           <option value='SO' >Somalia</option>
                           <option value='ZA' >South Africa</option>
                           <option value='KR' >South Corea</option>
                           <option value='ES' >Spain</option>
                           <option value='LK' >Sri Lanka</option>
                           <option value='SD' >Sudan</option>
                           <option value='SR' >Suriname</option>
                           <option value='SJ' >Svalvard &amp; Jan Mayen Is.</option>
                           <option value='SZ' >Swaziland</option>
                           <option value='SE' >Sweden</option>
                           <option value='CH' >Switzerland</option>
                           <option value='SY' >Syria</option>
                           <option value='TJ' >Tadjikistan</option>
                           <option value='TW' >Taiwan</option>
                           <option value='TZ' >Tanzania</option>
                           <option value='TH' >Thailand</option>
                           <option value='TG' >Togo</option>
                           <option value='TK' >Tokelau</option>
                           <option value='TO' >Tonga</option>
                           <option value='TT' >Trinidad and Tobago</option>
                           <option value='TN' >Tunisia</option>
                           <option value='TR' >Turkey</option>
                           <option value='TM' >Turkmenistan</option>
                           <option value='TC' >Turks and Caicos Islands</option>
                           <option value='TV' >Tuvalu</option>
                           <option value='UG' >Uganda</option>
                           <option value='UA' >Ukraine</option>
                           <option value='AE' >United Arab Emirates</option>
                           <option value='US' >United States</option>
                           <option value='UY' >Uruguay</option>
                           <option value='MI' >USA Military</option>
                           <option value='UM' >USA Minor Outlying Islands</option>
                           <option value='UZ' >Uzbekistan</option>
                           <option value='VU' >Vanuatu</option>
                           <option value='VA' >Vatican City State</option>
                           <option value='VE' >Venezuela</option>
                           <option value='VN' >Vietnam</option>
                           <option value='VG' >Virgin Islands (British)</option>
                           <option value='VI' >Virgin Islands (USA)</option>
                           <option value='WF' >Wallis and Futura Islands</option>
                           <option value='EH' >Western Sahara</option>
                           <option value='YE' >Yemen</option>
                           <option value='YU' >Yugoslavia</option>
                           <option value='ZR' >Zaire</option>
                           <option value='ZM' >Zambia</option>
                           <option value='ZW' >Zimbabwe</option>
                        </select>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="apellido" class="label-control">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" required>
                        <label for="ciudad" class="label-control">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                        <label for="telefono" class="label-control">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                     </div>
                     <div class="clearfix"></div>
                     <p><strong>Descripcion del Servicio:</strong></p>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="servicio" class="label.label-control">Servicio</label>
                        <select name="servicio" id="servicio" class="form-control">
                           <option value="">Choose...</option>
                           <option value="hotel">Hotel</option>
                           <option value="otro">Otro</option>
                        </select>
                        <label for="llegada" class="label-control">Llegada</label>
                        <div class='input-group date' id='startDate'>
                           <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                           <input type='text' class="form-control" name="llegada" required />
                        </div>
                        <label for="adultos" class="label-control">Adultos</label>
                        <input type="text" name="adultos" id="adultos" class="form-control" required>
                        <label for="salida" class="label-control">Habitación</label>
                        <select name="habitacion" id="habitacion" class="form-control">
                           <option value="">Choose...</option>
                           <option value="1">Habitacion No Reembolsable Adhara</option>
                           <option value="2">Habitacion con Desayuno Adhara</option>
                           <option value="3">Habitacion Estandar Adhara</option>
                           <option value="4">Habitacion Superior Adhara</option>
                           <option value="5">Habitacion Ejecutivo Adhara</option>
                           <option value="6">Habitacion Estandar Margaritas</option>
                           <option value="11">Habitacion No Reembolsable Margaritas</option>
                        </select>
                        <label for="total" class="label-control">Total</label>
                        <input type="text" name="total" id="total" class="form-control" required>
                        <label for="formaPago">Forma de Pago</label>
                        <select name="formaPago" id="formaPago" class="form-control">
                           <option value="">Choose...</option>
                           <option value="credit card">Visa</option>
                           <option value="paypal">Paypal</option>
                           <option value="deposito">Deposito</option>
                           <option value="destino">Efectivo</option>
                           <option value="whatsapp">Whatsapp</option>
                           <option value="pagoHotel">Pago Hotel</option>
                           <option value="otro">Otro</option>
                        </select>
                        <label for="comentarios" class="label-control">Comentarios</label>
                        <textarea name="comentarios" id="comentarios" cols="30" rows="5" class="form-control" style="resize: none;"></textarea>
                        <button id="sendForm">Enviar</button>
                        <div id="preloading" style="display: none;">
                           <img src="/_assets/img/loading.gif" alt="loading...">
                        </div>
                        <div id="respuesta" style="padding: 10px;margin-top: 10px;text-align: center;"></div>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="hotel" class="label-control">Hotel</label>
                        <select name="hotel" id="hotel" class="form-control">
                           <option value="">Choose...</option>
                           <option value="1">Hotel Adhara Hacienda Cancun</option>
                           <option value="2">Hotel Margaritas Cancun</option>
                        </select>
                        <label for="salida" class="label-control">Salida</label>
                        <div class='input-group date' id='endDate'>
                           <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                           </span>
                           <input type='text' class="form-control" name="salida" required />
                        </div>
                        <label for="kids" class="label-control">Niños</label>
                        <input type="text" name="kids" id="kids" class="form-control" required>
                        <label for="num_rooms" class="label-control">No de Cuartos</label>
                        <input type="number" name="num_rooms" id="num_rooms" class="form-control" required>
                        <label for="moneda" class="label-control">Moneda</label>
                        <select name="moneda" id="moneda" class="form-control">
                           <option value="">Choose...</option>
                           <option value="MXN">MXN</option>
                           <option value="USD">USD</option>
                           <option value="PTS">PTS</option>
                        </select>
                        <label for="estatus" class="label-control">Estatus</label>
                        <select name="estatus" id="estatus" class="form-control">
                           <option value="">Choose...</option>
                           <option value="3">Aprobada</option>
                           <option value="2">Pago pendiente</option>
                        </select>
                        <label for="clubestrella" class="label-control">Club Estrella</label>
                        <select name="clubestrella" id="clubestrella" class="form-control">
                           <option value="">Choose...</option>
                           <option value="0">No</option>
                           <option value="1">Sí</option>
                        </select>
                     </div>
                     <div class="clearfix"></div>
                  </form>
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


         $("#reservaForm").validate({

            rules:{

               name: { required: true, minlength: 2},
               apellido: { required: true, minlength: 2},
               email: { required: true, email: true},
               ciudad: { required: true, minlength: 2},
               estado: {required: true, minlength: 2},
               pais: { required: true, minlength: 1},
               telefono: { required: true, minlength: 2},
               servicio: { required: true},
               llegada: { required: true, minlength: 2},
               salida: { required: true, minlength: 2},
               formaPago: { required: true },
               hotel: {required: true},
               moneda: { required: true },
               estatus: { required: true },
               total: { required: true, minlength: 2},
               habitacion: { required: true},
               num_rooms: { required: true, minlength: 1},
               adultos: { required: true, minlength: 1},
               kids: { required: true, minlength: 1},
               clubestrella: { required: true}
            },
            messages:{

               name:{ required: "Introduce el nombre del cliente"},
               apellido: { required: "Introduce el apellido del cliente"},
               email:{ required: "Introduce el email del cliente"},
               ciudad: { required: "Introduce la ciudad del cliente"},
               estado: {required: "Introduce el estado del cliente"},
               pais: {required: "Introduce el pais del cliente"},
               telefono:{ required: "Introduce el telefono del cliente"},
               servicio:{ required: "Introduce el tipo de servicio del cliente"},
               llegada: { required: "Pon la fecha de llegada del cliente"},
               salida: { required: "Pon la fecha de salida del cliente"},
               formaPago: { required: "Indica la forma de pago del cliente"},
               hotel: { required: "Selecciona el hotel a hospedar"},
               moneda: { required: "Selecciona el tipo de moneda"},
               estatus: { required: "Indica el estado de la reserva"},
               total: {required: "Introduce la cantidad a pagar"},
               habitacion: { required: "Selecciona el tipo de habitacion"},
               num_rooms: { required: "Indica el numero de cuartos para la reserva"},
               adultos: { required: "Indica el numero de adultos"},
               kids: { required: "Indica el numero de niños"},
               clubestrella: { required: "Selecciona si es cliente clubestrella"}
            },
            submitHandler: function(form){
               $.ajax({
                  type: "POST",
                  url: "/Seasons/offline",
                  data: $(form).serialize(),
                  beforeSend: function(){

                     $("#preloading").css("display", "block");
                     $("#sendForm").css("display", "none");
                  },
                  success: function(data){

                     var object = JSON.parse(data);
                     if (object.type == "success") {
                        $("#preloading").css("display", "none");
                        $("#sendForm").css("display", "block");
                        $("#respuesta").html("");
                        $("#respuesta").addClass("bg-success");
                        $("#respuesta").append(object.message);
                        $("#reservaForm").reset();
                     }
                     else{
                        $("#preloading").css("display", "none");
                        $("#sendForm").css("display", "block");
                        $("#respuesta").html("");
                        $("#respuesta").addClass("bg-warning");
                        $("#respuesta").append(object.message);
                     }
                  },
                  failed: function(result){
                     console.log(result);
                  }
               });
            }
         });
      });
    </script>
	
  </body>
</html>
