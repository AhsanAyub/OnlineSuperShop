<?php
	
	class adminEntity
	{
		//private var $adminUserName = '';
		private $adminUserName = '';
		private $adminEmail = '';
		private $adminPassword = '';
		public $userType = 'admin';
		private $adminName = '';
		private $adminAddress = '';
		private $adminContact = '';
		private $adminJoiningDate = '';
		
		function setAdminUserName($adminUserName)
		{
			$this->adminUserName = $adminUserName;
		}
		function getAdminUserName()
		{
			return $adminUserName;
		}
		function setAdminEmail($adminEmail)
		{
			$this->adminEmail = $adminEmail;
		}
		function getAdminEmail()
		{
			return $adminEmail;
		}
		
		function setAdminPassword($adminPassword)
		{
			$this->adminPassword = $adminPassword;
		}
		function getAdminPassword()
		{
			return $adminPassword;
		}
		
		function setAdminName($adminName)
		{
			$this->adminName = $adminName;
		}
		function getAdminName()
		{
			return $adminName;
		}
		
		function setAdminAddress($adminAddress)
		{
			$this->adminAddress = $adminAddress;
		}
		function getAdminAddress()
		{
			return $adminAddress;
		}
		
		function setAdminContact($adminContact)
		{
			$this->adminContact = $adminContact;
		}
		function getAdminContact()
		{
			return $adminContact;
		}
		
		function setAdminJoiningDate($adminJoiningDate)
		{
			$this->adminJoiningDate = $adminJoiningDate;
		}
		function getAdminJoiningDate()
		{
			return $adminJoiningDate;
		}
		
		function getUserType()
		{
			return $userType;
		}
	}

?>