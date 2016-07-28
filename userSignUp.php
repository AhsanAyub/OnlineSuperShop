<?php

	include_once('Entities/user.php');
	include_once('DataLayer/userData.php');
	
	$user = new userEntity();
	$userData = new userData();
	
	$user->setUserUserName($_REQUEST['userName']);
	$user->setUserPassword($_REQUEST['password']);
	$user->setUserName($_REQUEST['name']);
	$user->setUserType($_REQUEST['usertype']);
	$user->setUserContact($_REQUEST['contact']);
	$user->setUserEmail($_REQUEST['email']);
	$user->setUserAddress($_REQUEST['address']);
	$user->setUserJoiningDate(date("Y-m-d"));
	$user->setUserID(date("Y-m-d h:i:s"));
	
	$userData->insertUser($user);
	header('Location: ../OnlineShop');
	
?>