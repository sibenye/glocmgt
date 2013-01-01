<?php
$queri = $_REQUEST['queri'];

switch ($queri)
{
	case "by_all":
	
	echo
	"<div class='line'></div>
	<p>Search Participant...</p>
	<form id='adminform' action='admin_dashboard' method='post'>
	<ol><li><label>By Name  </label><input type='text' name='match_str1'/><span><em>..full or partial name</em></span></li>
	<input type='hidden' name='select' value='queri' />
   	<input type='hidden' name='queri' value='by_name' />
	<li><input type='submit' value='Search'/></li></ol></form>";
	echo
	"<form id='adminform' action='admin_dashboard' method='post'><ol>
	<li><label>By Country  </label>
	<select name='CountryID' class='short'>
	 <option></option>";
		foreach($show_event_countries as $list_country)
		{
			echo
			"<option value='".$list_country['CountryID']."' name='CountryID'>"
			.$list_country['CountryName']."</option>";
        }
		echo
		"</select></li>
		<input type='hidden' name='select' value='queri' />
   		<input type='hidden' name='queri' value='by_country' />
		<li><input type='submit' value='Search'/></li></ol></form>";
	
	$registrants = $registration_table->getRegistrantData();
	$numrows = count($registrants);
	echo
	"<div class='line'></div>
	<h3>You are viewing all Registrants of all Events ----- $numrows results</h3>";
	
	include 'query_view_table.php';
	break;
	
	case"by_name":
	$match_str1 = $_REQUEST['match_str1'];
	echo
	"<div class='line'></div>
	<form id='adminform' action='admin_dashboard' method='post'><ol>
	<li><label>By Country  </label>
	<select name='CountryID' class='short'>
	 <option></option>";
		foreach($show_event_countries as $list_country)
		{
			echo
			"<option value='".$list_country['CountryID']."' name='CountryID'>"
			.$list_country['CountryName']."</option>";
        }
		echo
		"</select></li>
		<input type='hidden' name='select' value='queri' />
		<input type='hidden' name='match_str1' value = '".$match_str1."' />
   		<input type='hidden' name='queri' value='by_name_country' />
		<li><input type='submit' value='Search'/></li></ol></form>";
	echo
	"<div class='line'></div>";	
	$registrants = $registration_table->getRegDataByQuery($match_str1);
	if (!$registrants)
	{
		echo "<h3>No results found</h3>";
	}
	else
	{
	$numrows = count($registrants);
	echo
	"<div class='line'></div>
	<h3>You are viewing all Registrants matching $match_str1 ----- $numrows results</h3>";
	
	include 'query_view_table.php';
	}
		
	break;
	
	case "by_country":
	$ParticipantCountryID = $_REQUEST['CountryID'];
	$match_str2 = array();
	$match_str2[] = "CountryID";
	$countryName = $country_table->getCountry($ParticipantCountryID);
	
	echo
	"<div class='line'></div>
	<p>Search Participant...</p>
	<form id='adminform' action='admin_dashboard' method='post'>
	<ol><li><label>By Name  </label><input type='text' name='match_str1'/><span><em>..full or partial name</em></span></li>
	<input type='hidden' name='select' value='queri' />
	<input type='hidden' name='CountryID' value='".$ParticipantCountryID."' />
   	<input type='hidden' name='queri' value='by_name_country' />
	<li><input type='submit' value='Search'/></li></ol></form>";
	
	echo
	"<div class='line'></div>";	
	$registrants = $registration_table->getRegDataBySelect($match_str2);
	if (!$registrants)
	{
		echo "<h3>No results found</h3>";
	}
	else
	{
	$numrows = count($registrants);
	echo
	"<h3>You are viewing all Registrants from ".$countryName['CountryName']." ----- $numrows results</h3>";
	
	include 'query_view_table.php';
	}
	break;
	
	case "by_name_country":
	$match_str1 = $_REQUEST['match_str1'];
	$ParticipantCountryID = $_REQUEST['CountryID'];
	$match_str2 = array();
	$match_str2[] = "CountryID";
	$countryName = $country_table->getCountry($ParticipantCountryID);
	
	echo
	"<div class='line'></div>";
	
	echo
	"<div class='line'></div>";	
	$registrants = $registration_table->getRegDataByBoth($match_str1, $match_str2);
	if (!$registrants)
	{
		echo "<h3>No results found</h3>";
	}
	else
	{
	$numrows = count($registrants);
	echo
	"<h3>You are viewing all Registrants matching $match_str1 from ".$countryName['CountryName']." ----- $numrows results</h3>";
	
	include 'query_view_table.php';
	}
	break;
	
	case "by_event":
	
	$match_str2 = array();
	$match_str2[] = "REventID";
	echo
		"<div class='line'></div>
		<p>Select Another Event</p>
	<form id='adminform' action='admin_dashboard.php' method='post'>
   		<select name='REventID' size='1' class='long'>";
        foreach($events as $event)
		{
			echo
			"<option value='".$event['EventID']."'>".$event['EventName']."</option>";
        }	
		echo
		"</select>
        <input type='hidden' name='select' value='queri' />
        <input type='hidden' name='queri' value='by_event' />
        <input type='submit' name='viewR' value='GO' />   
   		</form>";
		
	echo
	"<div class='line'></div>";	
	$registrants = $registration_table->getRegDataBySelect($match_str2);
	$singleEvent = $event_table->getEvent($REventID);
	foreach($singleEvent as $Sevent) { $EName = $Sevent['EventName']; }
	if (!$registrants)
	{
		echo "<h3>No results found for:</h3>
		<p><strong>$EName</strong><br/>";
		
	}
	else
	{
	$numrows = count($registrants);
	echo
	"<h3>You are viewing the Registrants for: ----- $numrows results</h3>
	<p><strong>$EName</strong><br/>
	Select a schedule to narrow your search </p>";
	
	echo
	"<form id='adminform' action='admin_dashboard' method='post'><lo>";
	
    foreach ($venues as $venuelist)
	{		
		echo
		"<li>
         <input type='radio' name='REventDateID' value='".$venuelist['EventDateID']."'/>";
        $StartDate = date("M j, Y", strtotime($venuelist['StartDate']));
		$EndDate = date("M j, Y", strtotime($venuelist['EndDate']));
        echo "<span>".$StartDate." to ".$EndDate.", ".$venuelist['EventState'].", ".$venuelist['EventCountry']."</span></li>";
	}
	echo "
	<input type='hidden' name='select' value='queri' />
	<input type='hidden' name='REventID' value='$REventID' />
    <input type='hidden' name='queri' value='by_schedule' />
	<li><input type='submit' value='Search' /></li></lo></form>";

	
	include 'query_view_table.php';
	}
	
	break;
	
	case "by_schedule":
	$match_str2 = array();
	$match_str2[] = "REventID";
	$match_str2[] = "REventDateID";
	echo
		"<div class='line'></div>
		<p>Select Another Event</p>
	<form id='adminform' action='admin_dashboard.php' method='post'>
   		<select name='REventID' size='1' class='long'>";
        foreach($events as $event)
		{
			echo
			"<option value='".$event['EventID']."'>".$event['EventName']."</option>";
        }	
		echo
		"</select>
        <input type='hidden' name='select' value='queri' />
        <input type='hidden' name='queri' value='by_event' />
        <input type='submit' name='viewR' value='GO' />   
   		</form>";

	echo
	"<div class='line'></div>";	
	$registrants = $registration_table->getRegDataBySelect($match_str2);
	$singleEvent = $event_table->getEvent($REventID);
	foreach($singleEvent as $Sevent) { $EName = $Sevent['EventName']; }
	foreach($singleSchedule as $Sschedule) 
	{
		$StartDate = date("M j, Y", strtotime($Sschedule['StartDate']));
		$EndDate = date("M j, Y", strtotime($Sschedule['EndDate']));
		$EventState = $Sschedule['EventState'];
		$EventCountry = $Sschedule['EventCountry'];
	}
		
	if (!$registrants)
	{
		echo "<h3>No results found for:</h3>
		<p><strong>$EName</strong><br/>
		Schedule - $StartDate to $EndDate, $EventState, $EventCountry";
		
	}
	else
	{
	$numrows = count($registrants);
	echo
	"<h3>You are viewing the Registrants for: ----- $numrows results</h3>
	<p><strong>$EName</strong><br/>
	Schedule - $StartDate to $EndDate, $EventState, $EventCountry </p>";
	include 'query_view_table.php';
	}
	break;

}



?>