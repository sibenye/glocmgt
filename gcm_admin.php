<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>GCM</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>

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
       <?php include ('menu.php'); ?>
    </div>
    <div class="clr"></div>
  </div>
  <div class="admin_body">
  <div class="loginbox">
   <h3>Admin LogIn</h3>
   <?php $bull = $_REQUEST['bull']; $username = $_REQUEST['username']; $password = $_REQUEST['password'];
   if (isset($bull)) { echo "<p class='red'>".$bull."</p>"; } ?>
   <form id="adminform" action="authenticate.php" method="post">
    
  <ol>
  <li>
  <label>Username: </label>
  <input class="text" name="Username" />
  </li>
  <li>
  <label>Password: </label>  
  <input class="text" type="password" name="Password"/>
  </li>
  <li>
  <input type="submit" value="Login"/>
  </li>
  </ol>
  </form>
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