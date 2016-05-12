<?php
include_once 'helpers/dbConnection.php';
include_once 'helpers/idProcess.php';
/**
 * @author Hoai Truong
 *
 */
class news{
	private $id;
	private $title;
	private $content;
	private $image;
	private $created;
	private $creator_id;
	private $view_quantity;
	private $seen_recently;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id=$id;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title=$title;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setContent($content){
		$this->content=$content;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function setImage($image){
		$this->image=$image;
	}
	
	public function getCreated(){
		return $this->created;
	}
	
	public function setCreated($created){
		$this->created=$created;
	}
	
	public function getCreator_id(){
		return $this->creator_id;
	}
	
	public function setCreator_id($creator_id){
		$this->creator_id=$creator_id;
	}
	
	public function getView_quantity(){
		return $this->view_quantity;
	}
	
	public function setView_quantity($view_quantity){
		$this->view_quantity=$view_quantity;
	}
	
	public function getSeen_recently(){
		return $this->seen_recently;
	}
	
	public function setSeen_recently($seen_recently){
		$this->seen_recently=$seen_recently;
	}
	
	//insert new news
	public function insertNews($news){
		
		$news->setCreated($news->getCurrentTime());
		$news->setCreator_id("admin");
		$news->setView_quantity(0);
		$conn = MysqliConnection::getConnection();
		$stmt = $conn->prepare("INSERT INTO news(id, title, content, image, created, creator_id,view_quantity)".
				" VALUES(?,?,?,?,?,?,?)");
		$id = $news->getId();
		$title = $news->getTitle();
		$content = $news->getContent();
		$image = $news->getImage();
		$created = $news->getCreated();
		$creator_id = $news->getCreator_id();
		$view_quantity = $news->getView_quantity();
		
		$stmt->bind_param("ssssssi", 
				$id,
				$title,
				$content,
				$image,
				$created,
				$creator_id,
				$view_quantity);
		
		$stmt->execute();
		$stmt->close();
	}
	
	//get all news order by create date
	public function  getAllNews(){
		
		$conn = MysqliConnection::getConnection();
		$query = "SELECT n.id, n.title, n.content, n.image, n.created, a.name, n.view_quantity, n.seen_recently ".
				"FROM news n INNER JOIN accounts a ON n.creator_id = a.name order by n.created DESC";
		$array = array();
		$result = $conn->query( $query);
		while ($item = mysqli_fetch_assoc($result)){
			$new = new news();
		
			$new->setTitle($item["title"]);
			$new->setContent($item["content"]);
			$new->setId($item["id"]);
			$new->setImage($item["image"]);
			$new->setCreated($item["created"]);
			$new->setCreator_id($item["name"]);
			$new->setView_quantity($item["view_quantity"]);
			$new->setSeen_recently($item["seen_recently"]);
			array_push($array, $new);
		}
		$conn->close();
		return $array;
	}
	
	public function getCurrentTime(){
		$date = new DateTime();
		$result = $date->format('Y-m-d H:i:s');
		return $result; 
	}
	
	public function updateNews($news){
		$news->setCreated($news->getCurrentTime());
		$conn = MysqliConnection::getConnection();
		$query = "UPDATE news SET title = '".$news->getTitle()."', image = '".$news->getImage()."', ".
				"content = '".$news->getContent()."', created = '".$news->getCreated()."' where id = '".$news->getId()."'";
		$result = $conn->query($query);
		$conn->close();
	}
	
	public function  getNewsById($id){
		$news = new news();
		$query = "Select * from news where id = '".$id."'";
		$conn = MysqliConnection::getConnection();
		$result = $conn->query( $query);
		if($item = mysqli_fetch_assoc($result)){
			$news->setId($item["id"]);
			$news->setTitle($item["title"]);
			$news->setContent($item["content"]);
			$news->setImage($item["image"]);
			$news->setCreated($item["created"]);
			$news->setView_quantity($item["view_quantity"]);
			$news->setSeen_recently($item["seen_recently"]);
		}
		
		$conn->close();
		return $news;
	}
	
	public function deleteNews($id){
		$conn = MysqliConnection::getConnection();
		$query = "DELETE from news where id = '".$id."' ";
		$result = $conn->query($query);
		$conn->close();
	}
	
	public function updateViewQuantity($id){
		$conn = MysqliConnection::getConnection();
		$current_time = (new news())->getCurrentTime();
		$query1 = "Select view_quantity from news where id ='".$id."'";
		$result = $conn->query($query1);
		if($num = mysqli_fetch_row($result)){
			$viewQuantity = $num[0]+1;
			$query = "Update news SET view_quantity = ".$viewQuantity.", ".
					"seen_recently = '".$current_time."' where id = '".$id."' ";
			$result1 = $conn->query($query);
		}
		$conn->close();
	}
	
	//get news view the most
	public function getNewsViewTheMost(){
		$conn = MysqliConnection::getConnection();
		$query = "select * from news ORDER BY view_quantity DESC LIMIT 2";
		$array = array();
		$result = $conn->query( $query);
		while ($item = mysqli_fetch_assoc($result)){
			$new = new news();
			$new->setContent($item["content"]);
			if(strlen($item["title"])>30){
				$title = substr($item["title"], 0,30);
				$new->setTitle($title."...");
			}
			else $new->setTitle($item["title"]);
			$new->setId($item["id"]);
			$new->setImage($item["image"]);
			$new->setCreated($item["created"]);
			$new->setView_quantity($item["view_quantity"]);
			$new->setSeen_recently($item["seen_recently"]);
			array_push($array, $new);
		}
		return $array;
	}
	
	//get news recently
	public function getNewsRecently(){
		$conn = MysqliConnection::getConnection();
		$query = "select * from news ORDER BY seen_recently DESC LIMIT 5";
		$array = array();
		$result = $conn->query( $query);
		while ($item = mysqli_fetch_assoc($result)){
			$news_recent = new news();
			$news_recent->setContent($item["content"]);
			if(strlen($item["title"])>30){
				$title = substr($item["title"], 0,30);
				$news_recent->setTitle($title."...");
			}
			else $news_recent->setTitle($item["title"]);
			$news_recent->setId($item["id"]);
			$news_recent->setImage($item["image"]);
			$news_recent->setCreated($item["created"]);
			$news_recent->setView_quantity($item["view_quantity"]);
			$news_recent->setSeen_recently($item["seen_recently"]);
			array_push($array, $news_recent);
		}
		return $array;
	}
	
	//search News
	public function getNewsByTitleAndContent($searchValue){
		$conn = MysqliConnection::getConnection();
		$query = "SELECT n.id, n.title, n.content, n.image, n.created, a.name, n.view_quantity, n.seen_recently ".
				"FROM news n INNER JOIN accounts a ON n.creator_id = a.name ".
				"where title like '%".$searchValue."%' or content like '%".$searchValue."%' ".
				"order by n.created DESC";
		$array = array();
		$result = $conn->query( $query);
		while ($item = mysqli_fetch_assoc($result)){
			$new = new news();
			$new->setContent($item["content"]);
			$new->setTitle($item["title"]);
			$new->setId($item["id"]);
			$new->setImage($item["image"]);
			$new->setCreated($item["created"]);
			$new->setCreator_id($item["name"]);
			$new->setView_quantity($item["view_quantity"]);
			$new->setSeen_recently($item["seen_recently"]);
			array_push($array, $new);
		}
		$conn->close();
		return $array;
	}
	
}

?>








