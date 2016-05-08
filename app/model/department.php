<?php 
include_once 'helpers/dbConnection.php';
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

	public function getDepartmentList()
	{
		$conn = MysqliConnection::getConnection();
		echo "Hello";
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
    private function _setDescription($description)
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
    private function _setFounding($founding)
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
    private function _setImage($image)
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
    private function _setDeanId($dean_id)
    {
        $this->dean_id = $dean_id;

        return $this;
    }
}

 ?>