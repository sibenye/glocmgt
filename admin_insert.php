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
	case "1":// case 1 is for adding a new event
	$postedValues = array(EventName, EventDescription);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$event_table = new event_table;
		
		$inserted = $event_table->insertRecord($postedValues);
		if ($inserted)
		{
			$_SESSION['good_message1'] = "The Event has been added.";
			$_SESSION['err_message1'] = "Please remember to add the schedule for this event.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The Event was not added, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "FILL IN THE REQUIRED FEILDS";
			header ("location: admin_dashboard.php"); exit;
	}
	break;
	
	case "2":// case 2 is for adding a new schedule
	$postedValues = array(EventID, EventState, EventCountry, StartDate, EndDate);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$event_date_table = new event_date_table;
		
		$inserted = $event_date_table->insertRecord($postedValues);
		if ($inserted)
		{
			$_SESSION['good_message1'] = "The Schedule has been added.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The Schedule was not added, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "FILL IN THE REQUIRED FEILDS";
			header ("location: admin_dashboard.php"); exit;
	}
	break;
	
	case "5": // case 5 is for adding pictures
	include 'pic_insert_validation.php';
	
	header ("location: admin_dashboard.php"); exit;
	
	break;
	
	case "7": //case 7 is for adding a new admin
	$postedValues = array(AdminName, Username, Password, CreationDate);
	$validate = fieldValidator($postedValues);
	if ($validate == "valid")
	{
		$newpassword1 = $_REQUEST['Password'];
		$newpassword2 = $_REQUEST['ConPassword'];
		
		$admin_table = new admin_table;
		
		if ($newpassword1 != $newpassword2){
			$_SESSION['err_message1'] = "PLEASE CONFIRM PASSWORD";
			header ("location: admin_dashboard.php"); exit;	
		}
		
		$inserted = $admin_table->insertRecord($postedValues);
		if ($inserted)
		{
			$_SESSION['good_message1'] = "New Admin has been added.";
			header ("location: admin_dashboard.php"); exit;
		}
		else
		{
			$_SESSION['err_message1'] = "ERROR: The New Admin has not added, please try again";
			header ("location: admin_dashboard.php"); exit;	
		}
	}
	else
	{
		$_SESSION['err_message1'] = "FILL IN THE REQUIRED FEILDS";
			header ("location: admin_dashboard.php"); exit;
	}
	break;
}
	
	
	
		
		
		
	














?>