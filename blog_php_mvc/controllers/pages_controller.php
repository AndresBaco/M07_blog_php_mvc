<?php
class PagesController {
 public function home() {
	 // simulación de datos obtenidos de un modelo
	 $first_name = 'Andres';
	 $last_name = 'Baco';
	 require_once('views/pages/home.php');
 }

 public function error() {
	require_once('views/pages/error.php');
 }
}
?>
