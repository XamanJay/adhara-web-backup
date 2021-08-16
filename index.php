<?php

/*Librerias Oktrip*/


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

require 'vendor/autoload.php';

$router = new RouteCollector();


require 'models/db.php';
require 'models/hotel.php';
require 'models/cliente.php';
require 'models/geoplugin.php';


//require 'models/User/persona.php';



require 'controllers/HomeController.php';
require 'controllers/hotelController.php';
require 'controllers/ReservasController.php';
require 'controllers/ClubestrellaController.php';
require 'controllers/clienteController.php';
require 'controllers/emailController.php';
require 'controllers/BanamexController.php';
require 'controllers/PaypalController.php';
require 'controllers/OverBookingController.php';
require 'controllers/PagoBancarioController.php';
require 'controllers/AESEncriptacion.php';
require 'controllers/SantanderController.php';
require 'controllers/CovidController.php';
require 'controllers/MenuAdharaController.php';
require 'controllers/RoomServiceController.php';





//include 'lang/Language.php';

ini_set('memory_limit', '-1');

/*
*  Si tu localhost está seccionada por carpetas dejar la variable $dominio con "oktrip" o como se llame la carpeta de tu proyecto oktrip. 
Ejemplo: http://localhost/oktrip/...

*  También necesitas cambiar las rutas de los assets en los Views y agregarle la ruta relativa: ya sea "/oktrip" o solo "/".
Ejemplo:  <link rel="stylesheet" type="text/css" href="/oktripv2.0/css/bootstrap.min.css">
<script type="text/javascript" src="/oktripv2.0/js/jquery-3.2.1.min.js"></script>

*  Pero si tienes tu localhost como un dominio local dejar la variable $dominio vacía, para ello necesitas tener
los VirtualHost activado en tu servidor apache, consulta el siguiente link y seguir el tutorial:
https://styde.net/creando-virtual-hosts-con-apache-en-windows-para-wamp-o-xampp/

*/
$dominio = ""; 

try {

   /* Crear las rutas sin controladores
   $router->get($dominio.'/home', function(){ 
   include('views/home.php');
   return '<br>';
   });

   $router->get($dominio.'/account/login', function(){
   return 'Login';
   });

   */
   $router->controller($dominio.'/', 'HomeController');
   $router->controller($dominio.'/reservas', 'ReservasController');
   $router->controller($dominio.'/clubestrella', 'ClubestrellaController');
   $router->controller($dominio.'/banamex', 'BanamexController');
   $router->controller($dominio.'/paypal', 'PaypalController');
   $router->controller($dominio.'/overBooking', 'OverBookingController');
   $router->controller($dominio.'/deposito', 'PagoBancarioController');
   $router->controller($dominio.'/santander', 'SantanderController');
   $router->controller($dominio.'/update-covid-19', 'CovidController');
   $router->controller($dominio.'/menu_adhara', 'MenuAdharaController');
   $router->controller($dominio.'/room_service', 'RoomServiceController');


   $dispatcher = new Dispatcher($router->getData());
   $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
} 
catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $e) 
{
   include "views/404.php";
  /* echo "ERROR 404: NOT FOUND";
   var_dump($e);*/      
   die();
}
catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e)
{
   include "views/404.php";
   /*echo "ERROR 404: NOT FOUND";
   var_dump($e);  */     
   die();
}
