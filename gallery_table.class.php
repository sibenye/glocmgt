<?php
require_once 'abstract_table.class.php';
class gallery_table extends abstract_table
{
    // additional class variables go here
    function gallery_table ()
    {
        $this->tablename       = 'gallery_table';
        $this->rows_per_page   = 15;
        $this->fieldlist       = array('GalleryID', 'GalleryPicPath', 'GalleryDescription', 'PostDate');
        $this->fieldlist['GalleryID'] = array('pkey' => 'y');
		$this->primarykey = "GalleryID";
		$this->order_str = "PostDate";
        
				
    } // end class constructor
	
	function getPictures($galleryid)
	{
		 global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		if (empty($eventid))
		{
			$query = "SELECT GalleryID, GalleryPicPath, GalleryDescription, PostDate FROM gallery_table ORDER BY GalleryID DESC";
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
			$query = sprintf("SELECT GalleryID, GalleryPicPath, GalleryDescription, PostDate FROM gallery_table WHERE GalleryID = '%s'", 
							 mysql_real_escape_string($galleryid));
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
	}//getPictures
	
	function insertPicturePath($pic, $picdesc)
	{
		if (empty($pic)) { return; }
		
		global $dbconnection, $query;
     	$dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
		$query = sprintf("INSERT INTO gallery_table SET 
						 GalleryPicPath = '%s', 
						 GalleryDescription = '%s', 
						 PostDate = Now()",
						 mysql_real_escape_string($pic),
						 mysql_real_escape_string($picdesc));
						 
		$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			   
	  return true;
		
	}//insertPicturePath
	
	 function deletePicture ($idarray)
   {
      $this->errors = array();
	  global $dbconnection, $query;
      $dbconnection = db_connect() or trigger_error("SQL", E_USER_ERROR);
      $idvalue  = NULL;
	  //Because actual picture isn't stored in the database, but in the server file system, I deleted the picture file first
	  //before deleting its reference pathname from the database.
      foreach($idarray as $key => $idvalue) 
	  {
        
		$query2 = "SELECT GalleryPicPath FROM gallery_table WHERE GalleryID = '$idvalue'";
		$result2 = mysql_query($query2, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
			while ($row2 = mysql_fetch_array($result2)) 
			{
         		unlink($row2['GalleryPicPath']);
      		} // while
        $query = "DELETE FROM $this->tablename WHERE GalleryID = '$idvalue'";
      	$result = mysql_query($query, $dbconnection) or trigger_error("SQL", E_USER_ERROR);
      } // for
	   
	  return true;
	   
   } // deletePicture

} // end class

?>