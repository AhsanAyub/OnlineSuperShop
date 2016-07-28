<?php
		
	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$offeredBy = $_REQUEST['offeredBy'];
	$htmlTags = '';
	$user = new userEntity();
	$user->setUserID($_REQUEST['userID']);
	
	//$userID= $_REQUEST['userID'];
	//echo $_REQUEST['offeredBy'];
	$prod = new productDescription();
	$prodID = $_REQUEST['productID'];
	$prod->setProductID($_REQUEST['productID']);
	
	$prodData = new productData();
	
	if(!$user->getUserID())
	{
		$htmlTags .=
		"
			<label id='labelUserName'>User Name:</label>
			<input type='text' id='userName'></input>
			<label id='labelPassword'>Pasword:</label>
			<input type='password' id='userPassword'></input>
			<input type='button' value='Login' onclick='modifiedLogin(\"$prodID\",\"$offeredBy\");' id='login' ></input>
			<input type='button' value='Create an Account' onclick='signup();' id='signup'></input>
		";
		
		$fillProductData = '';
		//$prod = $prodData->showProductDescription($prod);
		$fillProductData = $prodData->showProductDescription($prod, $offeredBy, $user);
	}
	else
	{
		$user->setUserType($_REQUEST['userType']);
		$userType = $_REQUEST['userType'];
		$uID = $user->getUserID();
		$htmlTags .=
		"
			<label id=$userType><a href='$userType.php?userID=$uID'>$userType Panel</a></label>
			<label id='loginStatus'>Welcome, $userType</label>
			<input type='button' value='Logout' onclick='restart();' id='logout'></input>
		";
		
		$fillProductData = '';
		//$prod = $prodData->showProductDescription($prod);
		$fillProductData = $prodData->showProductDescription($prod, $offeredBy, $user);
	}
?>

<html>
	<head>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<body>
		<h5 align="right">
			<label id='adminPanel' style='display: none'></label>
			<?php echo $htmlTags; ?>
		</h5>
		
		<label> <?php echo $fillProductData; ?></label>
	</body>
</html>