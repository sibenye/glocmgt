<?php

	include ('db_txns_utilities.inc.php');
	include('helper_fns.php');
	include 'admin_table.class.php';
	
	$postedValues = array(Username, Password);
	$validate = fieldValidator($postedValues);
	if ($validate != "valid")
	{
		$bull = "PLEASE FILL IN THE REQUIRED FEILDS";
		header ("location: gcm_admin.php?bull=$bull");
		exit;
		
	}
	if ($validate == "valid")
	{
	
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		
		$admin_table = new admin_table;
		$authenticate = $admin_table->authenticateUser($Username, $Password);
		
		if (!$authenticate)
		{
			$bull = "INCORRECT USERNAME OR PASSWORD";
			header ("location: gcm_admin.php?bull=$bull");
			exit;			
		}
		else
		{
			session_start();
			foreach ($authenticate as $adm)
			{
				$_SESSION['user_id'] = $adm['AdminID'];
				$_SESSION['priviledge'] = $adm['Priviledge'];
						
				$_SESSION['welcome'] = "Welcome ".$adm['AdminName'];
			}
			header ("location: admin_dashboard.php");
			exit;
			
		}
	}

?>