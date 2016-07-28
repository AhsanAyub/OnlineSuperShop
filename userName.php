<?php

	include_once('DataLayer/userData.php');
	
	$userName = $_REQUEST['userName'];
	$userData = new userData();
	
	$result = $userData->checkUserName($userName);
	/*if(!$result)
		echo "Warning - Change User Name";*/
		
	if($result[1])
		echo "Existing User Name";
?>