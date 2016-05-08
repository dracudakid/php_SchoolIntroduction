<?php 
include_once 'model/department.php';
include_once 'model/staff.php';
include_once 'model/news.php';
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
		} elseif (isset($_GET["page"]) && $_GET["page"] == "news_list"){
			$news_list = (new news())->getAllNews();
			include_once 'view/admin/viewAllNews.php';
			
		} elseif (isset($_GET["page"]) && $_GET["page"] == "news"){
			$news = new news();
			if(isset($_POST["SubmitNews"])){
				$news->setTitle($_POST['titleNews']);
				echo "title: ".$_POST['titleNews'];
				$news->setContent($_POST['contentNews']);
				$news->setImage($_POST['imageNews']);
				$news->insertNews($news);
				
				$this->getAllNews();
			}
			include_once 'view/admin/addNews.php';
		}
		else{
			include_once 'view/home.php';
		}
	}
}
?>
