<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$user = new userEntity();
	$userData = new userData();
	$prod = new productEntity();
	$prodData = new productData();
	
	$user->setUserID($_REQUEST['userID']);
	$uID = $user->getUserID();
	
	$result = $prodData->showAllMerchantData($uID);
	$allProducts = '';
	while($row = mysql_fetch_row($result))
	{
		$allProducts .=
		"
			<div><center>
				<img src=$row[3] alt='product image' style='width:400px;height:300px;'/> <br/>
				Product ID: $row[0]; </br>
				Product Placement: $row[4]<br/>
				User Rating: $row[5] stars [$row[6]]<br/>
				Total Sale: $row[2] <br/>
				Clothing Type: $row[7] <br/>
				Clothing Category: $row[8] <br/>
				<a href= 'productDescription.php?productID=$row[0]&offeredBy=$row[1]&userID=$uID&userType=Merchant'>Select</a><br/><br/>
			</center></div>
		";
		//"productDescription.php?productID=$row[0]&offeredBy=$row[1]&userID=$uID&userType=Merchant"
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
			<a href='<?php echo "insertProduct.php?userID=", $uID?>' >Insert Product</a>
			<label id='loginStatus'>Welcome, Merchant</label>
			<input type='button' value='Logout' onclick='restart();' id='logout'></input>
		</h5> <br/>
		<label id="display">
			<?php echo $allProducts; ?>
		</label>
	</body>
</html>