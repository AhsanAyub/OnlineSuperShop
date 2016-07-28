<?php

	$userID = $_REQUEST['userID'];
	$htmlTags =
		"
			<label><a href='Merchant.php?userID=$userID'>Mehrchant Panel</a></label>
			<label id='loginStatus'>Welcome, Merchant</label>
			<input type='button' value='Logout' onclick='restart();' id='logout'></input>
		";
?>

<html>
	<head>
		<script src="products.js"></script>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
	</head>
	<body>
		<h5 align="right">
			<?php echo $htmlTags; ?>
		</h5> <br/>
		<form method="get" action="insertProductDetails.php" enctype="multipart/form-data"><center>
			<p>
				<b><center> Insert New Product </center></b> <br/><br/>
			</p>
			
			<table>
				<tr>
					<td>Upload Image:</td>
					<td><input type="file" id="productImageID" name="productImage"></td>
				</tr>
				<tr>
					<td>Product Type:</td>
					<td><input type="text" name="productType"></input></td>
				</tr>
				<tr>
					<td>Product Category:</td>
					<td><input type="text" name="productCategory"></input></td>
				</tr>
				<tr>
					<td><input type="hidden" name="userID" value='<?php echo $userID; ?>'></input></td>
					<td><input type="submit" value="Insert"></input></td>
				</tr>
			</table>		
		</center></form>
	</body> <br/><br/>
	
	<label id="productDescription"></label>
</html>