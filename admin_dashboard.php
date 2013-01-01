<?php include 'admin_initial.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>GCM</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/dropdowndisplay.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->


<script>
	$(function() {
		$( "#Sdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#Edate" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
	</script>
<script>
$(function() {
	$("#welcome").show();	
	$("#event").hide();
	$("#schedule").hide();
	$("#pics").hide();
	$("#registrants").hide();
	$("#settings").hide();
	$("#add_admin").hide();
	$("#delete_admin").hide();
	$("#change_pwd").hide();
	$("#view_registtrants").hide();
	$("#featured_event").hide();
	$("#view_events").hide();
	$("#edit_event").hide();
	$("#insert_event").hide();
	$("#insert_event_schedule").hide();
	$("#delete_event").hide();
	$("#delete_event_schedule").hide();
	$("#Add_pics").hide();
	$("#Delete_pics").hide();
	$("#view_registrants").hide();
	$("#view_events").hide();
	
 });
</script>
</head>
<body>
<div class="main">
  <div class="blok_header2">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="315" height="137" border="0" alt="logo" /></a></div>
      <div class="h2_header2">
        <h2>Admin <span>Dashboard</span></h2>
        <!--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolorem.</p>-->
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="menu_resize">
    <div class="menu">
       <ul>
       <li><a><span><?php echo $Welcome; ?></span></a></li>
       <?php if ($select == 'queri'):?>
      <li><a href="admin_dashboard.php"><span>Back To Dashboard</span></a></li>
      <?php endif;?>
       <li><a href="gcm_admin.php"><span>LOG OFF</span></a></li>
       </ul>
    </div>
    <div class="clr"></div>
  </div>
  <div class="admin_body">
<?php if ($select == 'queri'):?>
<div class="adminbox2">
<?php include 'query_view.php';?>
</div>
<?php else:?>
  	<div class="adminbox">
  		<div class="admin_menu">
        <ul>
        
        <li><span id="link8"><a  href="#">Event</a></span></li>
        <li><span id="link9"><a  href="#">Schedule</a></span></li>
		<li><span id="link10"><a  href="#">Pics</a></span></li>
        <li><span id="link7"><a  href="#">Registrants</a></span></li>
         <li><span id="link14"><a  href="#">Settings</a></span></li>
		
      </ul>
        </div>
         <div class="clr"></div>
         
    <div id="welcome">
    <?php if (!empty($GoodMessage1)):?> 
		<p class="green"><?php 	echo $GoodMessage1;?></p>
    <?php endif;?>
    <?php if (!empty($GoodMessage2)):?>
			<p class="green"><?php 	echo $GoodMessage2;?></p>
    <?php endif;?>
    <?php if (!empty($GoodMessage3)):?>
			<p class="green"><?php 	echo $GoodMessage3;?></p>
    <?php endif;?>
    <?php if (!empty($GoodMessage4)):?>
			<p class="green"><?php 	echo $GoodMessage4;?></p>
	 <?php endif;?>
     
     <?php if (!empty($ErrMessage1)):?> 
	 		<p class="red"><?php echo $ErrMessage1;?></p>
     <?php else:?>
     <?php if (!empty($ErrMessage2)):?> 
			<p class="red"><?php echo $ErrMessage2;?></p>
     <?php else:?>
     <?php if (!empty($ErrMessage3)):?> 
			 <p class="red"><?php echo $ErrMessage3;?></p>
     <?php else:?>
     <?php if (!empty($ErrMessage4)):?> 
			<p class="red"><?php echo $ErrMessage4;?></p>
    <?php else:?>
    <h4>Welcome to the Admin Page</h4>
    <p> You can add and delete events and pictures</p>
    <?php endif;?><?php endif;?><?php endif;?><?php endif;?>
    </div>
 
 <div id="event">
 <li><a id="link1" href="#">Add Event</a></li>
 <li><a id="link3" href="#">Delete Event</a></li>
 <li><a id="link11" href="#">Edit Event</a></li>
 <li><a id="link13" href="#">View Events</a></li>
 <li><a id="link18" href="#">Featured Event</a></li>
 </div>
 <div id="schedule">
 <li><a id="link2" href="#">Add Schedule</a></li>
 <li><a id="link4" href="#">Delete Schedule</a></li>
 </div>
 <div id="pics">
 <li><a id="link5" href="#">Add Pics</a></li>
 <li><a id="link6" href="#">Delete Pics</a></li>
 </div> 
  <div id="registrants">
   <li><a id="link12" href="#">View Registrants</a></li>
   </div>
   <div id="settings">
   <?php if($priviledge == "High"): ?>
 <li><a id="link15" href="#">Add Admin</a></li>
 <li><a id="link16" href="#">Remove Admin</a></li>
 <?php endif; ?>
 <li><a id="link17" href="#">Change Password</a></li>
 </div>
 
 <div id="edit_event">
 <h4> Edit any row of event then click update button</h4>
  <table>
   <tr>
   <td>
   
   <table id="admintable">
   <tr>
   <th>Event Name</th>
   <th>Event Description</th>
   <th>Click</th>
   </tr>
 	<?php foreach($events as $event): ?>
    <form id="adminform" method="post" action="admin_update.php?select=11">
   <tr>
	<input type="hidden" value="<?php echo $event['EventID']; ?>" name="EventID">
	<td><input size="45" maxlength="120" style="border:none; margin:0; padding:1px;" name="EventName" class="fortable" value="<?php echo $event['EventName'];?>"/></td>
   	<td><textarea rows="2" cols="45" style="border:none; margin:0; padding:1px;" name="EventDescription" class="fortable" wrap="hard"><?php echo $event['EventDescription'];?></textarea></td>
    <td><input type="image" src="images/globe.jpg"/></td>
     </tr>
      </form>
        <?php endforeach; ?>	
	</table>
   
    </td></tr></table>

 </div>

 <div id="insert_event">     
   <h4>Event Details:</h4>
   <form id="adminform" action="admin_insert.php?select=1" method="post">
  <ol>
  <li>
  <label>Event Name: </label>
  <input class="text2" maxlength="120" name="EventName" value="<?php echo $EventName;?>" />
  </li>
  <li>
  <label>Description: </label>
  <textarea name="EventDescription" wrap="hard"><?php echo $EventDescription; ?></textarea>
  </li>
  <li>
  <input type="submit" value="Add Event"/>
  </li>
  </ol>
  </form>
  </div>


 <div id="insert_event_schedule">
 <h4>Add the Schedule to an event</h4>
 <form id="adminform" action="admin_insert.php?select=2" method="post">
 <ol>
 <li>
 		<select name="EventID" size="1" class="long">
		<?php foreach($events as $event): ?>
		<option value="<?php echo $event['EventID']; ?>" name="EventID">
		<?php echo safe_output($event['EventName']); ?></option>
        <?php endforeach; ?>	
		</select> 
 </li>
 <li>
  <label>State: </label>
  <input class="text" name="EventState" value="<?php echo $EventState; ?>"/>
  </li>
  <li>
  <label>Country: </label>
  <select name="EventCountry"  size="1"  class="short">
        <option></option>
		<?php foreach($show_event_countries as $list_country): ?>
		<option value="<?php echo safe_output($list_country['CountryName']); ?>" 
		<?php if ($list_country['CountryName']==$EventCountry){echo"selected='selected'";}?> name="EventCountry" class="test" >
		<?php echo safe_output($list_country['CountryName']); ?></option>
        <?php endforeach; ?>	
		</select>
  </li>
  <li>
  <label>Select StartDate: </label>
  <input id="Sdate" name="StartDate" type="text" size="25">
  </li>
  <li>
  <label>Select EndDate: </label>
  <input id="Edate" name="EndDate" type="text" size="25">
  </li>
  <li>
  <input type="submit" value="Add Schedule" />
  </li></ol>
 </form>
 
 </div>
 
 
   <div id="delete_event">
   <h4>Select the Event to be deleted</h4>
   <form id="adminform" method="post" action="admin_delete.php?select=3">
   <ol>
	<li>
		<select name="EventID[]" size="1" class="long">
        <option></option>
        <?php foreach($events as $event): ?>
		<option value="<?php echo $event['EventID']; ?>" name="EventID[]">
		<?php echo safe_output($event['EventName']); ?></option>
        <?php endforeach; ?>	
		</select>
   </li>
   <li>
   <input type="submit" value="Delete Event" onclick="return confirm('Are you sure you want to delete?')" />
   </li></ol>   
   </form>
   </div>
 
 	<div id="view_events">
    <table id="admintable">
   <tr>
   <td>
   <table id="admintable">
   <tr>
   <th>Event Name</th>
   <th>From</th>
   <th>To</th>
   <th>Venue</th>
   </tr>
 	<?php foreach($eventSchedules as $eventSchedule): ?>
        <?php if (!empty($eventSchedule['EventName'])): ?>
   <tr>
	<td><?php echo $eventSchedule['EventName'];?></td>
	<td><?php echo date("M j, Y", strtotime($eventSchedule['StartDate']));?></td>
	<td><?php echo date("M j, Y", strtotime($eventSchedule['EndDate'])); ?></td>
    <td><?php echo $eventSchedule['EventState'].", ". $eventSchedule['EventCountry'];?></td>
     </tr>
        <?php endif;?>
        <?php endforeach; ?>	
	</table>
    </td></tr></table>
   </div>
 
   
   <div id="delete_event_schedule">
   <h4>Select the Schedules to be deleted</h4>
   <table id="admintable">
   <tr>
   <td>
   <form id="adminform" method="post" action="admin_delete.php?select=4">
   <table id="admintable">
   <tr>
   <th>#</th>
   <th>Event Name</th>
   <th>From</th>
   <th>To</th>
   </tr>
 	<?php foreach($eventSchedules as $eventSchedule): ?>
        <?php if (!empty($eventSchedule['EventName'])): ?>
   <tr>
	<td><input type="radio" value="<?php echo $eventSchedule['EventDateID']; ?>" name="EventDateID[]"></td>
	<td><?php echo $eventSchedule['EventName'];?></td>
	<td><?php echo date("M j, Y", strtotime($eventSchedule['StartDate']));?></td>
	<td><?php echo date("M j, Y", strtotime($eventSchedule['EndDate'])); ?></input></td>
     </tr>
        <?php endif;?>
        <?php endforeach; ?>	
	<tr>	
    <td>&nbsp;</td>
    <td>
    <input type="submit" value="Delete Schedule" onclick="return confirm('Are you sure you want to delete?')"/>
    </td></tr></table>
    </form>
    </td></tr></table>
    </div> 
 
 	<div id="featured_event">
   <h4>Select the Event to be featured</h4>
   <form id="adminform" method="post" action="admin_update.php?select=13">
   <ol>
   <li>
   <label>Current featured</label><span><?php foreach ($features as $feature) {echo $feature['EventName']; }?></span>
   <input type="hidden" name="EventID1" value="<?php foreach ($features as $feature) {echo $feature['EventID']; }?>" />
   </li>
	<li>
    	<label>Select New Event to be featured: </label>
     	<select name="EventID2" size="1" class="long">
        <option></option>
        <?php foreach($events as $event): ?>
		<option value="<?php echo $event['EventID']; ?>" name="EventID2">
		<?php echo safe_output($event['EventName']); ?></option>
        <?php endforeach; ?>	
		</select>
   </li>
   <li>
   <input type="submit" value="Submit"/>
   </li></ol>   
   </form>
   </div>
 
 <div id="Add_pics">
   <h4>Browse for the pictures you want to add to Gallery</h4>
   <span>jpeg, png, & gif only. Not more than 1MB each</span>
   <form action="admin_insert.php?select=5" method="post" enctype="multipart/form-data" id="adminform">
   <ol>
   <li>
	<label for="pic1">Picture 1: </label>
    <input type="file" name="pic1" size="30" maxlength="120" />
    </li>
    <li>
    <span>What is this picture about: </span>
    <input type="text" size="80" maxlength="100" name="pic1_line" />
    </li>
    <li>
	<label for="pic2">Picture 2: </label>
    <input type="file" name="pic2" size="30" maxlength="120" />
    </li>
    <li>
    <span>What is this picture about: </span>
    <input type="text" size="80" maxlength="100" name="pic2_line" />
    </li>
    <li>
	<label for="pic3">Picture 3: </label>
    <input type="file" name="pic3" size="30" maxlength="120"  />
    </li>
    <li>
    <span>What is this picture about: </span>
    <input type="text" size="80" maxlength="100" name="pic3_line" />
    </li>
    <li>
	<label for="pic4">Picture 4: </label>
    <input type="file" name="pic4" size="30" maxlength="120" />
    </li>
    <li>
    <span>What is this picture about: </span>
    <input type="text" size="80" maxlength="100" name="pic4_line" />
    </li>
   
    <li>
    <input type="submit" value="Add Pictures" />
    </li></ol>
   </form>
   </div>
 
 
   <div id="Delete_pics">
   <h4>Select the Picture to be deleted</h4>
   <table id="admintable">
   <tr>
   <td> <form id="adminform" action="admin_delete.php?select=6" method="post">
   <table id="admintable">
   <tr>
   <th>#</th>
	<th>Picture Description</th>
	<th>Thumbnail</th>
	</tr>
    <?php foreach ($pictures as $picture): ?>
   <tr>
   <td>
   <input type="checkbox" value="<?php echo $picture['GalleryID'];?>" name="GalleryID[]">
   </td>
   <td>
   <?php echo $picture['GalleryDescription']; ?>
   </td>
   <td>
   <img src="<?php echo $picture['GalleryPicPath'];?>" width="30" height="30"/>
   </input>
   </td>
   </tr>
   <?php endforeach;?>
   <tr>
   <td>&nbsp;</td>
   <td>
   <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>
   </td></tr></table>
   </form>
   </td>
   </tr>
   </table>
   </div>
   
   <div id="view_registrants">
   <form action="admin_dashboard.php" method="post">
   <input type="hidden" name="select" value="queri" />
   <input type="hidden" name="queri" value="by_all" />
   <input type="submit" name="viewR" value="View all Registrants" /></form>
   <p>View Registrants by Event</p>
   <form id="adminform" action="admin_dashboard.php" method="post">
   		<select name="REventID" size="1" class="long">
        <?php foreach($events as $event): ?>
		<option value="<?php echo $event['EventID']; ?>">
		<?php echo safe_output($event['EventName']); ?></option>
        <?php endforeach; ?>	
		</select>
        <input type="hidden" name="select" value="queri" />
        <input type="hidden" name="queri" value="by_event" />
        <input type="submit" name="viewR" value="GO" />
   
   </form>
   </div>
   
   <div id="change_pwd">     
   <h4>Update Password</h4>
   <?php $admin_table = new admin_table; ?>
   <?php $admin = $admin_table->getUserDetails($adminID); ?>
   <form id="adminform" action="admin_update.php?select=12" method="post">
  <ol>
  <li>
  <label>Your Username: </label><span><?php foreach($admin as $adm) {echo $adm['Username'];}?></span>
  <input type="hidden" name="Username" value="<?php foreach($admin as $adm) {echo $adm['Username'];}?>"/>
  <input type="hidden" name="AdminID" value="<?php echo $adminID;?>"/>
  </li>
   <li>
  <label>Current Password:</label>
  <input type="password" class="text" maxlength="30" name="currpassword"/>
  </li>
  <li>
  <label>New Password: </label>
   <input type="password" class="text" maxlength="15" name="Password"/>
  </li>
  <li>
  <label>Confirm New Password: </label>
   <input type="password" class="text" maxlength="15" name="ConPassword"/>
  </li>
  <li>
  <input type="submit" value="OK"/>
  </li>
  </ol>
  </form>
  </div>
  
  <?php if($priviledge == "High"): ?>
  <div id="add_admin">     
   <h4>Add a New Administator</h4>
   <form id="adminform" action="admin_insert.php?select=7" method="post">
  <ol>
  <li>
  <label>Full Name: </label>
  <input class="text" maxlength="30" name="AdminName" value="<?php echo $AdminName;?>" />
  </li>
   <li>
  <label>Username: </label>
  <input class="text" maxlength="30" name="Username" value="<?php echo $Username;?>" />
  </li>
  <li>
  <label>Password: </label>
   <input type="password" class="text" maxlength="15" name="Password"/>
  </li>
  <li>
  <label>Confirm Password: </label>
   <input type="password" class="text" maxlength="15" name="ConPassword"/>
  </li>
  <li>
  <input type="hidden" name="CreationDate" value="<?php echo date("Y-m-d");?>"/>
  <input type="submit" value="OK"/>
  </li>
  </ol>
  </form>
  </div>
 
 	<div id="delete_admin">
   <h4>Select the administrator to be deleted</h4>
   <?php $admin_table = new admin_table; ?>
   <form id="adminform" method="post" action="admin_delete.php?select=8">
   <ol>
	<li>
		<select name="AdminID" size="1" class="short">
        <option></option>
        <?php $admin = $admin_table->getAdministrators(); ?>
        <?php foreach($admin as $adm): ?>
        <?php if ($adm['AdminID'] != $adminID): ?>
		<option value="<?php echo $adm['AdminID']; ?>" name="AdminID">
		<?php echo safe_output($adm['AdminName']); ?></option>
        <?php endif;?>
        <?php endforeach; ?>	
		</select>
   </li>
   <li>
   <input type="submit" value="Delete Admin" onclick="return confirm('Are you sure you want to delete?')" />
   </li></ol>   
   </form>
   </div>
   <?php endif; ?>
    
 </div><!--End Admin_box-->
  <?php endif;?>
    <div class="clr"></div>
  </div><!--End Admin_body-->
</div><!--End Main-->
<div class="footer">
  <div class="footer_resize">
   <?php include ('footer.php');?>
    <div class="clr"></div>
  </div>
</div>

</body>
</html>