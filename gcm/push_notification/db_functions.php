<?php

class DB_Functions {

    private $db;

    function __construct() {
        include_once './db_connect.php';
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    function __destruct() {
        
    }
    
    public function insertUser($emp_id, $gcmRegId) {
       $result = mysql_query("UPDATE  `talent_uki`.`users` SET  `gcm_id` ='$gcmRegId' WHERE  `talent_uki`.`emp_id` ='$emp_id'");
        $rows = mysql_affected_rows();
        
        echo $rows.$emp_id;		
        
        if ($rows == 1) {
		return true;
        } 
        else {		
		return false;			          
        }
    }
    
	public function getAllUsers() {
        	$result = mysql_query("select * FROM users");
        	return $result;
    	}
    	
	public function getGCMRegID($Id){
		 $result = mysql_query("SELECT gcm_id FROM `talent_uki`.`users` WHERE `users`.`emp_id` = '$Id'");
		 return $result;
	}
}
?>