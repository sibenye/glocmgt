<?php include ('initialize.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript" src="js/flashloop.js"></script>
<script src="js/AC_RunActiveContent.js" language="javascript"></script>

<!--<script type="text/javascript" src="js/flash.js"></script>-->
<script type="text/javascript" charset="utf-8">
// <![CDATA[
$(document).ready(function(){	
	$("#slider").easySlider({
		controlsBefore:	'<p id="controls">',
		controlsAfter:	'</p>',
		auto: true, 
		continuous: true
	});	
});
// ]]>
</script>

<style type="text/css">
.gallery { float:right; width:406px; height:253px; margin:80px 22px 0 0 !important; margin:80px 11px 0 0; }
#slider { margin:0; padding:0; list-style:none; }
#slider ul,
#slider li { margin:0; padding:0; list-style:none; }
/* 
    define width and height of list item (slide)
    entire slider area will adjust according to the parameters provided here
*/
#slider li { width:406px; height:253px; overflow:hidden; }
p#controls { margin:0; position:relative; }
#prevBtn { display:block; margin:0; overflow:hidden; width:30px; height:30px; position:absolute; left:-32px; top:-125px; }
#nextBtn { display:block; margin:0; overflow:hidden; width:30px; height:30px; position:absolute; left: 408px; top:-125px; }
#prevBtn a { display:block; width:30px; height:30px; background:url(images/l_arrow.gif) no-repeat 0 0; }
#nextBtn a { display:block; width:30px; height:30px; background:url(images/r_arrow.gif) no-repeat 0 0; }
</style>
</head>
<body>
<div class="main">
  <div class="blok_header">
    <div class="header">
      <div class="gallery">
        <div id="slider">
          <ul>
            <li><img src="images/display1.jpg" alt="picture" width="406" height="253" /></li>
            <li><img src="images/display2.jpg" alt="picture" width="406" height="253" /></li>
            <li><img src="images/display3.jpg" alt="picture" width="406" height="253" /></li>
          </ul>
        </div>
      </div>
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="315" height="137" border="0" alt="logo" /></a></div>
      <div class="h2_header">
        <h2><span>Creative Solutions<br />
          to improve your</span><br />
          business!</h2>
        <p>"...making your concepts a reality"</p>
        
       <script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '349',
			'height', '35',
			'src', 'featured_flash',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'featured_flash',
			'bgcolor', '#3c0e00',
			'name', 'featured_flash',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', 'featured_flash',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="349" height="35" id="featured_flash" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="featured_flash.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#3c0e00" />	<embed src="featured_flash.swf" quality="high" bgcolor="#3c0e00" width="349" height="35" name="featured_flash" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
	
        </div><!--h2_header-->
      <div class="clr"></div>
    <span class="flash">
    <?php foreach ($features as $feature){ 
	echo "<a href='event_registration.php?view=event_registration&select=1&EventID=".$feature['EventID']."'>"
	.$feature['EventName']."</a>"; } ?>
        </span>
    </div><!--header-->
   
  </div><!--blok-header-->
   
  <div class="menu_resize">
    <div class="menu">
      <?php include ('menu.php'); ?>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body_resize">
    <div class="body">
      <div class="bloga">
        <h3><a href="upcoming_events.php?view=upcoming_events">Upcoming Events/Seminars</a></h3>
        
        <p>
          Check out a comprehensive list of our upcoming events, training, and seminars. You can also download the program calendar... </p>
        <p><a href="upcoming_events.php?view=upcoming_events"><img src="images/read_more.gif" alt="picture" width="76" height="22" border="0" /></a></p>
      </div>
      <div class="bloga">
        <h3><a href="event_registration.php?view=event_registration">Register for an Event</a></h3>
      
        <p>
          We are organizing various events, seminars and training this year. You can register as an individual or as a corporate body...</p>
        <p><a href="event_registration.php?view=event_registration"><img src="images/read_more.gif" alt="picture" width="76" height="22" border="0" /></a></p>
      </div>
      <div class="bloga">
        <h3><a href="lease_admin.php?view=lease">Lease Administration</a></h3>
        
        <p>Get professional advice today by letting us do a detailed review on your lease... </p><br/>
        <p><a href="lease_admin.php?view=lease"><img src="images/read_more.gif" alt="picture" width="76" height="22" border="0" /></a></p>
      </div>
      <div class="clr"></div>
      <div class="body_big">
        <h2>Welcome!<span></span></h2>
        <div class="line"></div>
        <p>GCM specializes in the development, integration, and operation of program management and engineering services. We offer substantial performance improvements via our integrated approach.</p>
        <p>If you want to build a culture where employees are passionate about their work you need the right tools, Global Concepts Management can help.</p>
        <p>GCM brings together experiences in different fields and projects with professionalism and expertise.<br />
        </p>
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