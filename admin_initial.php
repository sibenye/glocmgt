<?php
session_start();
$Admin_token = $_SESSION['user_id'];
if (isset($Admin_token))
{

include ('db_txns_utilities.inc.php');
include('helper_fns.php');

include 'admin_table.class.php';
include 'country_table.class.php';
include 'event_table.class.php';
include 'event_date_table.class.php';
include 'registration_table.class.php';
include 'gallery_table.class.php';

$select = $_REQUEST['select'];
$bull = $_REQUEST['bull'];
$EventDateID = $_REQUEST['EventDateID'];
$EventID = $_REQUEST['EventID'];
$REventID = $_REQUEST['REventID'];
$REventDateID = $_REQUEST['REventDateID'];
$EventCountry = $_REQUEST['EventCountry'];

$queri = $_REQUEST['queri'];


$registration_table = new registration_table;
$event_table = new event_table;
$features = $event_table->getfeatured('Yes');
$event_table2 = new event_table;
$events = $event_table2->getEvent($EventID);


$event_date_table2 = new event_date_table;
$venues = $event_date_table2->getVenueAndDate($REventID);
$event_date_table = new event_date_table;
$venuesanddates = $event_date_table->getVenueAndDate($EventID);
$eventSchedules = $event_date_table->getSchedules();
$singleSchedule = $event_date_table->getSingleSchedule($REventDateID);

$country_table2 = new country_table;
$show_event_countries = $country_table2->getCountry($CountryID);
$country_table = new country_table;

$gallery_table = new gallery_table;
$pictures = $gallery_table->getPictures($GalleryID);

$Welcome = $_SESSION['welcome'];
$EventName= $_SESSION['EventName'];
$EventState= $_SESSION['EventState'];
$EventCountry= $_SESSION['EventCountry'];
$StartDate= $_SESSION['StartDate'];
$EndDate= $_SESSION['EndDate'];
$EventDescription= $_SESSION['EventDescription'];
$GalleryDescription= $_SESSION['GalleryDescription'];
$SelectedEventID = $_SESSION['SelectedEventID'];
$adminID = $_SESSION['user_id'];
$priviledge = $_SESSION['priviledge'];
			
$GoodMessage1 = $_SESSION['good_message1'];
$GoodMessage2 = $_SESSION['good_message2'];
$GoodMessage3 = $_SESSION['good_message3'];
$GoodMessage4 = $_SESSION['good_message4'];
$ErrMessage1 = $_SESSION['err_message1'];
$ErrMessage2 = $_SESSION['err_message2'];
$ErrMessage3 = $_SESSION['err_message3'];
$ErrMessage4 = $_SESSION['err_message4'];
			
unset($_SESSION['good_message1']);			
unset($_SESSION['good_message2']);			
unset($_SESSION['good_message3']);			
unset($_SESSION['good_message4']);	
unset($_SESSION['err_message1']);			
unset($_SESSION['err_message2']);			
unset($_SESSION['err_message3']);			
unset($_SESSION['err_message4']);			




}
else
{
	session_unset();
	session_destroy();
	header ('location:gcm_admin.php');
	exit;
}
			
?>