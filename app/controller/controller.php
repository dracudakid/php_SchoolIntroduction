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
			$dep_list = (new Department())->getDepartmentList();
			if(isset($_GET["dep"])){
				$depId = $_GET["dep"];
				$department = (new Department())->getDepartmentById($depId);
				$staff_list = (new Staff())->getStaffListByDepartmentId($depId);
				include_once 'view/staff_list_dep.php';
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
