<?php

	class userEntity
	{
		//private var $userUserName = '';
		private $userUserName = '';
		private $userID = '';
		private $userEmail = '';
		private $userPassword = '';
		private $userStatus = 0;
		public $userType = '';
		private $userName = '';
		private $userAddress = '';
		private $userContact = '';
		private $userJoiningDate = '';
		
		public function setUserUserName($userUserName)
		{
			$this->userUserName = $userUserName;
		}
		public function getUserUserName()
		{
			return $this->userUserName;
		}
		
		public function setUserEmail($userEmail)
		{
			$this->userEmail = $userEmail;
		}
		public function getUserEmail()
		{
			return $this->userEmail;
		}
		
		public function setUserPassword($userPassword)
		{
			$this->userPassword = $userPassword;
		}
		public function getUserPassword()
		{
			return $this->userPassword;
		}
		
		public function setUserStatus()
		{
			$userStatus = 1;
		}
		public function getUserStatus()
		{
			return $this->userStatus;
		}

		public function setUserName($userName)
		{
			$this->userName = $userName;
		}
		public function getUserName()
		{
			return $this->userName;
		}
		
		public function setUserAddress($userAddress)
		{
			$this->userAddress = $userAddress;
		}
		public function getUserAddress()
		{
			return $this->userAddress;
		}
		
		public function setUserContact($userContact)
		{
			$this->userContact = $userContact;
		}
		public function getUserContact()
		{
			return $this->userContact;
		}
		
		public function setUserJoiningDate($userJoiningDate)
		{
			$this->userJoiningDate = $userJoiningDate;
		}
		public function getUserJoiningDate()
		{
			return $this->userJoiningDate;
		}
		
		public function setUserType($userType)
		{
			$this->userType = $userType;
		}
		public function getUserType()
		{
			return $this->userType;
		}
		
		public function setUserID($userID)
		{
			$this->userID = $userID;
		}
		public function getUserID()
		{
			return $this->userID;
		}
	}

?>