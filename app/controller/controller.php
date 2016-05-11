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
					include_once 'view/news_list.php';
					break;
				case 'news_detail':
					if(isset($_GET['idNews'])){
						$idNews = $_GET['idNews'];
						$news_detail = (new news())->updateViewQuantity($idNews);
						$news_detail = (new news())->getNewsById($idNews);
						$best_news = (new news())->getNewsViewTheMost();
						include_once 'view/news_list_detail.php';
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
									$news->setId($_POST['idNews']);
									$idNews = $_POST['idNews'];
									if($idNews == null || $idNews == ""){
										echo "insert";
										$news->insertNews($news);
									}
									else{
										echo "update";
										$news->updateNews($news);
									}
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
							default:
								# code...
								break;
						}
					} else {
						$news_list = (new news())->getAllNews();
						include_once 'view/admin/viewAllNews.php';
					}
					
					
					break;

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
