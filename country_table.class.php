<?php
require_once 'abstract_table.class.php';
class country_table extends abstract_table
{
    // additional class variables go here
    function country_table ()
    {
        $this->tablename       = 'country_table';
        $this->rows_per_page   = 15;
       
        
				
    } // end class constructor
	
	function getCountry($countryid)
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		if (empty($countryid))
		{
			$query = "SELECT CountryID, CountryName, Capital, CurrencyCode, CurrencyName, TelephoneCode, 2LetterCode, 3LetterCode FROM country_table ORDER BY CountryName ASC";
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			
			 while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array[] = $row;
      		} // while
			
			 mysql_free_result($result);
   
      		return $this->data_array;
		}
		
		else
		{
			$query = sprintf("SELECT CountryID, CountryName, Capital, CurrencyCode, CurrencyName, TelephoneCode, 2LetterCode, 3LetterCode FROM country_table WHERE CountryID = '%s'", 
							 mysql_real_escape_string($countryid));
			$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			while ($row = mysql_fetch_assoc($result)) {
         		$this->data_array = $row;
      		} // while
			if (mysql_num_rows($result) == 0)
				{
					return false;
				}
				else
				{
			
					 mysql_free_result($result);
		   
					return $this->data_array;
				}
		}//if
	}//getCountry
	
	
} // end class

?>