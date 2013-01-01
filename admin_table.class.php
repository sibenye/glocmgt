<?php
require_once 'abstract_table.class.php';
class admin_table extends abstract_table
{
    // additional class variables go here
    function admin_table ()
    {
        $this->tablename       = 'admin_table';
        $this->rows_per_page   = 15;
		$this->primarykey = "AdminID";
       
        
				
    } // end class constructor
	
	function getUserDetails($adminID)
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		
	$query = "SELECT AdminID, AdminName, Username, Password, CreationDate, Priviledge FROM admin_table WHERE AdminID = '$adminID'";
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
      		} // while
			if (mysql_num_rows($result) == 0)
				{
					return false;
				}
				else
				{				
				 mysql_free_result($result);
	   
				return $this->data_array;
				}//if
		
	}//getUserDetails
	
	function authenticateUser($Username, $Password)
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		
	$query = "SELECT AdminID, AdminName, Username, Password, CreationDate, Priviledge FROM admin_table WHERE Username = '$Username' AND Password = '$Password'";
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
      		} // while
			if (mysql_num_rows($result) == 0)
				{
					return false;
				}
				else
				{				
				 mysql_free_result($result);
	   
				return $this->data_array;
				}//if
		
	}//authenticateUser
	
	function getAdministrators()
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		
	$query = "SELECT AdminID, AdminName, Username, Password, CreationDate, Priviledge FROM admin_table";
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
      		} // while
			if (mysql_num_rows($result) == 0)
				{
					return false;
				}
				else
				{				
				 mysql_free_result($result);
	   
				return $this->data_array;
				}//if
		
	}//getAdministrators
	
	
	//function insertUserDetails()
}
	
?>