<?php
include_once 'model/department.php';
include_once 'model/staff.php';
include_once 'model/news.php';
include_once 'model/club.php';
include_once 'helpers/idProcess.php';
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
			switch ($_GET["page"]) {
				case 'staff_list':
					$dep_list = (new Department())->getDepartmentList();

					// page=staff_list&&dep=dp01
					if (isset($_GET["dep"])) {
						$depId = $_GET["dep"];
						$department = (new Department())->getDepartmentById($depId);
						
						// search staffs in a department
						// page=staff_list&&dep=dp01&&search=John
						if(isset($_GET["search"])){
							$search = $_GET["search"];
							$staff_list = (new Staff())->getStaffListByDepartmentIdAndName($depId, $search);
							include_once 'view/staff_list_filter.php';
						}

						// list all staff in a department if there is NOT search query
						else{
							$staff_list = (new Staff())->getStaffListByDepartmentId($depId);
							include_once 'view/staff_list_dep.php';
						}	

					} 
					// search staff for all departments
					// page=staff_list&&search=dp01
					elseif(isset($_GET["search"])){
						$search = $_GET["search"];
						$staff_list = (new Staff())->getStaffListByName($search);
						include_once 'view/staff_list_filter.php';
					}

					// list all staff
					// page=staff_list
					else {
						$staff_list = (new Staff())->getAllStaff();
						include_once 'view/staff_list.php';
					}
					
					break;
				
				// page=club_list
				case 'club_list':
					$club_list = (new Club())->getAllClubs();
					// page=club_list&&club=cb01
					if(isset($_GET["club"])){
						$clubId = $_GET["club"];
						$club = (new Club())->getClubById($clubId);
						// to club detail
						include_once 'view/club_details.php';
					} 

					// page=club_list
					else{
						// to static club_list firstpage
						include_once 'view/club_list.php';
					}
					break;
				// page=admin
				case 'admin':

					// page=admin&&tag=...
					if (isset($_GET["tag"])) {
						switch ($_GET["tag"]) {
							// page=admin&&tag=all_news
							case 'all_news':
								if(isset($_POST["SubmitNews"])){
									$news = new news();
									$news->setTitle($_POST['titleNews']);
									echo "title: ".$_POST['titleNews'];
									$news->setContent($_POST['contentNews']);

									$news->setImage($_POST['imageNews']);
									$news->insertNews($news);
								}
								$all_news = (new news())->getAllNews();
								include_once 'view/admin/viewAllNews.php';
								if(isset($_GET['idNews'])){
									$idNews = $_GET['idNews'];
									
								}
								break;

							// page=admin&&tag=add_news
							case 'add_news':
								include_once 'view/admin/addNews.php';
								break;

							// page=admin&&tag=all_staffs
							case 'all_staffs':

								// page=admin&&tag=all_staffs&&search=...
								if (isset($_GET["search"])) {
									$staff_list = (new Staff())->getStaffListByName($_GET["search"]);
									include_once 'view/admin/staff_table.php';
								}
								else{
									$staff_list = (new Staff())->getAllStaff();
									include_once 'view/admin/all_staffs.php';
								}
								
								break;

							// page=admin&&tag=add_staff
							case 'add_staff':
								// add to database and show the staff_list
								if(isset($_POST["id"])){
									$staff = new Staff();
									$staff->_setId($_POST["id"]);
									$staff->_setName($_POST["name"]);
									$staff->_setDob($_POST["dob"]);
									$staff->_setEmail($_POST["email"]);
									$staff->_setDegree($_POST["degree"]);
									
									// send upload file to images directory
									var_dump($_FILES['image']);
									$image_fp = 'images/'.$_POST["id"].'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
									$staff->_setImage($image_fp);
									$staff->_setPosition($_POST["position"]);
									$staff->_setDepartmentId($_POST["department"]);

									$staff->insertStaff();
									header('location: index.php?page=admin&tag=all_staffs');
								}
								// show the add staff form
								else{
									$id = "st".(new idProcess())->id("id", "staffs", 3);
									$dep_list = (new Department())->getDepartmentList();
									include_once 'view/admin/add_staff.php';
								}
								break;
							
							// page=admin&tag=delete_staff&staffId=
							case 'delete_staff':
								$staffId = $_GET["staffId"];
								(new Staff())->deleteStaff($staffId);
								break;

							case 'edit_staff':
								if (isset($_POST["id"])) {
									$staff = new Staff();
									$staff->_setId($_POST["id"]);
									$staff->_setName($_POST["name"]);
									$staff->_setDob($_POST["dob"]);
									$staff->_setEmail($_POST["email"]);
									$staff->_setDegree($_POST["degree"]);
									// send upload file to images directory
									var_dump($_FILES['image']);
									$image_fp = 'images/'.$_POST["id"].'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
									$staff->_setImage($image_fp);
									$staff->_setPosition($_POST["position"]);
									$staff->_setDepartmentId($_POST["department"]);
									$staff->editStaff();
									header('location: index.php?page=admin&tag=all_staffs');
								}
								else{
									$id = $_GET["staffId"];
									$dep_list = (new Department())->getDepartmentList();
									$staff = (new Staff())->getStaffById($id);
									include_once 'view/admin/add_staff.php';
								}
								
								break;
							
							case 'all_clubs':
								if (isset($_GET["search"])) {
									$club_list = (new Club())->getClubListByName($_GET["search"]);
									include_once 'view/admin/club_table.php';
								}
								else{
									$club_list = (new Club())->getAllClubs();
									include_once 'view/admin/all_clubs.php';
								}
								
								break;

							case 'all_departments':
								if (isset($_GET["search"])) {
									$department_list = (new Department())->getDepartmentList($_GET["search"]);
									include_once 'view/admin/department_table.php';
								}
								else{
									$department_list = (new Department())->getDepartmentList();
									include_once 'view/admin/all_departments.php';
								}
								break;

							case 'add_department':
								if (isset($_POST["id"])) {
									$department = new Department();
									$department->_setId($_POST["id"]);
									$department->_setName($_POST["name"]);
									$department->_setDescription($_POST["description"]);
									$department->_setFounding($_POST["founding"]);

									// send upload file to images directory
									var_dump($_FILES['image']);
									$image_fp = 'images/'.$_POST["id"].'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
									$department->_setImage($image_fp);

									$department->insertDepartment();
									header('location: index.php?page=admin&tag=all_departments');
								} else{
									$id = "dp".(new idProcess())->id("id", "departments", 3);
									include_once 'view/admin/add_department.php';
								}
								break;
							case 'edit_department':
								if (isset($_POST["id"])) {
									$department = new Department();
									$department->_setId($_POST["id"]);
									$department->_setName($_POST["name"]);
									$department->_setDescription($_POST["description"]);
									$department->_setFounding($_POST["founding"]);
									// send upload file to images directory
									var_dump($_FILES['image']);
									$image_fp = 'images/'.$_POST["id"].'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
									$department->_setImage($image_fp);
									$department->editDepartment();
									header('location: index.php?page=admin&tag=all_departments');
								}
								elseif(isset($_GET["depId"])){
									$id = $_GET["depId"];
									$department = (new Department())->getDepartmentById($id);
									include_once 'view/admin/add_department.php';
								}
								break;

							case 'delete_department':
								# code...
								break;
							default:
								# code...
								break;
						}
					} 
					// page=admin
					else {
						$news_list = (new news())->getAllNews();
						include_once 'view/admin/viewAllNews.php';
						break;
					}

				// page=new
				case 'news':
					break;


				default:
					$staff_list = (new Staff())->getAllStaff();
					include_once 'view/staff_list.php';
					break;
					}
		} else{
			include_once 'view/home.php';
		}

	}
}
?>
