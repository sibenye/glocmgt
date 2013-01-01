<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('initialize.php'); ?>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
// <![CDATA[
jQuery(document).ready(function(){
	$('#contactform').submit(function(){				  
		var action = $(this).attr('action');
		$.post(action, { 
			name: $('#name').val(),
			email: $('#email').val(),
			company: $('#company').val(),
			subject: $('#subject').val(),
			message: $('#message').val()
		},
			function(data){
				$('#contactform #submit').attr('disabled','');
				$('.response').remove();
				$('#contactform').before('<p class="response">'+data+'</p>');
				$('.response').slideDown();
				if(data=='Message sent!') $('#contactform').slideUp();
			}
		); 
		return false;
	});
});
// ]]>
</script>
</head>
<body>
<div class="main">
  <div class="blok_header2">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="315" height="137" border="0" alt="logo" /></a></div>
      <div class="h2_header2">
        <h2>Contact <span>us</span></h2>
        
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
        <h2>Contact Form</h2>
        <div class="line"></div>
        <p>We have offices in USA, UK, Dubai and Nigeria. Your are absolutely free to come into any of our locations listed on the side bar or call us to make an appointment. You can send us an instant message by filling the form below. </p>
        <div class="line"></div>
        <form action="contact.php" method="post" id="contactform">
          <ol>
            <li>
              <label for="name">First Name <span class="red">*</span></label>
              <input id="name" name="name" class="text" />
            </li>
            <li>
              <label for="email">Your email <span class="red">*</span></label>
              <input id="email" name="email" class="text" />
            </li>
            <li>
              <label for="company">Company</label>
              <input id="company" name="company" class="text" />
            </li>
            <li>
              <label for="subject">Subject</label>
              <input id="subject" name="subject" class="text" />
            </li>
            <li>
              <label for="message">Message <span class="red">*</span></label>
              <textarea id="message" name="message" rows="6" cols="50"></textarea>
            </li>
            <li class="buttons">
              <input type="image" name="imageField" id="imageField" src="images/send.gif" />
            </li>
          </ol>
        </form>
        <div class="clr"></div>
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