<?php
$pic1 = $_FILES['pic1']['name'];
$pic1_line = $_POST['pic1_line'];
$pic2 = $_FILES['pic2']['name'];
$pic2_line = $_POST['pic2_line'];
$pic3 = $_FILES['pic3']['name'];
$pic3_line = $_POST['pic3_line'];
$pic4 = $_FILES['pic4']['name'];
$pic4_line = $_POST['pic4_line'];

if (empty($pic1) && empty($pic1_line) && empty($pic2) && empty($pic2_line) && empty($pic3) && empty($pic3_line) && empty($pic4) && empty($pic4_line)) 
{ $_SESSION['err_message1'] = "PLEASE SELECT A PICTURE TO UPLOAD"; header ("location: admin_dashboard.php?select=5"); exit; }

if ((!empty($pic1) && empty($pic1_line)) || (!empty($pic2) && empty($pic2_line)) || (!empty($pic3) && empty($pic3_line)) || (!empty($pic4) && empty($pic4_line)))
{ $_SESSION['err_message1'] = "PLEASE PUT A DESCRIPTION FOR THE PICTURE SELECTED"; header ("location: admin_dashboard.php?select=5"); exit; }

if ((empty($pic1) && !empty($pic1_line)) || (empty($pic2) && !empty($pic2_line)) || (empty($pic3) && !empty($pic3_line)) || (empty($pic4) && !empty($pic4_line)))
{ $_SESSION['err_message1'] = "PLEASE SELECT A PICTURE TO UPLOAD"; header ("location: admin_dashboard.php?select=5"); exit;}

if (!empty($pic1) && !empty($pic1_line))
{ 
	$uploadedfilename = $pic1;
	$maxsize = '1000000';
	$temppath = $_FILES[pic1]['tmp_name'];
	$pathname = "images/events/";
	$ext1 = "jpeg";
	$ext2 = "jpg";
	$ext3 = "png";
	$ext4 = "gif";
		
	$pic1message = imageUpload($uploadedfilename, $maxsize, $temppath, $pathname, $ext1, $ext2, $ext3, $ext4);
	
	if (!empty($pic1message['newname']))
	{
		$gallery_table = new gallery_table;
		$inserted = $gallery_table->insertPicturePath($pic1message['newname'], $pic1_line);
		if ($inserted)
		{
			$_SESSION['good_message1'] = "Picture 1: Upload Successfull";	
		}
		else
		{
			$_SESSION['err_message1'] = "Picture 1: Was NOT Uploaded";	
		}
		
	}
	else
	{
		if (!empty($pic1message['error1'])) { $_SESSION['err_message1'] = "Picture 1: ".$pic1message['error1'];}
		if (!empty($pic1message['error2'])) { $_SESSION['err_message1'] =  "Picture 1: ".$pic1message['error2'];}
		if (!empty($pic1message['error3'])) { $_SESSION['err_message1'] =	"Picture 1: ".$pic1message['error3'];}
	}
	
	
}

if (!empty($pic2) && !empty($pic2_line))
{ 
	$uploadedfilename = $pic2;
	$maxsize = '1000000';
	$temppath = $_FILES[pic2]['tmp_name'];
	$pathname = "images/events/";
	$ext1 = "jpeg";
	$ext2 = "jpg";
	$ext3 = "png";
	$ext4 = "gif";
		
	$pic2message = imageUpload($uploadedfilename, $maxsize, $temppath, $pathname, $ext1, $ext2, $ext3, $ext4);
	
	if (!empty($pic2message['newname']))
	{
		$gallery_table = new gallery_table;
		$inserted = $gallery_table->insertPicturePath($pic2message['newname'], $pic2_line);
		if ($inserted)
		{
			$_SESSION['good_message2'] = "Picture 2: Upload Successfull";	
		}
		else
		{
			$_SESSION['err_message2'] = "Picture 2: Was NOT Uploaded";	
		}
		
	}
	else
	{
		if (!empty($pic2message['error1'])) { $_SESSION['err_message2'] = "Picture 2: ".$pic2message['error1'];}
		if (!empty($pic2message['error2'])) { $_SESSION['err_message2'] =  "Picture 2: ".$pic2message['error2'];}
		if (!empty($pic2message['error3'])) { $_SESSION['err_message2'] =	"Picture 2: ".$pic2message['error3'];}
	}
	
}

if (!empty($pic3) && !empty($pic3_line))
{ 
	$uploadedfilename = $pic3;
	$maxsize = '1000000';
	$temppath = $_FILES[pic3]['tmp_name'];
	$pathname = "images/events/";
	$ext1 = "jpeg";
	$ext2 = "jpg";
	$ext3 = "png";
	$ext4 = "gif";
		
	$pic3message = imageUpload($uploadedfilename, $maxsize, $temppath, $pathname, $ext1, $ext2, $ext3, $ext4);
	
	if (!empty($pic3message['newname']))
	{
		$gallery_table = new gallery_table;
		$inserted = $gallery_table->insertPicturePath($pic3message['newname'], $pic3_line);
		if ($inserted)
		{
			$_SESSION['good_message3'] = "Picture 3: Upload Successfull";	
		}
		else
		{
			$_SESSION['err_message3'] = "Picture 3: Was NOT Uploaded";	
		}
		
	}
	else
	{
		if (!empty($pic3message['error1'])) { $_SESSION['err_message3'] = "Picture 3: ".$pic3message['error1'];}
		if (!empty($pic3message['error2'])) { $_SESSION['err_message3'] =  "Picture 3: ".$pic3message['error2'];}
		if (!empty($pic3message['error3'])) { $_SESSION['err_message3'] =	"Picture 3: ".$pic3message['error3'];}
	}
	
}

if (!empty($pic4) && !empty($pic4_line))
{ 
	$uploadedfilename = $pic4;
	$maxsize = '1000000';
	$temppath = $_FILES[pic4]['tmp_name'];
	$pathname = "images/events/";
	$ext1 = "jpeg";
	$ext2 = "jpg";
	$ext3 = "png";
	$ext4 = "gif";
		
	$pic4message = imageUpload($uploadedfilename, $maxsize, $temppath, $pathname, $ext1, $ext2, $ext3, $ext4);
	
	if (!empty($pic4message['newname']))
	{
		$gallery_table = new gallery_table;
		$inserted = $gallery_table->insertPicturePath($pic4message['newname'], $pic4_line);
		if ($inserted)
		{
			$_SESSION['good_message4'] = "Picture 4: Upload Successfull";	
		}
		else
		{
			$_SESSION['err_message4'] = "Picture 4: Was NOT Uploaded";	
		}
		
	}
	else
	{
		if (!empty($pic4message['error1'])) { $_SESSION['err_message4'] = "Picture 4: ".$pic4message['error1'];}
		if (!empty($pic4message['error2'])) { $_SESSION['err_message4'] =  "Picture 4: ".$pic4message['error2'];}
		if (!empty($pic4message['error3'])) { $_SESSION['err_message4'] =	"Picture 4: ".$pic4message['error3'];}
	}
	
}
?>