<?php
echo
	"<table id='admintable'>
   <tr>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Event</th>
   <th>Confirmation ID</th>
   <th>Event Schedule</th>
   <th>Email</th>
   <th>Phone No.</th>
   <th>Address</th>
   <th>Company</th>
   <th>Job Title</th>
   <th>Register Date</th>
   </tr>";
 	foreach($registrants as $registrant){ 
	echo
  "<tr>
	<td>".$registrant['ParticipantFirstName']."</td>
   	<td>".$registrant['ParticipantLastName']."</td>
    <td>".$registrant['EventName']."</td>
    <td>".$registrant['ConfirmationID']."</td>
    <td>".$registrant['StartDate']." to ".$registrant['EndDate'].", ".$registrant['EventState'].", ".$registrant['EventCountry']."</td>
    <td>".$registrant['ParticipantEmail']."</td>
    <td>".$registrant['ParticipantPhoneNumber']."</td>
    <td>".$registrant['ParticipantAddress'].", ".$registrant['ParticipantCity'].", ".$registrant['ParticipantState'].", ".$registrant['CountryName']."</td>
    <td>".$registrant['CompanyName']."</td>
    <td>".$registrant['JobTitle']."</td>
    <td>".$registrant['RegistrationDate']."</td>
     </tr>";
	}
	echo "</table>";



?>