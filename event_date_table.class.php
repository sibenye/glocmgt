<?php
require_once 'abstract_table.class.php';
class event_date_table extends abstract_table
{
    // additional class variables go here
    function event_date_table ()
    {
        $this->tablename       = 'event_date_table';
        $this->rows_per_page   = 15;
        $this->fieldlist       = array('EventDateID', 'EventID', 'StartDate', 'EndDate', 'EventState', 'EventCountry');
        $this->fieldlist['EventDateID'] = array('pkey' => 'y');
		$this->primarykey = "EventDateID";
		$this->order_str = "StartDate";
        
				
    } // end class constructor
	
	function getVenueAndDate($eventid)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		if (empty($eventid))
		{
			$query = "SELECT EventDateID, EventID, StartDate, EndDate, EventState, EventCountry FROM event_date_table ORDER BY EventDateID DESC";
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
			$query = sprintf("SELECT EventDateID, EventID, StartDate, EndDate, EventState, EventCountry FROM event_date_table WHERE EventID = '%s'", mysql_real_escape_string($eventid));
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
	}//getVenueAndDate
	
	
	/**
	*@param $num contains an integer that tells the function how many most recent upcoming events it should return
	*This function returns $num most recent upcoming events
	*
	*/
	function getRecentEvents()
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		$query = "SELECT event_date_table.EventID, StartDate, EventState, EventCountry, event_table.EventName FROM event_date_table
		LEFT JOIN event_table 
		ON event_date_table.EventID = event_table.EventID
		WHERE StartDate > Now()
		ORDER BY Startdate ASC LIMIT 0, 5";
			
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
	}//getRecentEvents
			
	
	
	function showVenueAndDate($eventid)
	{	
		if (!empty($eventid)) 
		{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
		$query = sprintf("SELECT EventDateID, EventID, StartDate, EndDate, EventState, EventCountry FROM event_date_table WHERE EventID = '%s'", 
							 mysql_real_escape_string($eventid));
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			$schedule = null;
			while ($row = mysql_fetch_assoc($result)) {
         		
				$schedule .=  "<p>Date: ".date("M j, Y", strtotime($row['StartDate'])).
				" to ".date("M j, Y", strtotime($row['EndDate']))."<br/> 
               		 Venue: ".$row['EventState'].", ".$row['EventCountry']."</p>";
      		} // while
			
			 mysql_free_result($result);
   
      		return $schedule;
		}
	}//showVenueAndDate
	
	
	function getSchedules()
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
	 	  $query = "SELECT EventDateID, event_date_table.EventID, StartDate, EndDate, EventCountry, EventState, event_table.EventName FROM event_date_table JOIN event_table ON event_date_table.EventID = event_table.EventID ORDER BY EventDateID DESC";
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
				} // while
			
			 mysql_free_result($result);
   
      		return $this->data_array;
	 
	}//getschedules
	
	function getSingleSchedule($eventdateid)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		
		 $query = sprintf("SELECT EventDateID, event_date_table.EventID, StartDate, EndDate, EventCountry, EventState, event_table.EventName FROM event_date_table JOIN event_table ON event_date_table.EventID = event_table.EventID WHERE EventDateID = '%s'", mysql_real_escape_string($eventdateid));
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
				} // while
			
			 mysql_free_result($result);
   
      		return $this->data_array;
	}//getSingleSchedule

} // end class

?>