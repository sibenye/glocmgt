<?php
require_once 'abstract_table.class.php';
class event_table extends abstract_table
{
    // additional class variables go here
    function event_table ()
    {
        $this->tablename       = 'event_table';
       
        $this->rows_per_page   = 15;
        $this->fieldlist       = array('EventID', 'EventName', 'EventDescription', 'Featured');
        $this->fieldlist['EventID'] = array('pkey' => 'y');
		$this->primarykey = "EventID";
		$this->order_str = "EventID";
        
				
    } // end class constructor
	
	function getEvent($eventid)
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		if (empty($eventid))
		{
			$query = "SELECT EventID, EventName, EventDescription, Featured FROM event_table ORDER BY EventID DESC";
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
		}
		
		else
		{
			$query = sprintf("SELECT EventID, EventName, EventDescription, Featured FROM event_table WHERE EventID = '%s'", 
							 mysql_real_escape_string($eventid));
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
		}//if
	}//getEvent
	
	function getfeatured($featured)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
	  $query = sprintf("SELECT EventID, EventName, EventDescription FROM event_table WHERE Featured = '%s'", 
							 mysql_real_escape_string($featured));
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
		
	}//getfeatured
	
	function update_featured($eventid1, $eventid2)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
	  $query = sprintf("UPDATE event_table SET Featured='No' WHERE EventID = '%s'", mysql_real_escape_string($eventid1));
	  $result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
	  
	  if (mysql_errno() == 0) 
	  {
		  $query = sprintf("UPDATE event_table SET Featured='Yes' WHERE EventID = '%s'", mysql_real_escape_string($eventid2));
		  $result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
		  
		  if (mysql_errno() == 0) { return true; }
	  }
	  	
	}//update_featured
	
} // end class

?>