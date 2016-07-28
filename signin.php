<?php

	include_once('Entities/user.php');
	include_once('DataLayer/userData.php');
	
	$userName = $_REQUEST['UserName'];
	$userPassword = $_REQUEST['Password'];
	$userID = $_REQUEST['userID'];
	
	$user = new userEntity();
	$user->setUserUserName($userName);
	$user->setUserEmail($userName);
	$user->setUserPassword($userPassword);
	
	$userData = new userData();
	
	if(!$userID)
		echo $userData->checkCredential($user, 0);
	else
	{
		$user->setUserID($userID);
		//echo $user->getUserID();
		echo $userData->checkCredential($user, 1);
	}
?>