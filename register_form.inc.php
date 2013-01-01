 <?php 
 
 if (($select <= 0) || ($select == 2 && empty($NumberOfParticipants))): ?>
<form name="form1" action="event_registration.php?view=event_registration&select=2" method="post" id="registerform">
	<ol>
	<li>
		<label for="events">Select Event <span class= "red">*</span></label>
		<select name="EventID" size="1">
		<?php foreach($events as $event): ?>
		<option value="<?php echo safe_output($event['EventID']); ?>" name="EventID"  ><?php echo safe_output($event['EventName']); ?></option>
        <?php endforeach; ?>	
		</select>
        </li>
        <li> <p><span>Please input number of participants</span></p><br/>
         
				   <label for="NumberOfParticipants">No. of Participants <span class="red">*</span></label>
            <input id="NumberOfParticipants" name="NumberOfParticipants" size="2" maxlength="2" class="text"/>
            </li>
            <!--<li class="buttons">
             	<input type="image" name="imageField" id="imageField" src="images/continue.jpg" />
             </li>-->
             <input name="submit" type="submit" value="Continue"/>
        </ol>

</form>

<?php else:?>
<?php if (($select == 1) || ($select == 2 && empty($NumberOfParticipants))): ?>
<form name="form2" action="event_registration.php?view=event_registration&select=2" method="post" id="registerform">
		<ol>
		<li>
		<label for="events">Event Selected: <span class= "red">*</span></label>
        <?php foreach ($events as $event): ?>
        <input value="<?php echo $event['EventName']; ?>" class="text2" readonly />
        <?php endforeach;?>
        <input type="hidden" value="<?php echo $EventID; ?>" name="EventID" />
        </li>
        <li> <p><span>Please input number of participants</span></p><br/>
		<label for="NumberOfParticipants">No. of Participants <span class="red">*</span></label>
            <input id="NumberOfParticipants" name="NumberOfParticipants" size="2" maxlength="2" class="text"/>
            </li>
            <!--<li class="buttons">
             	<input type="image" name="imageField" id="imageField" src="images/continue.jpg" />
             </li>-->
             <input name="submit" type="submit" value="Continue"/>
        </ol>

</form>



<?php else:?>
<?php if (($select == 2) && ($NumberOfRegisteredParticipants <= $NumberOfParticipants)): ?>
<?php if(!empty($message1)){echo "<p style='color:#0C3;'>".$message1."</p><br/>";}
		if(!empty($message2)){echo "<p style='color:#0C3;'>".$message2."</p><br/>";}
		if(!empty($message3)){echo "<p style='color:#0C3;'>".$message3."</p><br/>";}
		if(!empty($message4)){echo "<p style='color:#F00;'>".$message4."</p><br/>";}?>
<form name="form3" action="record_insert.php" method="post" id="registerform">
         
         <ol>
         <li> 
        
        <label for="events">Event Selected: <span class= "red">*</span></label>
        <?php foreach($events as $event): ?>
        <input name="EventName" value="<?php echo $event['EventName']; ?>" class="text2" readonly />
        <input type="hidden" value="<?php echo $event['EventID']; ?>" name="REventID" />
        <?php endforeach; ?>
        </li>
         <li>
         <?php if ($NumberOfRegisteredParticipants <= 0):   ?>
         			<?php $NumberOfRegisteredParticipants = 1;?>
				   <label for="NumberOfParticipants">No. of Participants <span class="red">*</span></label>
            <input value="<?php echo $NumberOfParticipants; ?>" name="NumberOfParticipants" size="2" maxlength="2" class="text" readonly/>
            <br />
             <label for="NumberOfRegisteredParticipants" class="bold">
          <input type="hidden" value="<?php echo $NumberOfRegisteredParticipants; ?>" name="NumberOfRegisteredParticipants" /> 
          <?php echo "Registering ".$NumberOfRegisteredParticipants." of ".$NumberOfParticipants; ?>
          </label>
          
            <p><span>Registering Participants one at a time.</span></p>
          <?php else: ?>
          <label for="NumberOfParticipants">No. of Participants <span class="red">*</span></label>
            <input value="<?php echo $NumberOfParticipants; ?>" name="NumberOfParticipants" size="2" maxlength="2" class="text" readonly/>
            <br/>
             <label for="NumberOfRegisteredParticipants" class="bold">
          <input type="hidden" value="<?php echo $NumberOfRegisteredParticipants; ?>" name="NumberOfRegisteredParticipants" /> 
          <?php echo "Registering ".$NumberOfRegisteredParticipants." of ".$NumberOfParticipants; ?>
          </label>
            <p><span>Registering Participants one at a time.</span></p>
          <?php endif; ?>
          </li>
         </ol><br/>
         
         
         <label for="EventDate" class="bold"><strong>Select Event Schedule: </strong></label><br/>
         <ol>
         <?php $num = 1; ?>
         <?php foreach ($venuesanddates as $venueanddate): ?>
         <li>
         <label for="EventDateID">Schedule <?php echo $num; ?><span class= "red">*</span> </label>
         <input type="radio" name="REventDateID" value="<?php echo $venueanddate['EventDateID'];?>" <?php if ($venueanddate['EventDateID']==$EventDateID){echo"checked='checked'";}?>/>
         <?php $StartDate = date("M j, Y", strtotime($venueanddate['StartDate']));
		 		$EndDate = date("M j, Y", strtotime($venueanddate['EndDate']));?>
         <?php echo $StartDate." to ".$EndDate.", ".$venueanddate['EventState'].", ".$venueanddate['EventCountry']; ?>
         
         <input type="hidden" name="StartDate" value="<?php echo $venueanddate['StartDate']; ?>"/>
          <input type="hidden" name="EndDate" value="<?php echo $venueanddate['EndDate']; ?>"/>
          <input type="hidden" name="EventState" value="<?php echo $venueanddate['EventState']; ?>"/>
          <input type="hidden" name="EventCountry" value="<?php echo $venueanddate['EventCountry']; ?>"/>
         </li></ol>
         <?php ++$num;?>
         <?php endforeach;?><br/>
          <label for="ParticipantData" class="bold"><strong>Participant's Data: </strong></label><br/>
          <ol>
          <li>
          <label for="ParticipantFirstName">Participant's First Name <span class="red">*</span></label>
           <input id="ParticipantFirstName" name="ParticipantFirstName" 
           value="<?php echo $ParticipantFirstName; ?>" class="text" maxlength="40"/>
          </li>
          <li>
              <label for="lastname">Participant's Last Name <span class="red">*</span></label>
              <input id="ParticipantLastName" name="ParticipantLastName" 
              value="<?php echo $ParticipantLastName; ?>" class="text" maxlength="40"/>
            </li>
          <li>
              <label for="ParticipantEmail">Participant's e-mail <span class="red">*</span></label>
              <input id="ParticipantEmail" name="ParticipantEmail" 
              value="<?php echo $ParticipantEmail;?>" class="text" maxlength="40" />
            </li>
          <li>
              <label for="ParticipantPhoneNumber">Participant's Phone Number <span class="red">*</span></label>
              <input id="ParticipantPhoneNumber" name="ParticipantPhoneNumber" 
              value="<?php echo $ParticipantPhoneNumber;?>" class="text" maxlength="40" />
            </li>
          <li>
              <label for="ParticipantAddress">Participant's Address <span class="red">*</span></label>
              <input id="ParticipantAddress" name="ParticipantAddress"  
              value="<?php echo $ParticipantAddress;?>" class="text" maxlength="40" />
            </li>
          <li>
              <label for="ParticipantCity">City <span class="red">*</span></label>
              <input id="ParticipantCity" name="ParticipantCity" 
              value="<?php echo $ParticipantCity;?>" class="text" maxlength="40" />
            </li>
            <li>  
              <label for="ParticipantState">State <span class="red">*</span></label>
              <input id="ParticipantState" name="ParticipantState" 
              value="<?php echo $ParticipantState;?>" class="text" maxlength="40" />
            </li>
          <li>
            <label for="ParticipantCountry">Country <span class= "red">*</span></label>
		<select name="ParticipantCountryID"  size="1" >
        <option></option>
		<?php foreach($show_participant_countries as $list_country): ?>
		<option value="<?php echo safe_output($list_country['CountryID']); ?>" 
		<?php if ($list_country['CountryID']==$ParticipantCountryID){echo"selected='selected'";}?> name="ParticipantCountryID" class="test" >
		<?php echo safe_output($list_country['CountryName']); ?></option>
        <?php endforeach; ?>	
		</select>
        </li>
        </ol><br/>
            
             <label for="ParticipantCompanyData" class="bold"><strong>Participant's Company Data: </strong></label></li><br/>
            <ol>
            <li>
              <label for="CompanyName">Company Name <span class="red">*</span></label>
              <input id="CompanyName" name="CompanyName" 
              value="<?php echo $CompanyName;?>" class="text" />
            </li>
            <li>
              <label for="JobTitle">Job Title <span class="red">*</span></label>
              <input id="JobTitle" name="JobTitle" 
              value="<?php echo $JobTitle;?>" class="text" />
             </li>
            <li>
              <label for="CompanyAddress">Company Address <span class="red">*</span></label>
              <input id="CompanyAddress" name="CompanyAddress" 
              value="<?php echo $CompanyAddress;?>" class="text" />
            </li>
            <li>
              <label for="CompanyCity">City <span class="red">*</span></label>
              <input id="CompanyCity" name="CompanyCity" 
              value="<?php echo $CompanyCity;?>" class="text" maxlength="40" />
              </li>
            <li> 
              <label for="CompanyState">State <span class="red">*</span></label>
              <input id="CompanyState" name="CompanyState" 
              value="<?php echo $CompanyState;?>" class="text" maxlength="40" />
             </li>
            <li>
            <label for="CompanyCountry">Country <span class= "red">*</span></label>
		<select name="CompanyCountryID"  size="1" class="test" >
         <option></option>
		<?php foreach($show_countries as $list_country): ?>
		<option value="<?php echo safe_output($list_country['CountryID']); ?>" 
		<?php if ($list_country['CountryID']==$CompanyCountryID){echo"selected='selected'";}?> name="CompanyCountryID" class="test" >
		<?php echo safe_output($list_country['CountryName']); ?></option>
        <?php endforeach; ?>	
		</select>
             </li>
             <li>
             <?php $form_token = complexrandgen();?>
             <input type="hidden" name="ConfirmationID" value="<?php echo $form_token; ?>"/>
             <input type="hidden" name="friend" value="<?php echo $form_token; ?>"/>
             </li>
             <li>
             
             <input type="hidden" name="RegistrationDate" value="<?php echo date("Y-m-d"); ?>"/>
             </li>
            </ol><br/>
            <ol>
            <!--<li class="buttons">
             	<input type="image" name="imageField" id="imageField" src="images/register.jpg" />
             </li>-->
             <input name="submit" type="submit" value="Register"/>
            </ol>
          
        </form>
        
<?php else:?>
<?php if (($select == 2) && ($NumberOfRegisteredParticipants > $NumberOfParticipants)): ?>
<?php if(!empty($message1)){echo "<p style='color:#0C3;'>".$message1."</p><br/>";}
		if(!empty($message2)){echo "<p style='color:#0C3;'>".$message2."<br/>";}
		if(!empty($message3)){echo "<p style='color:#0C3;'>".$message3."<br/>";}
		if(!empty($message4)){echo "<p style='color:#F00;'>".$message4."<br/>";}?>
         <div class="line"></div>
<p style="color:#0C3;"><strong>THANK YOU FOR REGISTERING!</strong></p>
<form name="form4" action="#" method="post" id="registerform">


</form>
<?php endif; endif; endif; endif; ?>


