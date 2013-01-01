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
	case "3": //Case 3 is for deleting an event
	$EventID = $_REQUEST['EventID'];
	$num = count($EventID);
	$event_date_table = new event_date_table;
	
		$schedules = $event_date_table->getVenueAndDate($EventID);
		if ($schedules)
		{
			$_SESSION['err_message1'] = "WARNING: One or more of the Events you want to delete still has existing schedules.<br/>
											Delete the schedules before deleting the event"; 
			header ("location: admin_dashboard.php"); exit;
		}//if	
	
	$event_table = new event_table;
	$deleted = $event_table->deleteRecord($EventID);
	if ($deleted)
	{
		$_SESSION['good_message1'] = $num." Event has been deleted";
		header ("location: admin_dashboard.php"); exit;
	}
	else
	{
		$_SESSION['err_message1'] = "ERROR: Could not delete Event, try again";
		header ("location: admin_dashboard.php"); exit;
	}
	break;
	case "4": //case 4 is for deleting an event schedule
	$EventDateID = $_REQUEST['EventDateID'];
	$num = count($EventDateID);
	$event_date_table = new event_date_table;
	$deleted = $event_date_table->deleteRecord($EventDateID);
	if ($deleted)
	{
		$_SESSION['good_message1'] = $num." Event Schedule has been deleted";
		header ("location: admin_dashboard.php"); exit;
	}
	else
	{
		$_SESSION['err_message1'] = "ERROR: Could not delete Event Schedule, try again";
		header ("location: admin_dashboard.php"); exit;
	}
	break;
	case "6"://case 6 is for deleting pics
	$GalleryID = $_REQUEST['GalleryID'];
	$num = count($GalleryID);
	$gallery_table = new gallery_table;
	$deleted = $gallery_table->deletePicture($GalleryID);
	if ($deleted)
	{
		
		$_SESSION['good_message1'] = $num." Pictures has been deleted";
		header ("location: admin_dashboard.php?f=$filenm"); exit;
	}
	else
	{
		$_SESSION['err_message1'] = "ERROR: Could not delete Picture, try again";
		header ("location: admin_dashboard.php"); exit;
	}
	break;
	
	case "8"://case 8 is for deleting admins
	$AdminID = $_REQUEST['AdminID'];
	$num = count($AdminID);
	$admin_table = new admin_table;
	$deleted = $admin_table->deleteRecord($AdminID);
	if ($deleted)
	{
		
		$_SESSION['good_message1'] = $num." Administrator has been deleted";
		header ("location: admin_dashboard.php"); exit;
	}
	else
	{
		$_SESSION['err_message1'] = "ERROR: Could not delete Administrator, try again";
		header ("location: admin_dashboard.php"); exit;
	}
	break;
}
?>