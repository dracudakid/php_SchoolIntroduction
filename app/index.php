<?php 
	 /*** define the site path constant ***/
 	$site_path = realpath(dirname(__FILE__));
 	echo $site_path;
 	define ('__SITE_PATH', $site_path);
  include_once 'controller/controller.php';
  $controller = new Controller();
  $controller->route();
 ?>