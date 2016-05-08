<?php
   
 class MysqliConnection{
   private static $dbhost = 'localhost';
   private static $dbuser = 'root';
   private static $dbpass = '';
   private static $dbname = 'school';
   private static $connection = null;
   
   public static function getConnection(){
           //Here get some routine to make your configuration extern
           self::$connection = new Mysqli(self::$dbhost, self::$dbuser, self::$dbpass, self::$dbname);
           self::$connection->set_charset("utf8");
           if(mysqli_connect_errno()){
    				echo "Ket noi loi db:".mysqli_connect_error()."<br />";
    			}
       return self::$connection;
}
}
	
?>