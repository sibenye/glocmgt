<?php
class abstract_table
{
  var $tablename;         // table name
  var $dbname;            // database name
  var $rows_per_page;     // used in pagination
  var $pageno;            // current page number
  var $lastpage;          // highest page number
  var $fieldlist;         // list of fields in this table
  var $data_array;        // data from the database
  var $errors;            // array of error messages
  var $primarykey;			//primary feild of table
  var $order_str;			//feild by which query results will be ordered by
  
   function Table_Abstract_Class()
  {
    $this->tablename       = 'default';
    $this->rows_per_page   = 10;
    
    $this->fieldlist = array('column1', 'column2', 'column3');
    $this->fieldlist['column1'] = array('pkey' => 'y');
	$this->primarykey = "column1";
	$this->order_str = "column1";
  } // constructor
  
  
  /**
  *@param $match_str1 contains the query string being searched for.
  *@param $match_str2 is an array of strings used to narrow the search, eg for the WHERE clause.
  */
   function getData ($match_str1, $match_str2)
   {
      $this->data_array = array();
      $pageno          = $this->pageno;
      $rows_per_page   = $this->rows_per_page;
      $this->numrows   = 0;
      $this->lastpage  = 0;
	  
	  global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	 /* 
	  if (empty($where)) {
         $where_str = NULL;
      } else {
         $where_str = "WHERE $where";
      } // if
	  
	  $query = "SELECT count(*) FROM $this->tablename $where_str";
      $result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
      $query_data = mysql_fetch_row($result);
      $this->numrows = $query_data[0];
	  
	   if ($this->numrows <= 0) {
         $this->pageno = 0;
         return;
      } // if
	  
	   if ($rows_per_page > 0) {
         $this->lastpage = ceil($this->numrows/$rows_per_page);
      } else {
         $this->lastpage = 1;
      } // if
	  
	   if ($pageno == '' OR $pageno <= '1') {
         $pageno = 1;
      } elseif ($pageno > $this->lastpage) {
         $pageno = $this->lastpage;
      } // if
      $this->pageno = $pageno;
	  
	   if ($rows_per_page > 0) {
         $limit_str = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
      } else {
         $limit_str = NULL;
      } // if
	  */
	  $order_str = " $this->order_str DESC";
	  if (!empty($match_str1)){
	  	 $where_str .= sprintf(" $match_str1 LIKE '%s' AND", mysql_real_escape_string($_REQUEST[$match_str1]));	
	  }
	  if (!empty($match_str2)){
		  foreach($match_str2 as $mstr2){
	  	 $where_str .= sprintf(" $mstr2 = '%s' AND", mysql_real_escape_string($_REQUEST[$mstr2]));
		  }
	  }
	 
	  
	  $where_str = rtrim($where_str, 'AND');
	  
	  
	  $query = "SELECT * FROM $this->tablename WHERE $where_str ORDER BY $order_str";
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
      
   } // getData
   
   
   function insertRecord ($fieldarray)
   {
      $this->errors = array();
	   global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
	  /*$fieldlist = $this->fieldlist;
      foreach ($fieldarray as $field => $fieldvalue) {
         if (!in_array($field, $fieldlist)) {
            unset ($fieldarray[$field]);
         } // if
      } // foreach*/
	  
	   $query = "INSERT INTO $this->tablename SET ";
      foreach ($fieldarray as $item => $value) 
	  {
		 $content = mysql_real_escape_string($_REQUEST[$value]);
         $query .= $value." = '".$content."', ";
      } // foreach
	  
	   $query = rtrim($query, ', ');
		  
	  $result = mysql_query($query, $dbconnection);
      if (mysql_errno() <> 0) {
         if (mysql_errno() == 1062) {
            $this->errors[] = "A record already exists with this ID.";
         } else {
            trigger_error("SQL", E_USER_ERROR);
         } // if
      }else {	   
	  return true;}
   	   
   } // insertRecord 
   
    function updateRecord ($fieldarray)
   {
      $this->errors = array();
	  global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  
	  /*
	   $fieldlist = $this->fieldlist;
      foreach ($fieldarray as $field => $fieldvalue) {
         if (!in_array($field, $fieldlist)) {
            unset ($fieldarray[$field]);
         } // if
      } // foreach
	  */
	   $primarykey = $this->primarykey;
	  $where  = NULL;
      $update = NULL;
      foreach ($fieldarray as $item => $value) {
         if ($value == $primarykey) {
            $where .= "$value='".$_REQUEST[$value]."'";
         } else {
            $update .= "$value='".$_REQUEST[$value]."', ";
         } // if
      } // foreach
	  
	   //$where  = rtrim($where, ' AND ');
      $update = rtrim($update, ', ');
	  
	   $query = "UPDATE $this->tablename SET $update WHERE $where";
      $result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
      
     if (mysql_errno() == 0) 
	  { return true;}
      
   } // updateRecord
   
   
    function deleteRecord ($idarray)
   {
      $this->errors = array();
	  global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
	  $primarykey = $this->primarykey;
      $idvalue  = NULL;
      for($i=0; $i < count($idarray); ++$i) {
        $idvalue .= $idarray[$i];
        $query = "DELETE FROM $this->tablename WHERE $primarykey = '$idvalue'";
      	$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
      } // for
	  if (mysql_errno() == 0) 
	  { return true;}
	   
   } // deleteRecord
} // end class
?>