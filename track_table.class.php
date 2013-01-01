<?php
require_once 'abstract_table.class.php';
class track_table extends abstract_table
{
    // additional class variables go here
    function track_table ()
    {
        $this->tablename       = 'track_table';
        $this->rows_per_page   = 15;
        $this->fieldlist       = array('TrackID', 'LastRegistrationID');
        $this->fieldlist['TrackID'] = array('pkey' => 'y');
		$this->primarykey = "TrackID";
        
				
    } // end class constructor

} // end class

?>