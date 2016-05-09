<?php 
include_once 'model/department.php';
include_once 'model/staff.php';
include_once 'model/news.php';
include_once 'model/club.php';
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
		# have page paramter
		if(isset($_GET["page"])){
			if($_GET["page"]=="staff_list"){
				$dep_list = (new Department())->getDepartmentList();
				if(isset($_GET["dep"])){
					$depId = $_GET["dep"];
					$department = (new Department())->getDepartmentById($depId);
					// search staffs in a department
					if(isset($_GET["search"])){
						$search = $_GET["search"];
						$staff_list = (new Staff())->getStaffListByDepartmentIdAndName($depId, $search);
						include_once 'view/staff_list_filter.php';
					}
					// list all staff in a department
					else{
						$staff_list = (new Staff())->getStaffListByDepartmentId($depId);
						include_once 'view/staff_list_dep.php';
					}					
				} 

				// search staff for all departments
				elseif(isset($_GET["search"])){
					$search = $_GET["search"];
					$staff_list = (new Staff())->getStaffListByName($search);
					include_once 'view/staff_list_filter.php';
				}

				// list all staff
				else {
					$staff_list = (new Staff())->getAllStaff();
					include_once 'view/staff_list.php';
				}
			} elseif ($_GET["page"]=="club_list") {
				$club_list = (new Club())->getAllClubs();
				if(isset($_GET["club"])){
					$clubId = $_GET["club"];
					$club = (new Club())->getClubById($clubId);
					// to club detail
					include_once 'view/club_details.php';
				} else{
					// to static club_list firstpage
					include_once 'view/club_list.php';
				}
			} elseif ($_GET["page"]=="news_list"){
				$news_list = (new news())->getAllNews();
				include_once 'view/admin/viewAllNews.php';
			} elseif ($_GET["page"]=="news"){
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
			else {
				$staff_list = (new Staff())->getAllStaff();
				include_once 'view/staff_list.php';
			}
		}
		else{
			include_once 'view/home.php';
		}
	}
}
?>
