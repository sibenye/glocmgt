<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('initialize.php'); ?>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>
<!--<script type="text/javascript" src="js/eventDescription.js"></script>-->
</head>
<body>
<div class="main">
  <div class="blok_header2">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="315" height="137" border="0" alt="logo" /></a></div>
      <div class="h2_header2">
        <h2>Upcoming <span>Events</span></h2>
        <!--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolorem.</p>-->
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="menu_resize">
    <div class="menu">
       <?php include ('menu.php'); ?>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body_resize2">
    <div class="body">
      <div class="body_big">
        <h2>Management Training and Leadership Seminars</h2>
        <p><span>Click 'expand' to view details of each program</span></p>
        <?php foreach ($events as $event): ?>
        <div class="line"></div>
        <a href="show_event.php?view=show_event&EventID=<?php echo $event['EventID']; ?>">
		<img id='link1' src='images/expand.jpg' height='28' width='100'/></a>
         <h4><?php echo $event['EventName']; ?></h4>
         <?php $datesandvenues = $event_date_table->showVenueAndDate($event['EventID']);
				
		 echo $datesandvenues;?>
        <div class="clr"></div>
		<?php  endforeach; ?>
		 
        
        
        
        
      </div>
      <div class="body_small">
        <?php include ('sidebar2.php');?>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
   <?php include ('footer.php');?>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>