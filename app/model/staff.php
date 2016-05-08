<?php 
include_once __SITE_PATH.'/helpers/dbConnection.php';
/**
* 
*/
class Staff
{
	private $id;
	private $name;
	private $dob;
	private $email;
	private $degree;
	private $image;
	private $position;
	private $department_id;

	function __construct()
	{
		# code...
	}

	public function getAllStaff()
	{
		$conn = MysqliConnection::getConnection();
		$sql = "select * from staffs";
		$arr = array();
		$result = $conn->query($sql);
		while($items = mysqli_fetch_assoc($result)){
            $s = new Staff();
            $s->_setId($items["id"]);
            $s->_setName($items["name"]);
            $s->_setDob($items["dob"]);
            $s->_setEmail($items["email"]);
            $s->_setDegree($items["degree"]);
            $s->_setImage($items["image"]);
            $s->_setPosition($items["position"]);
            $s->_setDepartmentId($items["department_id"]);
            array_push($arr, $s);
        }
        $conn->close();
        return $arr;
	}

	public function getStaffListFromDepartmentId($depId)
	{
		$conn = MysqliConnection::getConnection();
		$sql = "select * from staffs where department_id = '$depId'";
		$array = array();
		$result = $conn->query($sql);
		while($items = mysqli_fetch_assoc($result)){
            $s = new Staff();
            $s->_setId($items["id"]);
            $s->_setName($items["name"]);
            $s->_setDob($items["dob"]);
            $s->_setEmail($items["email"]);
            $s->_setDegree($items["degree"]);
            $s->_setImage($items["image"]);
            $s->_setPosition($items["position"]);
            $s->_setDepartmentId($items["department_id"]);
            array_push($arr, $s);
        }
        $conn->close();
        return $arr;
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
    private function _setId($id)
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
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of dob.
     *
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Sets the value of dob.
     *
     * @param mixed $dob the dob
     *
     * @return self
     */
    private function _setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    private function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of degree.
     *
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Sets the value of degree.
     *
     * @param mixed $degree the degree
     *
     * @return self
     */
    private function _setDegree($degree)
    {
        $this->degree = $degree;

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
    private function _setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the value of position.
     *
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the value of position.
     *
     * @param mixed $position the position
     *
     * @return self
     */
    private function _setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Gets the value of department_id.
     *
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }

    /**
     * Sets the value of department_id.
     *
     * @param mixed $department_id the department id
     *
     * @return self
     */
    private function _setDepartmentId($department_id)
    {
        $this->department_id = $department_id;

        return $this;
    }
}
 ?>