<?php 
include_once 'model/department.php';
/**
* 
*/
class Controller
{
	
	function __construct()
	{
		# code...
	}

	public function route()
	{
		if(isset($_GET["page"]) && $_GET["page"]=="staff_list"){
			$dep_list = (new department())->getDepartmentList();
			include_once 'view/staff_list.php';
		} else{
			include_once 'view/home.php';
		}
	}
}
?>
