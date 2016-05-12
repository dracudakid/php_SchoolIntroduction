<?php
include_once 'model/department.php';
include_once 'model/staff.php';
include_once 'model/news.php';
include_once 'model/club.php';
include_once 'model/account.php';
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
		session_start();
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
					
				//page=news_list	
				case 'news_list':
					$all_news = (new news())->getAllNews();
					$best_news = (new news())->getNewsViewTheMost();
					if (isset($_GET['recent']) && $_GET['recent'] == 'news_recently'){
						$news_recently = (new news())->getNewsRecently();
 						include_once 'view/left_news.php';
						break;
					}
					
					if (isset($_GET['search'])){
						$searchValue = $_GET['search'];
						$all_news = (new news())->getNewsByTitleAndContent($searchValue);
						include_once 'view/news_list_filter.php';
						break;
					}
					include_once 'view/news_list.php';
					break;
				
				case 'news_detail':
					if(isset($_GET['idNews'])){
						$idNews = $_GET['idNews'];
						$news_detail = (new news())->updateViewQuantity($idNews);
						$news_detail = (new news())->getNewsById($idNews);
						$best_news = (new news())->getNewsViewTheMost();
						$news_recently = (new news())->getNewsRecently();
						include_once 'view/news_list_detail.php';
					}
					break;
				
				case 'about':
					include_once 'view/about.php';
					break;

				// page=admin
				case 'admin':
					// echo $_SESSION["account"];
					// break;
					if(!isset($_SESSION["account"])){
						header("location: index.php");
					}
					// page=admin&&tag=...
					if (isset($_GET["tag"])) {
						switch ($_GET["tag"]) {
							// page=admin&&tag=all_news
							case 'all_news':
								if(isset($_POST["SubmitNews"])){
									$news = new news();
									$news->setTitle($_POST['titleNews']);
									$news->setContent($_POST['contentNews']);
									$news->setId($_POST['idNews']);
									$idNews = $_POST['idNews'];
									
									// send upload file to images directory
									var_dump($_FILES['image']);
									
									if($idNews == null || $idNews == ""){
										$idProcess = new idProcess();
										$id = "n0".$idProcess->id("id", "news");
										$image_fp = 'images/'.$id.'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
										move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
										$news->setId($id);
										$news->setImage($image_fp);
										
										$news->insertNews($news);
									}
									else{
										$image = (new news())->getNewsById($idNews);
										echo "update: ".$image->getImage();
										if($image->getImage() == null || $image->getImage() == ""){
											$image_fp = 'images/'.$idNews.'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
											move_uploaded_file($_FILES['image']['tmp_name'], $image_fp);
											$news->setId($id);
											$news->setImage($image_fp);
										}else $news->setImage($image->getImage());
										$news->updateNews($news);
									}
								}
								if (isset($_GET['search'])){
									$searchValue = $_GET['search'];
									$all_news = (new news())->getNewsByTitleAndContent($searchValue);
									include_once 'view/admin/view_all_news_filter.php';
									break;
								}
								$all_news = (new news())->getAllNews();
								include_once 'view/admin/viewAllNews.php';
								break;

							//page=admin&tag=add_news
							case 'add_news':
								$news_edit = null;
								include_once 'view/admin/addNews.php';
								
							// page=admin&tag=edit
							case 'edit_news':
								$news_edit = new news();
								//edit news by id
								if(isset($_GET['idNews'])){
									$idNews = $_GET['idNews'];
									$news_edit = $news_edit->getNewsById($idNews);
									echo "edit: ".$news_edit->getImage();
								}
								include_once 'view/admin/addNews.php';
								break;
							case 'delete_news':
								$news_delete = new news();
								//edit news by id
								if(isset($_GET['idNews'])){
									$idNews = $_GET['idNews'];
									$news_delete = $news_delete->deleteNews($idNews);
								}
								include_once 'view/admin/viewAllNews.php';
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
						$all_news = array();
						foreach ($news_list as $news){
							if(strlen($news->getContent())>100){
								$content =substr($news->getContent(), 0,100);
								$news->setContent($content."...");
							}
							else $news->setContent($news->getContent());
							if(strlen($news->getTitle())>30){
								$title = substr($news->getTitle(), 0,30);
								$news->setTitle($title."...");
							}
							else $news->setTitle($news->getTitle());
							array_push($all_news, $news);
						}
						include_once 'view/admin/viewAllNews.php';
						
					}
					break;

				// page="sign-in"
				case 'sign-in':
					if(isset($_POST["name"]) && isset($_POST["password"])){
						$account = (new Account())->getAccountByNamePassword($_POST["name"], $_POST["password"]);
						if($account != null){
							$_SESSION["account"] = $account->getName();
							header("location: index.php?page=admin");
						}
						else{
							header("location: index.php");
						}
					}
					break;

				case 'log-out':
					session_destroy();
					header("location:index.php");
					break;
				default:
					$staff_list = (new Staff())->getAllStaff();
					include_once 'view/staff_list.php';
					break;
					}
		} else{
			if (isset($_GET['recent']) && $_GET['recent'] == 'news_recently'){
				$news_recently = (new news())->getNewsRecently();
				include_once 'view/left_news.php';
		//		break;
			}
			include_once 'view/home.php';
		}

	}
}
?>
