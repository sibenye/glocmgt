<?php
require_once 'abstract_table.class.php';
class registration_table extends abstract_table
{
	function registration_table()
	{
		$this->tablename       = 'registration_table';
        $this->rows_per_page   = 15;
        $this->fieldlist       = array('RegistrationID', 'ConfirmationID', 'REventID', 'ParticipantFirstName', 'ParticipantLastName', 'ParticipantAddress', 'ParticipantCity', 'ParticipantState', 'ParticipantCountryID', 'ParticipantEmail', 'ParticipantPhoneNumber', 'CompanyName', 'JobTitle', 'CompanyAddress', 'CompanyCity', 'CompanyState', 'CompanyCountryID', 'RegistrationDate', 'REventDateID');
        $this->fieldlist['RegistrationID'] = array('pkey' => 'y');
		$this->primarykey = "RegistrationID";
		$this->order_str = "RegistrationDate";
	}//Constructor
	
	function getRegistrantData($registrationid)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		if (empty($Registrationid))
		{
					$query = "SELECT RegistrationID, ConfirmationID, event_table.EventName, event_date_table.StartDate, event_date_table.EndDate, event_date_table.EventState, event_date_table.EventCountry, ParticipantFirstName, ParticipantLastName, ParticipantAddress, ParticipantCity, ParticipantState, country_table.CountryName, ParticipantEmail, ParticipantPhoneNumber, CompanyName, JobTitle, CompanyAddress, CompanyCity, CompanyState, CompanyCountryID, RegistrationDate
FROM registration_table
LEFT JOIN event_table ON REventID = event_table.EventID
LEFT JOIN country_table ON ParticipantCountryID = CountryID
LEFT JOIN event_date_table ON REventDateID = event_date_table.EventDateID
ORDER BY RegistrationDate DESC";
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
			$query = sprintf("SELECT RegistrationID, ConfirmationID, REventID, ParticipantFirstName, ParticipantLastName, ParticipantAddress, ParticipantCity, ParticipantState, ParticipantEmail, ParticipantPhoneNumber, CompanyName, JobTitle, CompanyAddress, CompanyCity, CompanyState, RegistrationDate, REventDateID FROM registration_table WHERE RegistrationID = '%s'", 
							 mysql_real_escape_string($registrationid));
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			$schedule = null;
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
	}//getRegistrantData
	
	
	/*function insertRecord()
	{
	  $this->errors = array();
	   global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		
		$query =  sprintf("INSERT INTO registration_table SET 
			                    ConfirmationID='%s',
								EventID='%s',
								ParticipantFirstName='%s',
								ParticipantLastName='%s',
								ParticipantAddress='%s',
								ParticipantCity='%s',
								ParticipantState= '%s',
								ParticipantCountryID='%s',
								ParticipantEmail='%s',
								ParticipantPhoneNumber='%s',
								CompanyName='%s',
								JobTitle='%s',
								CompanyAddress='%s',
								CompanyCity='%s',
								CompanyState='%s',
								CompanyCountryID='%s',
								RegistrationDate='%s',
								EventDateID='%s'", 								
									   mysql_real_escape_string($_REQUEST['ConfirmationID']),
										 mysql_real_escape_string($_REQUEST['EventID']),
										 mysql_real_escape_string($_REQUEST['ParticipantFirstName']),
									   mysql_real_escape_string($_REQUEST['ParticipantLastName']),
										 mysql_real_escape_string($_REQUEST['ParticipantAddress']),
										 mysql_real_escape_string($_REQUEST['ParticipantCity']),
										 mysql_real_escape_string($_REQUEST['ParticipantState']),
										 mysql_real_escape_string($_REQUEST['ParticipantCountryID']),
										 mysql_real_escape_string($_REQUEST['ParticipantEmail']),
										 mysql_real_escape_string($_REQUEST['ParticipantPhoneNumber']),
										  mysql_real_escape_string($_REQUEST['CompanyName']),
										  mysql_real_escape_string($_REQUEST['JobTitle']),
										  mysql_real_escape_string($_REQUEST['CompanyAddress']),
										  mysql_real_escape_string($_REQUEST['CompanyCity']),
										  mysql_real_escape_string($_REQUEST['CompanyState']),
										  mysql_real_escape_string($_REQUEST['CompanyCountryID']),
										  mysql_real_escape_string($_REQUEST['RegistrationDate']),
										  mysql_real_escape_string($_REQUEST['EventDateID'])
					
									);
		$result = @mysql_query($query, $dbconnection);
      if (mysql_errno() <> 0) {
         if (mysql_errno() == 1062) {
            $this->errors[] = "A record already exists with this ID.";
         } else {
            trigger_error("SQL", E_USER_ERROR);
         } // if
      } // if
	  
	  return true;
   	   
   } // insertRecord
   */

 /**
  *@param $match_str1 contains the query string being searched for.
  *@param $match_str2 is an array of strings used to narrow the search, eg for the WHERE clause.
  */
	function getRegDataByQuery($match_str1)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	 
	 $select_str = "SELECT RegistrationID, ConfirmationID, event_table.EventName, event_date_table.StartDate, event_date_table.EndDate, event_date_table.EventState, event_date_table.EventCountry, ParticipantFirstName, ParticipantLastName, ParticipantAddress, ParticipantCity, ParticipantState, country_table.CountryName, ParticipantEmail, ParticipantPhoneNumber, CompanyName, JobTitle, CompanyAddress, CompanyCity, CompanyState, CompanyCountryID, RegistrationDate";
	 $join_str = "LEFT JOIN event_table ON REventID = event_table.EventID
LEFT JOIN country_table ON ParticipantCountryID = CountryID
LEFT JOIN event_date_table ON REventDateID = event_date_table.EventDateID";
	  $order_str = " $this->order_str DESC";
	  if (!empty($match_str1))
	  {
		  $where_str = "WHERE";
		  $select_str .= sprintf(", match(ParticipantFirstName, ParticipantLastName) against ('%s' IN BOOLEAN MODE) as relevance", mysql_real_escape_string($match_str1));
		  
	  	 $where_str .= sprintf(" match(ParticipantFirstName, ParticipantLastName) against ('%s' IN BOOLEAN MODE)", mysql_real_escape_string($match_str1));	
	  	$order_str = " relevance DESC";
	  }
	  	  
	  $query = "$select_str FROM $this->tablename $join_str $where_str ORDER BY $order_str";
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
		
		
	}//getRegDataByQuery
	
	function getRegDataBySelect($match_str2)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	 
	 $select_str = "SELECT RegistrationID, ConfirmationID, event_table.EventName, event_date_table.StartDate, event_date_table.EndDate, event_date_table.EventState, event_date_table.EventCountry, ParticipantFirstName, ParticipantLastName, ParticipantAddress, ParticipantCity, ParticipantState, country_table.CountryName, ParticipantEmail, ParticipantPhoneNumber, CompanyName, JobTitle, CompanyAddress, CompanyCity, CompanyState, CompanyCountryID, RegistrationDate";
	 $join_str = "LEFT JOIN event_table ON REventID = event_table.EventID
LEFT JOIN country_table ON ParticipantCountryID = CountryID
LEFT JOIN event_date_table ON REventDateID = event_date_table.EventDateID";
	  $order_str = " $this->order_str DESC";
	  if (!empty($match_str2))
	  {
		  $where_str = "WHERE";
		  foreach($match_str2 as $key => $mstr2){
	  	 $where_str .= sprintf(" $mstr2 = '%s' AND", mysql_real_escape_string($_REQUEST[$mstr2]));
		  }
		   $where_str = rtrim($where_str, 'AND');
	  }
	  $query = "$select_str FROM $this->tablename $join_str $where_str ORDER BY $order_str";
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
		
	}//getRegDataBySelect
	
	function getRegDataByBoth($match_str1, $match_str2)
	{
		global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	 
	 $select_str = "SELECT RegistrationID, ConfirmationID, event_table.EventName, event_date_table.StartDate, event_date_table.EndDate, event_date_table.EventState, event_date_table.EventCountry, ParticipantFirstName, ParticipantLastName, ParticipantAddress, ParticipantCity, ParticipantState, country_table.CountryName, ParticipantEmail, ParticipantPhoneNumber, CompanyName, JobTitle, CompanyAddress, CompanyCity, CompanyState, CompanyCountryID, RegistrationDate";
	 $join_str = "LEFT JOIN event_table ON REventID = event_table.EventID
LEFT JOIN country_table ON ParticipantCountryID = CountryID
LEFT JOIN event_date_table ON REventDateID = event_date_table.EventDateID";
	  $order_str = " $this->order_str DESC";
	  $where_str = null;
	  if (!empty($match_str1))
	  {
		  $where_str = "WHERE";
		  $select_str .= sprintf(", match(ParticipantFirstName, ParticipantLastName) against ('%s' IN BOOLEAN MODE) as relevance", mysql_real_escape_string($match_str1));
		  
	  	 $where_str .= sprintf(" match(ParticipantFirstName, ParticipantLastName) against ('%s' IN BOOLEAN MODE)", mysql_real_escape_string($match_str1));	
	  	$order_str = " relevance DESC";
	  }
	   if (!empty($match_str2))
	  {
		  
		 if ($where_str == null){ $where_str = "WHERE";} else { $where_str .= " AND";}
		  foreach($match_str2 as $mstr2){
	  	 $where_str .= sprintf(" $mstr2 = '%s' AND", mysql_real_escape_string($_REQUEST[$mstr2]));
		  }
		   $where_str = rtrim($where_str, 'AND');
	  }
	   $query = "$select_str FROM $this->tablename $join_str $where_str ORDER BY $order_str";
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
			
	}//getRegDataByBoth

}//Class

?>