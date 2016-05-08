<?php 
	 /*** define the site path constant ***/
 	$site_path = realpath(dirname(__FILE__));
<<<<<<< HEAD
 	echo $site_path;
=======
>>>>>>> 48553203d0b55687ad78699dcd245dacb0afda73
 	define ('__SITE_PATH', $site_path);
  include_once 'controller/controller.php';
  $controller = new Controller();
  $controller->route();
 ?>