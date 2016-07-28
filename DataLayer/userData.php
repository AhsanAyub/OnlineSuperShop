<?php
	
	$root = $_SERVER['DOCUMENT_ROOT'];
	//echo $root;
	$dirDataAccess = $root . "/OnlineShop/Framework/DataAccess.php";
	$dirEntity = $root . "/OnlineShop/Entities/user.php";
	
	include_once($dirDataAccess);
	include_once($dirEntity);
	
	class userData
	{
		function checkCredential(userEntity $user, $flag)
		{
			$userPassword = $user->getUserPassword();
			$userName = $user->getUserUserName();
			$userEmail = $user->getUserEmail();
			
			if(!$flag)
			{
				$sqlQuery =	"SELECT userID, userStatus FROM `credentials` WHERE (((`username` = '$userName')  OR (`email` = '$userName')) AND (`password` = '$userPassword'));";
			
				$da = new DataAccess();
				$result = $da->DataTable($sqlQuery);
				
				if($row = mysql_fetch_array($result))
				{
					if($row[1]) //user status is permitted
						return $row[0];
					else	//not permitted
						return "invalid";
				}
				else
					return "invalid";
			}
			else
			{
				$key = $user->getUserID();
				$sqlQuery = "SELECT a.userType FROM userinfo a, credentials b WHERE ((a.userID = '$key') AND (b.userID = '$key'))";
				
				//return $sqlQuery;
				$da = new DataAccess();
				$result = $da->DataTable($sqlQuery);
				$row = mysql_fetch_array($result);
				return $row[0];
			}
		}
		
		public function insertUser(userEntity $user)
		{
			//insert into userinfo
			$userID = $user->getUserID();
			$userType = $user->getUserType();
			$userName = $user->getUserName();
			$userAddress = $user->getUserAddress();
			$userContact = $user->getUserContact();
			$userJoiningDate = $user->getUserJoiningDate();
			
			$userName = $user->getUserUserName();
			$userEmail = $user->getUserEmail();
			$userPassword = $user->getUserPassword();
			
			$da = new DataAccess();
			
			$sqlQuery = "INSERT INTO `userinfo`(`userID`, `userType`, `Name`, `Address`, `contact`, `joiningDate`, `userCategory`) VALUES
			('$userID', '$userType', '$userName', '$userAddress', '$userContact', '$userJoiningDate', null);";
				
			if($da->executeCommand($sqlQuery))
			{
				//insert into credentials
				$query = "INSERT INTO `credentials`(`username`, `email`, `password`, `userStatus`, `userID`) VALUES
				('$userName', '$userEmail', '$userPassword', 0, '$userID');";
				
				if($da->executeCommand($query))
					echo "insertion completed!";
				else
					echo "failed to linked insert!";
			}
			else
				echo "failed to insert";
		}
		
		public function checkUserName($key)
		{
			$sqlQuery = "SELECT * FROM `credentials` WHERE `username` = '$key';";
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			$row = mysql_fetch_row($result);
			return $row;
		}
	}
?>