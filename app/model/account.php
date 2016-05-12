<?php 
include_once __SITE_PATH.'/helpers/dbConnection.php';
  /**
  * 
  */
  class Account
  {
    private $name;
    private $password;
    private $role;
    private $created;
    function __construct()
    {
      
    }

    public function getAccountByNamePassword($name, $password)
    {
      $conn = MysqliConnection::getConnection();
      $sql = "select * from accounts where name='$name' and password='$password';";
      $result = $conn->query($sql);
      $a = null;
      if($item = mysqli_fetch_assoc($result)){ 
        $a = new Account();
        $a->_setName($item["name"]);
        $a->_setPassword($item["password"]);
        $a->_setRole($item["role"]);
        $a->_setCreated($item["created"]);
      }
      $conn->close();
      return $a;
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
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    private function _setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the value of role.
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Sets the value of role.
     *
     * @param mixed $role the role
     *
     * @return self
     */
    private function _setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Gets the value of created.
     *
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Sets the value of created.
     *
     * @param mixed $created the created
     *
     * @return self
     */
    private function _setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
}
?>