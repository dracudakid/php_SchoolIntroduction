<?php 
include_once 'model/department.php';
include_once 'model/staff.php';
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
			if(isset($_GET["dev_id"])){
				$dev_id = $_GET["dev_id"];

			}
			else {
				$staff_list = (new Staff())->getAllStaff();
				include_once 'view/staff_list.php';
			}
		} else{
			include_once 'view/home.php';
		}
	}
}
?>
