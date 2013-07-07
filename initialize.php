<?php


include ('db_txns_utilities.inc.php');
include('helper_fns.php');

  $view = empty($_GET['view']) ? 'home' : $_GET['view'];
   
	
	switch ($view) {
	
	 case "home":
	  	$class1 = 'active';	
		$title = 'Global Concepts Management';	 
		include 'event_table.class.php';
		$event_table = new event_table;
		$features = $event_table->getfeatured('Yes');
		

	  break;
	  
	  case "about":
	  		$class2 = 'active';	
			$title = 'GCM - About Us';
			
	   break;
	   
	   case "subsidiaries":
	  		$class3 = 'active';	
			$title = 'GCM - Subsidiaries';
	  break;
	  
	  case "services":
	  		$class4 = 'active';	
			$title = 'GCM - Services';
	  break;
	  
	  case "gallery":
	  		$class5 = 'active';	
			$title = 'GCM - Gallery';
			$GalleryID = $_REQUEST['GalleryID'];
			include 'gallery_table.class.php';
			$gallery_table = new gallery_table;
			$pictures = $gallery_table->getPictures($GalleryID);
	  		
	  break;
	  
	  case "contact":
	  		$class6 = 'active';	
			$title = 'GCM - Contact';
	  break;
	  
	  case "portfolio":
	  		$class7 = 'active';	
			$title = 'GCM - Portfolio';
	  break;
	  
	  case "upcoming_events":
	  			
			$title = 'GCM - Upcoming Events';
			include 'event_table.class.php';
			$event_table = new event_table;
			$events = $event_table->getEvent($_REQUEST['EventID']);
			include 'event_date_table.class.php';
			$event_date_table = new event_date_table;
	  break;
	  
	  case "show_event":
	  			
			$title = 'GCM - Show Event';
			include 'event_table.class.php';
			$event_table = new event_table;
			$events = $event_table->getEvent($_REQUEST['EventID']);
			include 'event_date_table.class.php';
			$event_date_table = new event_date_table;
	  break;
	  
	  case "event_registration":
	  session_start();
			$ParticipantFirstName= $_SESSION['ParticipantFirstName'];
			$ParticipantLastName= $_SESSION['ParticipantLastName'];
			$ParticipantAddress= $_SESSION['ParticipantAddress'];
			$ParticipantCity= $_SESSION['ParticipantCity'];
			$ParticipantState= $_SESSION['ParticipantState'];
			$ParticipantCountryID= $_SESSION['ParticipantCountryID'];
			$ParticipantEmail= $_SESSION['ParticipantEmail'];
			$ParticipantPhoneNumber= $_SESSION['ParticipantPhoneNumber'];
			$CompanyName= $_SESSION['CompanyName'];
			$JobTitle= $_SESSION['JobTitle'];
			$CompanyAddress= $_SESSION['CompanyAddress'];
			$CompanyCity= $_SESSION['CompanyCity'];
			$CompanyState= $_SESSION['CompanyState'];
			$CompanyCountryID= $_SESSION['CompanyCountryID'];
			$RegistrationDate= $_SESSION['RegistrationDate'];
			session_unset();
			session_destroy();
			$title = 'GCM - Event Registration';
			$select = $_REQUEST['select'];
			$NumberOfParticipants = $_REQUEST['NumberOfParticipants'];
			$NumberOfRegisteredParticipants = $_REQUEST['NumberOfRegisteredParticipants'];
			$EventID = $_REQUEST['EventID'];
			$REventID = $_REQUEST['REventID'];
			$message1 = $_REQUEST['message1'];
			$message2 = $_REQUEST['message2'];
			$message3 = $_REQUEST['message3'];
			$message4 = $_REQUEST['message4'];
			include 'country_table.class.php';
			$country_table = new country_table;
			$show_countries = $country_table->getCountry($_REQUEST['CompanyCountryID']);
			$country_table2 = new country_table;
			$show_participant_countries = $country_table2->getCountry($_REQUEST['ParticipantCountryID']);
			include 'registration_table.class.php';
			$registration_table = new registration_table;
			//$registrants = $registration_table->getRegistrantData($_REQUEST['RegistrationID']);
			include 'event_table.class.php';
			$event_table = new event_table;
			$events = $event_table->getEvent($EventID);
			include 'event_date_table.class.php';
			$event_date_table = new event_date_table;
			$venuesanddates = $event_date_table->getVenueAndDate($EventID);
			$EventDateID = $_REQUEST['REventDateID'];
			include 'track_table.class.php';
			$track_table = new track_table;
	  break;
	  
	  case "lease":
	  			
			$title = 'GCM - Lease Administration';
	  break;
	  } 

	


?>