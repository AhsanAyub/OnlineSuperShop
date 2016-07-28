<?php

	include_once('Entities/user.php');
	include_once('DataLayer/userData.php');
	
	$user = new userEntity();
	$userData = new userData();
	
	$db_con = mysqL_connect('localhost', 'root', '');
	mysql_select_db('onlinesupershop', $db_con);
	$sqlQuery = "SELECT * FROM `users` ORDER BY `u_id` ASC";
	$result = mysql_query($sqlQuery);
	$userType = '';
	while($row = mysql_fetch_row($result))
	{
		if($row[0] != 1)
		{
			$str = "<option value='" . $row[1] . "'> " . $row[1] . "</option>";
			$userType .= $str;
		}
		else if($row[0] == 2)
		{
			$str = "<option value='" . $row[1] . "' selected='selected'> " . $row[1] . "</option>";
			$userType .= $str;
		}
		else if($row[0] > 2)
		{
			$str = "<option value='" . $row[1] . "'> " . $row[1] . "</option>";
			$userType .= $str;
		}
	}
?>

<html>
	<head>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
		<script src="validation.js"></script>
	</head>
	<body>
		<p>
			<b><center><u>Sign Up</u></center></b><br/>
		</p>
		<center>
			<form method="GET" action="userSignUp.php">
				<table>
					<tr>
						<td>User Name:</td>
						<td><input type="text" id="userName" name="userName" onblur="checkUserName()"></input></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="text" id="password" name="password"></input></td>
					</tr>
					<tr>
						<td>Type of Account:</td>
						<td>
							<select id="userType" name="usertype">
								<?php echo $userType; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input type="text" id="name" name="name"></input></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" id="email" name="email"></input></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><textarea id="address" name="address"></textarea></td>
					</tr>
					<tr>
						<td>Contact</td>
						<td><input type="text" id="contact" name="contact"></input></td>
					</tr>
					<tr>
						<td><input type="button" value="Next" id="checkingButton" onclick="userValidate();"></input></td>
						<td align="right"><input type="submit" id="submit" value="Done" style="display: none"></input></td>
					</tr>
				</table>
			</form><br/><br/>
			
			<label id="errorMessage"></label>
		</center>
	</body>
</html>