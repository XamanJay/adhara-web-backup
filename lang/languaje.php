<?php 

if ($_COOKIE['lang'] == "es") {
	require (realpath($_SERVER['DOCUMENT_ROOT']."/lang/es.php"));
}
else if($_COOKIE['lang'] == "en"){
	require (realpath($_SERVER['DOCUMENT_ROOT'])."/lang/en.php");
}

?>