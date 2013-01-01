<?php
/*
*This file contains functions necessary for database transactions such as
*database connection, conversion of query result to array, error handling etc
*/

$dbconnection  = NULL;
$dbhost     = /*"localhost";*/ "db410919560.db.1and1.com";
$dbusername = /*"root";*/ "dbo410919560";
$dbuserpass = /*"14frances";*/ "globalconcepts";
$dbname = "db410919560";
$query      = NULL;


/**
  * connects to database server and selects a database
  * @return bool (resource)
  */  
  function db_connect()
  {
	  global $dbconnect, $dbhost, $dbusername, $dbuserpass, $dbname;
		$dbconnection = mysql_pconnect($dbhost, $dbusername, $dbuserpass); 
		if(!$dbconnection)
    	{
	   		 return false;
    	}
   
   		elseif(!mysql_select_db($dbname)) 
	 
   		{
	    return false;
    	}
		
		return  $dbconnection;
  }
	
	/**
  * This function takes the result from the database query and converts it into an associative array
  * @return array
  */  
	function db_result_to_array($result)
	{
	  $res_array = array();
		
		for ($count=0;  $row = mysql_fetch_array($result); $count++)
		{
		  $res_array[$count] = $row;
		}
		
		return $res_array;
	}
	
	
	set_error_handler('errorHandler'); //set the inbuilt php error handler function to make use of the user defined function below

function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext)
// If the error condition is E_USER_ERROR or above then abort
{
   switch ($errno)
   {
      case E_USER_WARNING:
      case E_USER_NOTICE:
      case E_WARNING:
      case E_NOTICE:
      case E_CORE_WARNING:
      case E_COMPILE_WARNING:
         break;
      case E_USER_ERROR:
      case E_ERROR:
      case E_PARSE:
      case E_CORE_ERROR:
      case E_COMPILE_ERROR:
      
         global $query;
   
       // session_start();
         
         if (eregi('^(sql)$', $errstr)) {
            $MYSQL_ERRNO = mysql_errno();
            $MYSQL_ERROR = mysql_error();
            $errstr = "MySQL error: $MYSQL_ERRNO : $MYSQL_ERROR";
         } else {
            $query = NULL;
         } // if
         
         echo "<h2>This system is temporarily unavailable</h2>\n";
         echo "<b><font color='red'>\n";
         echo "<p>Fatal Error: $errstr (# $errno).</p>\n";
         if ($query) echo "<p>SQL query: $query</p>\n";
         echo "<p>Error in line $errline of file '$errfile'.</p>\n";
         echo "<p>Script: '{$_SERVER['PHP_SELF']}'.</p>\n";
         echo "</b></font>";
         
         // Stop the system
         //session_unset();
       // session_destroy();
         //die();
      default:
         break;
   } // switch
} // errorHandler -->
?>