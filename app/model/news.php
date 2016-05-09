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
	
	
	//insert new news
	public function insertNews($news){
		
		//handle ip
		$idProcess = new idProcess();
		$id = "n0".$idProcess->id("id", "news");
		$news->setId($id);
		echo "id insert: ".$id;
		$news->setCreated($news->getCurrentTime());
		$conn = MysqliConnection::getConnection();
		$query = "INSERT INTO news(id, title, content, image, created, creator_id)". 
				" VALUES('".$news->getId()."','".$news->getTitle()."','".$news->getContent()."', '','".$news->getCreated()."','admin')";
		$result = $conn->query($query);
		$conn->close();
	}
	
	//get all news order by create date
	public function  getAllNews(){
		
		$conn = MysqliConnection::getConnection();
		$query = "SELECT n.id, n.title, n.content, n.image, n.created, a.name ".
				"FROM news n INNER JOIN accounts a ON n.creator_id = a.name";
		$array = array();
		$result = $conn->query( $query);
		while ($item = mysqli_fetch_assoc($result)){
			$new = new news();
			$content =substr($item["content"], 0,40);
			$title = substr($item["title"], 0,30);
			$new->setId($item["id"]);
			$new->setTitle($title."...");
			$new->setContent($content."...");
			$new->setImage($item["image"]);
			$new->setCreated($item["created"]);
			$new->setCreator_id($item["name"]);
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
}

$news = new news();
$news->getCurrentTime();
?>








