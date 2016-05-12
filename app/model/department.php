<?php 
include_once __SITE_PATH.'/helpers/dbConnection.php';
/**
* 
*/
class Department
{
	private $id; 
	private $name; 
	private $description;
	private $founding;
	private $image;
	private $dean_id;
	function __construct()
	{
		# code...
	}

	public function getDepartmentList($search="")
	{
		$conn = MysqliConnection::getConnection();
		$sql = "select * from departments where name like '%$search%';";
        echo $sql;
        $arr = array();
        $result = $conn->query($sql);
        while($items = mysqli_fetch_assoc($result)){
            $dep = new Department();
            $dep->_setId($items["id"]);
            $dep->_setName($items["name"]);
            $dep->_setDescription($items["description"]);
            $dep->_setFounding($items["founding"]);
            $dep->_setDeanId($items["dean_id"]);
            array_push($arr, $dep);
        }
        $conn->close();
        return $arr;
	}

    public function getDepartmentById($depId)
    {
        $conn = MysqliConnection::getConnection();
        $sql = "select * from departments where id = '$depId'";
        echo $sql;
        $result = $conn->query($sql);
        $dep = new Department();
        if($items = mysqli_fetch_assoc($result)){
            $dep->_setId($items["id"]);
            $dep->_setName($items["name"]);
            $dep->_setDescription($items["description"]);
            $dep->_setFounding($items["founding"]);
            $dep->_setImage($items["image"]);
            $dep->_setDeanId($items["dean_id"]);
        }
        $conn->close();
        return $dep;
    }

    public function insertDepartment($dep=null)
    {
        if($dep==null) $dep = $this;
        $conn = MysqliConnection::getConnection();
        $stmt = $conn->prepare("INSERT INTO `departments` (`id`, `name`, `description`, `founding`, `image`, `dean_id`) VALUES (?, ?, ?, ?, ?, NULL);");
        $stmt->bind_param("sssss",
            $dep->getId(), 
            $dep->getName(),
            $dep->getDescription(),
            $dep->getFounding(),
            $dep->getImage());
        $stmt->execute();
        $stmt->close();
    }

    public function editDepartment($dep=null)
    {
        if($dep==null) $dep = $this;
        $conn = MysqliConnection::getConnection();
        $stmt = $conn->prepare("UPDATE `departments` 
            set name=?, description=?, founding=?, image=?
            where id=?;");
        $stmt->bind_param("sssss",
            $dep->getName(),
            $dep->getDescription(),
            $dep->getFounding(),
            $dep->getImage(),
            $dep->getId());
        $stmt->execute();
        $stmt->close();
    }
    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function _setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of founding.
     *
     * @return mixed
     */
    public function getFounding()
    {
        return $this->founding;
    }

    /**
     * Sets the value of founding.
     *
     * @param mixed $founding the founding
     *
     * @return self
     */
    public function _setFounding($founding)
    {
        $this->founding = $founding;

        return $this;
    }

    /**
     * Gets the value of image.
     *
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the value of image.
     *
     * @param mixed $image the image
     *
     * @return self
     */
    public function _setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the value of dean_id.
     *
     * @return mixed
     */
    public function getDeanId()
    {
        return $this->dean_id;
    }

    /**
     * Sets the value of dean_id.
     *
     * @param mixed $dean_id the dean id
     *
     * @return self
     */
    public function _setDeanId($dean_id)
    {
        $this->dean_id = $dean_id;

        return $this;
    }
}

 ?>