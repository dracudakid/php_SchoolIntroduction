<?php
include_once __SITE_PATH.'/helpers/dbConnection.php';

class idProcess{

	public function id($idNameCol, $tableName, $startIndex = 3){
		$db = new MysqliConnection();
		$query = "SELECT MAX(cast(SUBSTRING($idNameCol,$startIndex)as int)) as iD ".
				"FROM  ".$tableName;
		echo $query;
		$result = $db->getConnection()->query($query);
		$id = mysqli_fetch_row($result);
		return $id[0]+1;
	}
	
	public function test(){
		$idPro = new idProcess();
		$numOfId = $idPro->id("id", "news");
		echo $numOfId;
		
	}
	
	
}


?>