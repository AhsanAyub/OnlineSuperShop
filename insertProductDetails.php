<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$userID = $_REQUEST['userID'];
	$prodType = $_REQUEST['productType'];
	$prodCategory = $_REQUEST['productCategory'];
	$prodID = date("Y-m-d h:i:s");
	
	$htmlTags =
		"
			<label><a href='Merchant.php?userID=$userID'>Mehrchant Panel</a></label>
			<label id='loginStatus'>Welcome, Merchant</label>
			<input type='button' value='Logout' onclick='restart();' id='logout'></input>
		";
	
	$message = 1;
	$prodData = new productData();
	//$message = $prodData->insertProduct($prodType, $prodCategory, $userID, $prodID);
	$tableData = '';
	if($message)
	{
		$tableData .=
		"
			<table>
				<tr>
					<td>Product Size:</td>
					<td><input type='text' name='pSize'></input></td>
				</tr>
				<tr>
					<td>Fabric:</td>
					<td><input type='text' name='pFabric'></input></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td><input type='text' name='pPrice'></input></td>
				</tr>
				<tr>
					<td>Discount:</td>
					<td><input type='text' name='pDiscount'></input></td>
				</tr>
				<tr>
					<td># of Products:</td>
					<td><input type='text' name='pStatus'></input></td>
				</tr>
				<tr>
					<td><input type='hidden' name='productID' value='$prodID'></input></td>
					<td><input type='submit' value='Insert'></input>
				</tr>
			</table>
		";
	}
?>

<html>
	<head>
		<script src="scripts.js"></script>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
	</head>
	<body>
		<h5 align="right">
			<?php echo $htmlTags; ?>
		</h5>
		
		<form method="get" action="insertProductDescription.php">
			<center>
				<label id="tableData"><?php echo $tableData; ?></label>
			</center>
		</form>
	</body>
</html>