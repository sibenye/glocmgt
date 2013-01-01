<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include ('initialize.php'); ?>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/slogo.png" sizes="32x32"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/pagination.js"></script>
</head>
<body>
<div class="main">
  <div class="blok_header2">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="315" height="137" border="0" alt="logo" /></a></div>
      <div class="h2_header2">
        <h2>Event <span>Gallery</span></h2>
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
      <div class="clr"></div>
      <div class="body_big">
        <h2>Gallery</h2>
        <div class="line"></div>
        <!-- the input fields that hold the variables used for pagination -->  
		<input type='hidden' id='current_page' />  
		<input type='hidden' id='show_per_page' />  
        
        <?php $cot = 0; ?>
        <div>
    <table><tbody id="content"><tr>
    <?php foreach($pictures as $picture): ?>
    <td>
    <img src="<?php echo $picture['GalleryPicPath']; ?>" width="270" height="200"/><br/>
    <span><?php echo $picture['GalleryDescription'];?></span>
    </td>
    <?php $cot++; 
	if ($cot == 2): $cot = 0;?>
    </tr><tr>
    <?php endif; 
	endforeach; ?>
    </tr></tbody></table></div>
       
        <div class="clr"></div>
        <div class="line"></div>
        <div id="page_navigation"></div>
        <!--<div class="buttoms"><a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a></div>-->
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