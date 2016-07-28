<?php

	include_once('Entities/product.php');
	include_once('DataLayer/productData.php');
	
	$db_con = mysqL_connect('localhost', 'root', '');
	mysql_select_db('onlinesupershop', $db_con);
	$sqlQuery = "SELECT * FROM `clothingCategory` ORDER BY `serialNo` ASC";
	$result = mysql_query($sqlQuery);
	$clothingCategory = '';
	$clothingType = '';
	while($row = mysql_fetch_row($result))
	{
		if($row[0] != 1)
			$str = "<option value='" . $row[1] . "'> " . $row[1] . "</option>";
		else
			$str = "<option value='" . $row[1] . "' selected='selected'> " . $row[1] . "</option>";
		$clothingCategory .= $str;
	}
	
	$sqlQuery = "SELECT * FROM `clothingType` ORDER BY `serialNo` ASC";
	$result = mysql_query($sqlQuery);
	while($row = mysql_fetch_row($result))
	{
		if($row[0] != 1)
			$str = "<option value='" . $row[1] . "'> " . $row[1] . "</option>";
		else
			$str = "<option value='" . $row[1] . "' selected='selected'> " . $row[1] . "</option>";
		$clothingType .= $str;
	}
	
	$prodData = new productData();
	$result = $prodData->showOnLoadData();
	$onLoadMessage = "";
	while($row = mysql_fetch_row($result))
	{
		$onLoadMessage .=
		"
			<div>
				<img src=$row[1] alt='product image' style='width:100px;height:100px;'/> <br/>
				Picture: $row[1] <br/>
				Placement: $row[2] <br/>
				User Rating: $row[3] stars<br/>
				Clothing Type: $row[4] <br/>
				Clothing Category: $row[5] <br/>
				Product of <i>$row[6]</i> <br/>
				Address: $row[7]<br/>
				<button type='button' onclick='fillOnLoadData(\"$row[0]\", \"$row[9]\");'>Select</button><br/><br/><br/>
			</div>
		";
	}
?>

<html>
	<head>
		<script type="text/javascript" src="scripts.js"></script>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
	</head>
	
	<body>
		<h5 align="right">
			<label id="labelUserName">User Name:</label>
			<input type="text" id="userName"></input>
			<label id="labelPassword">Pasword:</label>
			<input type="password" id="userPassword"></input>
			<input type="button" value="Login" onclick="login();" id="login" ></input>
			<label id="Admin" style="display: none"></label>
			<label id="Merchant" style="display: none"></label>
			<label id="Customer" style="display: none"></label>
			<label id="loginStatus"></label>
			<input type="button" value="Logout" onclick="restart();" style="display: none" id="logout"></input>
			<input type="button" value="Create an Account" onclick="signup();"id="signup"></input>
		</h5>
		
		<p style="padding-left: 5px;">
		Select Clothing Category:
		<select onchange="search();" id="clothingCategory">
			<?php echo $clothingCategory; ?>
		</select>
		
		<span style="margin-right:5em;"></span>
		
		Clothting Type:
		<select onchange="search();" id="clothingType">
			<?php echo "\t", $clothingType; ?>
		</select></p> <br/><br/>
		<label id="msg"></label>
		
		<center><label id="onLoadPHP" style="display:true;">
			 <?php echo $onLoadMessage; ?>
		</label></center>
		<label id="productDescription"></label>
		
		<input type="hidden" id="userID" value=""></input>
		
	</body>
	
</html>