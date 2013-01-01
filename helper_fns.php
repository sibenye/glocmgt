<?php
/**
*this function strips the tags then converts to htmlentities
*/
function safe_output($string) {
	
	if (empty($string)) { return ''; }
	
	return htmlentities(strip_tags($string));
	
}

/**
*this function converts to htmlentities without stripping the tags
*/
function safe_output2($string) {
	
	if (empty($string)) { return ''; }
	
	return htmlentities($string);
	
}

/**This function extracts the extension of the file. 
*It is used to determine if the file has the expected file extension.
 */
 function getExtension($str) {
         $i = strrpos($str,"."); //find the last occurence of "." in the string(filename)
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l); //extract the extension
         return $ext;
 }


function regexp_replace($string) {
	if (empty($string)) { return '';}
// Convert Windows (\r\n) to Unix (\n)
$string = ereg_replace("\r\n", "\n", $string);
// Convert Macintosh (\r) to Unix (\n)
$string = ereg_replace("\r", "\n", $string);
// Handle paragraphs
$string = ereg_replace("\n\n", '</p><p>', $string);
// Handle line breaks
$string = ereg_replace("\n", '<br />', $string);

	return $string;
}

/** This takes the date in the which the Ad was posted finds how long ago from today.
 *it outputs it in secs, mins, or days as the case may be.
 *But once the date posted is more than 7 days it will just output the date posted.
 */
function timepassed($date1, $date2) {
	$created=strtotime($date1);
	$tp = time() - $created;
	
	if ($tp < 60): $tpd= $tp.' secs ago'; return $tpd; endif;
	
	if ($tp >= 60 && $tp < 120): $tpd = '1 min ago'; return $tpd; endif;
	
	if ($tp >= 120 && $tp <= 3600): $tp = $tp/60; $tp = round($tp, 0);    $tpd = $tp.' mins ago'; return $tpd; endif;
	
	if ($tp > 3600 && $tp < 7200): $tpd = '1 hr ago'; return $tpd; endif;
	
	if ($tp >= 7200 && $tp <= 86400): $tp = $tp/3600; $tp = round($tp, 0); $tpd = $tp.' hrs ago'; return $tpd; endif;
	
	if ($tp > 86400 && $tp < 172800): $tpd = '1 day ago'; return $tpd; endif;
	
	if ($tp >=172800 && $tp <=604800): $tp = $tp/86400; $tp = round($tp, 0); $tpd = $tp.' days ago'; return $tpd; endif;
	
	if ($tp > 604800): $tpd = $date2; return $tpd; endif;
}

/** This function takes an image that is above a certain dimension and
*scales it down below or within a particular size still maintaining the aspect ratio
*In this function the height and widht are hard coded
*/
function check_imagesize($imagefilename) {
	list($width, $height) = getimagesize($imagefilename);
	if ($width == 0 || $height == 0): $imagesize['error']=1;  else:
	
	$ratio = $width/$height;
	
	if ($width > 350 && $height > 260):  $imagesize['width']=350; $imagesize['height']= 260; else:
	if ($width > 350 && height < 260):  $height = 350/$ratio;  $imagesize['width']=350; $imagesize['height']= round($height, 0); else:
	if ($width < 350 && height > 260): $width = 260 * $ratio; $imagesize['width']= round($width, 0); $imagesize['height']= 260; else:
	if ($width <= 350 && height <= 260): $imagesize['width'] = $width; $imagesize['height'] = $height; endif; endif; endif; endif;
	
	endif;
		return $imagesize;
}

/** This function takes an image that is above a certain dimension and
*scales it down to a size below or within the bounds specified by the user while still maintaining the aspect ratio
*The reference height and width are passed as arguments.
*/
function adapt_imagesize($imagefilename, $refwidth, $refheight) {
	list($width, $height) = getimagesize($imagefilename);
	if ($width == 0 || $height == 0): $imagesize['error']=1;  else:
	
	$ratio = $width/$height;
	
	if ($width > $refwidth && $height > $refheight):  
		$imagesize['width']=$refwidth; $imagesize['height']= $refheight; else:
	if ($width > $refwidth && height < $refheight):  
		$height = $refwidth/$ratio;  $imagesize['width']=$refwidth; $imagesize['height']= round($height, 0); else:
	if ($width < $refwidth && height > $refheight): 
		$width = $refheight * $ratio; $imagesize['width']= round($width, 0); $imagesize['height']= $refheight; else:
	if ($width <= $refwidth && height <= $refheight): $imagesize['width'] = $width; $imagesize['height'] = $height; endif; endif; endif; endif;
	
	endif;
		return $imagesize;
}

/**
*A function that generates random alphanumeric
*/
function randgen() {
	$num = rand(20000, 99999);
	
	$lm = rand(0, 25);
	
	$letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	$checksum1 = $num.$letters[$lm];
return $checksum1;

}

/**
*A function that generates a more complex random alphanumeric
*/
function complexrandgen() {
	$num1 = rand(20000, 99999);
	$num2 = rand(30000, 79999);
	
	$lm = rand(0, 25);
	$ln = rand(0, 25);
	
	$letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$place = array('AA','BB','CC','DD','EE','FF','GG','HH','II','JJ','KK','LL','MM','NN','OO','PP','QQ','RR','SS','TT','UU','VV','WW','XX','YY','ZZ');
	
	$checksum1 = $num1.$num2.$place[$ln].$letters[$lm];
return $checksum1;

}

/**This function calculates when the Ad will expire and shows it in date format. 
*it uses the date it was created and adds 90 days.
*If the date of expiration is tomorrow or today it will show 'tomorrow' and 'Today' respectively
*/
  
function exdate($date) {
	$nowdate = strtotime(date("M j, Y")); //convert today's date to seconds
	$cdate = strtotime($date); //convert the date of creation to seconds
	$dateint = 90 * 60 * 60 * 24; //number of seconds in 90days
	$edate = $cdate + $dateint;
		
	$diff = $edate - $nowdate; //how long from today
	
	if ($diff > 172800): $edate = date("M j, Y", $edate); $exdate = 'This Ad expires on '.$edate; return $exdate;
	
	else:
	if (172800 > $diff && $diff > 86400): $edate = 'Tomorrow'; $exdate = 'This Ad expires '.$edate; return $exdate;
	
	else:
	if (86400 >= $diff && $diff > 0): $edate = 'Today'; $exdate = 'This Ad expires '.$edate; return $exdate;
	
	else:
	if (0 >= $diff): $exdate = 'This Ad has expired '; return $exdate;
		
	endif; endif; endif; endif;
}

/**
*This function takes an array of the required fields in a form
*and validates it. If any of the fields are empty it will echo
*"PLEASE FILL IN THE REQUIRED FEILDS"
*It also validates an email addreess (if present in the array) to make sure it
* is the correct format.
*/
function fieldValidator($values)
{
	if(empty($values)) exit; // if there is no array provided it exits
	
	foreach($values as $key => $value)
	{
		if( empty($_POST[$value]) ) 
		{ 
			return "PLEASE FILL IN REQUIRED FIELDS"; 
			
		}
		if(preg_match("/email/i",$value))//checks to see if it is an email field
		{
			if(!preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i',$_POST[$value]))
			{
				return "INVALID EMAIL ADDRESS"; 
				
			}
		}
	}
	return "valid";
}

/**This functions takes an image file or any kind of file uploaded from a form and
*stores it in a filesystem, then returns the pathname of the file.
*This pathname can then be stored in a database as a reference to the image or file.
*@param $uploadedfilename is the original name of the file from the client's machine that was uploaded
*@param $maxsize is the maximum size you set for the size of the image being upload, the should be in bytes
*@param $pathname is the path where you want the image to be saved or uploaded to.
*Example: assuming your URL is where you want to store is www.autodealers.com/images/, then the path will be "images/"
*@param $temppath is the temporary location of the file in the server.
*@param ext is the extension ure are expecting. You can check upto four extensions, or at least one, meaning that
*$ext2, $ext3 and $ext4 can be null
*Remember to use $_FILES[][] global variable to get the $temppath and $uploadedfilename.
*Example: 
*$temppath = $_FILES[image1]['tmp_name']; where image1 is the attribute name in the form you used to upload the image
*$uploadedfilename = $_FILES[$image1]['name'];
*/

function imageUpload($uploadedfilename, $maxsize, $temppath, $pathname, $ext1, $ext2, $ext3, $ext4)
{
	if (empty($uploadedfilename) || empty($maxsize) || empty($temppath) || empty($pathname) || empty($ext1))
	{ return; }
	
	$message = array('newname', 'error1', 'error2', 'error3');
	$message['error1'] = 0;//initialize the errors to zero
	$message['error2'] = 0;
	$message['error3'] = 0;
	$filename = stripslashes($uploadedfilename); // the uploadedfilename of any slashes
	$extension = getExtension($filename); //extract the extension of the file using the getExtension funct defined above in this script
 	$extension = strtolower($extension); //change the extension to lower case
	
	if (($extension != $ext1) && ($extension != $ext2) && ($extension != $ext3) && ($extension != $ext4)):
		$message['error1'] = "INVALID FILE EXTENSION";
		return $message;
	else:
	$filesize = filesize($temppath);
	if ($filesize > $maxsize): 
		$message['error2'] = "FILE SIZE ABOVE LIMIT"; 
		return $message;
	else:
	$new_name= $pathname.date('j, M Y')."_".$filename; //give it a unique name
	$copied = move_uploaded_file($temppath, $new_name);
									
	if (!$copied): $message['error3'] = "UNSUCCESSFUL UPLOAD"; return $message;
	else:
	$message['newname'] = $new_name;
	return $message;
	endif;
	endif;
	endif;									
										
}
?>
