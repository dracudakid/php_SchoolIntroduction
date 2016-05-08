<?php 
include_once __SITE_PATH.'/helpers/dbConnection.php';

/**
* 
*/
class Club
{
  private $id;
  private $name;
  private $description;
  private $image;
  private $time;
  private $location;
  private $advisor;

  function __construct()
  {
    # code...
  }

  public function getAllClubs()
  {
    $conn = MysqliConnection::getConnection();
    $sql = "select * from clubs";
    $arr = array();
    $result = $conn->query($sql);
    while($items = mysqli_fetch_assoc($result)){
            $c = new Club();
            $c->_setId($items["id"]);
            $c->_setName($items["name"]);
            $c->_setDescription($items["description"]);
            $c->_setImage($items["image"]);
            $c->_setTime($items["time"]);
            $c->_setLocation($items["location"]);
            $c->_setAdvisor($items["advisor"]);
            array_push($arr, $c);
        }
        $conn->close();
        return $arr;
  }

  public function getClubById($clubId)
  {
    $conn = MysqliConnection::getConnection();
    $sql = "select * from clubs where id = '$clubId'";
    echo $sql;
    $result = $conn->query($sql);
    $c = new Club();
    if($items = mysqli_fetch_assoc($result)){
        $c->_setId($items["id"]);
        $c->_setName($items["name"]);
        $c->_setDescription($items["description"]);
        $c->_setImage($items["image"]);
        $c->_setTime($items["time"]);
        $c->_setLocation($items["location"]);
        $c->_setAdvisor($items["advisor"]);
    }
    $conn->close();
    return $c;
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
     * Gets the value of time.
     *
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Sets the value of time.
     *
     * @param mixed $time the time
     *
     * @return self
     */
    private function _setTime($time)
    {
        $this->time = $time;

        return $this;
    }


    /**
     * Gets the value of location.
     *
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the value of location.
     *
     * @param mixed $location the location
     *
     * @return self
     */
    private function _setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Gets the value of advisor.
     *
     * @return mixed
     */
    public function getAdvisor()
    {
        return $this->advisor;
    }

    /**
     * Sets the value of advisor.
     *
     * @param mixed $advisor the advisor
     *
     * @return self
     */
    private function _setAdvisor($advisor)
    {
        $this->advisor = $advisor;

        return $this;
    }
}

?>