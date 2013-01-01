<?php
session_start();
include ('db_txns_utilities.inc.php');
include 'registration_table.class.php';
include('helper_fns.php');			


if (isset($_POST['ConfirmationID']) && $_POST['ConfirmationID'] == $_POST['friend'])
{
global $postedValues;
		$postedValues= array('ConfirmationID', 'REventID', 'ParticipantFirstName', 'ParticipantLastName', 'ParticipantAddress', 'ParticipantCity', 'ParticipantState', 'ParticipantCountryID', 'ParticipantEmail', 'ParticipantPhoneNumber', 'CompanyName', 'JobTitle', 'CompanyAddress', 'CompanyCity', 'CompanyState', 'CompanyCountryID', 'RegistrationDate', 'REventDateID');

$NumberOfParticipants = $_REQUEST['NumberOfParticipants'];
$NumberOfRegisteredParticipants = $_REQUEST['NumberOfRegisteredParticipants'];
$StartDate = $_REQUEST['StartDate'];
	$EndDate = $_REQUEST['EndDate'];
	$EventState = $_REQUEST['EventState'];
	$EventCountry = $_REQUEST['EventCountry'];
	$EventName = $_REQUEST['EventName'];

	$ConfirmationID = $_POST['ConfirmationID'];
	$EventID = $_POST['EventID'];
	$ParticipantFirstName= $_POST['ParticipantFirstName'];
	$ParticipantLastName= $_POST['ParticipantLastName'];
	$ParticipantAddress= $_POST['ParticipantAddress'];
	$ParticipantCity= $_POST['ParticipantCity'];
	$ParticipantState= $_POST['ParticipantState'];
	$ParticipantCountryID= $_POST['ParticipantCountryID'];
	$ParticipantEmail= $_POST['ParticipantEmail'];
	$ParticipantPhoneNumber= $_POST['ParticipantPhoneNumber'];
	$CompanyName= $_POST['CompanyName'];
	$JobTitle= $_POST['JobTitle'];
	$CompanyAddress= $_POST['CompanyAddress'];
	$CompanyCity= $_POST['CompanyCity'];
	$CompanyState= $_POST['CompanyState'];
	$CompanyCountryID= $_POST['CompanyCountryID'];
	$RegistrationDate= $_POST['RegistrationDate'];
	$EventDateID= $_POST['EventDateID'];
	
	

$validate = fieldValidator($postedValues);
switch ($validate)
{
case "valid":
	
	
	$registration_table = new registration_table;
	$inserted = $registration_table->insertRecord($postedValues);
	
	if ($inserted)
	{
		$from_email = "support@glocmgt.com";
		
		$email_subject1 = "[GCM] Thank you for registering";
		$email_content1 = "You have successfully registered for:\n";
		$email_content1 .= $EventName."\n";
		$email_content1 .= "Date: ".$StartDate." to ".$EndDate."\n";
		$email_content1 .= "Venue: ".$EventState." ".$EventCountry."\n";
		$email_content1 .= "Your Confirmation Number is: ".$ConfirmationID;
		
		
		$glocmgt_email = "support@glocmgt.com";
		//$copy_to = "segun.ogunkola@glocmgt.com, ruqaiya.musa@glocmgt.com";
		$header_message = "Confirmation Email was not sent to this Participant";
		$email_subject2 = "New Registration: ".$ParticipantFirstName." ".$ParticipantLastName;
	
		$email_content2 = "Registration of:\n";
		$email_content2 .= "First Name: ".$ParticipantFirstName."\n";
		$email_content2 .= "Last Name: ".$ParticipantLastName."\n";
		$email_content2 .= "Email Address: ".$ParticipantEmail."\n";
		$email_content2 .= "Confirmation Number: ".$ConfirmationID."\n";
		$email_content2 .= "Event registered for: ".$EventName."\n";
		$email_content2 .= "Venue: ".$EventState." ".$EventCountry."\n";
		$email_content2 .= "Schedule: ".$StartDate." to ".$EndDate;
		
		$message1 = "Participant ".$NumberOfRegisteredParticipants." has been registered successfully.";
		
		
		if(!@mail($ParticipantEmail,$email_subject1,$email_content1,"From: $from_email", "-f $from_email"))
			{
				$message2 = "But we were unable to send the CONFIRMATION number to his/her email<br/>
						Please write it down: ".$ConfirmationID; 
						++$NumberOfRegisteredParticipants;
						
					if ($NumberOfRegisteredParticipants <= $NumberOfParticipants)
					{
						$message3 = "Continue filling form for next Participant";
						
				@mail($glocmgt_email,$email_subject2,$email_content2, "$header_message From: GCM Website", "-f $from_email");//send email to admin 		with notification
					}
				
header ("location:/event_registration.php?view=event_registration&select=2&NumberOfParticipants=$NumberOfParticipants&NumberOfRegisteredParticipants=$NumberOfRegisteredParticipants&EventID=$EventID&message1=$message1&message2=$message2&message3=$message3&EventDateID=$EventDateID"); exit;
						
		}
		else
		{
					$message2 = "The CONFIRMATION Number has been sent to Participant's email";
					
					@mail($glocmgt_email,$email_subject2,$email_content2,"From: GCM Website", "-f $from_email");//send email to admin
					++$NumberOfRegisteredParticipants;
					
					if ($NumberOfRegisteredParticipants <= $NumberOfParticipants)
					{
						$message3 = "Continue filling form for next Participant";
					}
					
header ("location:/event_registration.php?view=event_registration&select=2&NumberOfParticipants=$NumberOfParticipants&NumberOfRegisteredParticipants=$NumberOfRegisteredParticipants&EventID=$EventID&message1=$message1&message2=$message2&message3=$message3&EventDateID=$EventDateID"); exit;
		}
}
	if (!$inserted) 
	{ $message4 = "ERROR: Participant ".$NumberOfRegisteredParticipants." was NOT registered successfully.<br/>
			Please register again";
			
			
header ("location:/event_registration.php?view=event_registration&select=2&NumberOfParticipants=$NumberOfParticipants&NumberOfRegisteredParticipants=$NumberOfRegisteredParticipants&EventID=$EventID&message4=$message4&EventDateID=$EventDateID"); exit;
	}

break;	



	case "PLEASE FILL IN REQUIRED FIELDS":

	$message4 = $validate;
	$_SESSION['ParticipantFirstName']= $_POST['ParticipantFirstName'];
	$_SESSION['ParticipantLastName']= $_POST['ParticipantLastName'];
	$_SESSION['ParticipantAddress']= $_POST['ParticipantAddress'];
	$_SESSION['ParticipantCity']= $_POST['ParticipantCity'];
	$_SESSION['ParticipantState']= $_POST['ParticipantState'];
	$_SESSION['ParticipantCountryID']= $_POST['ParticipantCountryID'];
	$_SESSION['ParticipantEmail']= $_POST['ParticipantEmail'];
	$_SESSION['ParticipantPhoneNumber']= $_POST['ParticipantPhoneNumber'];
	$_SESSION['CompanyName']= $_POST['CompanyName'];
	$_SESSION['JobTitle']= $_POST['JobTitle'];
	$_SESSION['CompanyAddress']= $_POST['CompanyAddress'];
	$_SESSION['CompanyCity']= $_POST['CompanyCity'];
	$_SESSION['CompanyState']= $_POST['CompanyState'];
	$_SESSION['CompanyCountryID']= $_POST['CompanyCountryID'];
	
	
	
header ("location:/event_registration.php?view=event_registration&select=2&NumberOfParticipants=$NumberOfParticipants&NumberOfRegisteredParticipants=$NumberOfRegisteredParticipants&EventID=$EventID&message4=$message4&EventDateID=$EventDateID"); exit;
	
break;

 	case "INVALID EMAIL ADDRESS":

	$message4 = $validate;
	$_SESSION['ParticipantFirstName']= $_POST['ParticipantFirstName'];
	$_SESSION['ParticipantLastName']= $_POST['ParticipantLastName'];
	$_SESSION['ParticipantAddress']= $_POST['ParticipantAddress'];
	$_SESSION['ParticipantCity']= $_POST['ParticipantCity'];
	$_SESSION['ParticipantState']= $_POST['ParticipantState'];
	$_SESSION['ParticipantCountryID']= $_POST['ParticipantCountryID'];
	$_SESSION['ParticipantEmail']= $_POST['ParticipantEmail'];
	$_SESSION['ParticipantPhoneNumber']= $_POST['ParticipantPhoneNumber'];
	$_SESSION['CompanyName']= $_POST['CompanyName'];
	$_SESSION['JobTitle']= $_POST['JobTitle'];
	$_SESSION['CompanyAddress']= $_POST['CompanyAddress'];
	$_SESSION['CompanyCity']= $_POST['CompanyCity'];
	$_SESSION['CompanyState']= $_POST['CompanyState'];
	$_SESSION['CompanyCountryID']= $_POST['CompanyCountryID'];
	
header ("location:/event_registration.php?view=event_registration&select=2&NumberOfParticipants=$NumberOfParticipants&NumberOfRegisteredParticipants=$NumberOfRegisteredParticipants&EventID=$EventID&message4=$message4&EventDateID=$EventDateID"); exit;

break;
default:
header ('location:/event_registration.php?view=event_registration&select=2'); 

exit;

}
}


header ('location:/event_registration.php?view=event_registration&select=2');

exit;

?>