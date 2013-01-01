<?php 
include ('db_txns_utilities.inc.php');
include('helper_fns.php');
include 'event_table.class.php';
include 'event_date_table.class.php';
include 'gallery_table.class.php';
include 'admin_table.class.php';

session_start();

$select = $_REQUEST['select'];

Switch ($select)
{
	case "11":// Case 11 is for updating an event
	$postedValues = array(EventID, EventName, EventDescription);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$event_table = new event_table;
		
		$updated = $event_table->updateRecord($postedValues);
		if ($updated)
		{
			$_SESSION['good_message1'] = "The Event has been updated.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The Event was not updated, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "DO NOT LEAVE THE FEILDS EMPTY";
			header ("location: admin_dashboard.php"); exit;
	}
	break;
	
	case "12"://case 12 is for updating admin password
	$postedValues = array(AdminID, Username, Password);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$username = $_REQUEST['Username'];
		$currpassword = $_REQUEST['currpassword'];
		$newpassword1 = $_REQUEST['Password'];
		$newpassword2 = $_REQUEST['ConPassword'];
		$admin_table = new admin_table;
		
		$authenticate = $admin_table->authenticateUser($username, $currpassword);
		if (!$authenticate){
			$_SESSION['err_message1'] = "INVALID CURRENT PASSWORD ";
			header ("location: admin_dashboard.php"); exit;	
		}
		if ($newpassword1 != $newpassword2){
			$_SESSION['err_message1'] = "PLEASE CONFIRM PASSWORD";
			header ("location: admin_dashboard.php"); exit;	
		}
		
		$updated = $admin_table->updateRecord($postedValues);
		if ($updated)
		{
			$_SESSION['good_message1'] = "Your Password has been updated.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The Event was not updated, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "DO NOT LEAVE THE FEILDS EMPTY";
			header ("location: admin_dashboard.php"); exit;
	}
	break;
	
	case "13"://case for updating featured event
	$postedValues = array(EventID2);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$eventid1 = $_REQUEST['EventID1'];
		$eventid2 = $_REQUEST['EventID2'];
		
		$event_table = new event_table;
		$feature_changed = $event_table->update_featured($eventid1, $eventid2);
		
		if ($feature_changed)
		{
			$_SESSION['good_message1'] = "The Featured Event has been updated.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The Featured Event was not updated, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "DO NOT LEAVE THE FEILDS EMPTY";
			header ("location: admin_dashboard.php"); exit;
	}
	
	break;
	
}




?>