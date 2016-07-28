<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$userID = $_REQUEST['userID'];
	$prodID = $_REQUEST['productID'];
	$prodSN = $_REQUEST['productSerialNo'];
	
	$prod = new productDescription();
	$prodData = new productData();
	
	$prod->setProductSerialNo($prodSN);
	$prod->setProductID($prodID);
	
	$result = $prodData->fetchProductDetails($prod);
	if($result)
	{
		$row = mysql_fetch_row($result);
		
		$prod->setProductImage($row[0]);
		$prod->setProductPlacement($row[1]);
		$prod->setProductType($row[2]);
		$prod->setProductCategory($row[3]);
		$prod->setProductSize($row[4]);
		$prod->setProductFabric($row[5]);
		$prod->setProductPrice($row[6]);
		$prod->setProductDiscount($row[7]);
		$prod->setProductStatus($row[8]);
	}
?>
<html>
	<head>
		<script src="products.js"></script>
		<title>Online Super Shop</title>
		<h1 style="color: blue;"><center>Online Super Shop</center></h1>
	</head>
	<body>
		<h5 align="right">
			<label id="Merchant">Welcome, Merchant</label>
			<input type="button" value="Logout" onclick="restart();" id="logout"></input>
		</h5> <br/>
		<form method="get" action="updateProductDetails.php" enctype="multipart/form-data"><center>
			<img src=<?php echo $prod->getProductImage(); ?> alt="Product Image" style='width:400px;height:300px;'/><br/>
			<table>
				<tr>
					<td>Update Image:</td>
					<td><input type="file" id="productImageID" name="productImage"></td>
				</tr>
				<tr>
					<td>Product Placement:</td>
					<td><input type="date" name="productPlacement" value=<?php echo $prod->getProductPlacement(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Type:</td>
					<td><input type="text" name="productType" value=<?php echo $prod->getProductType(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Category:</td>
					<td><input type="text" name="productCategory" value=<?php echo $prod->getProductCategory(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Size:</td>
					<td><input type="text" name="productSize" value=<?php echo $prod->getProductSize(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Fabric:</td>
					<td><input type="text" name="productFabric" value=<?php echo $prod->getProductFabric(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Price:</td>
					<td><input type="text" name="productPrice" value=<?php echo $prod->getProductPrice(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Discount:</td>
					<td><input type="text" name="productDiscount" value=<?php echo $prod->getProductDiscount(); ?>></input></td>
				</tr>
				<tr>
					<td>Product Status:</td>
					<td><input type="text" name="productStatus" value=<?php echo $prod->getProductStatus(); ?>></input></td>
				</tr>
				<tr>
					<td><input type="hidden" name="userID" value="<?php echo $userID; ?>"></input></td>
					<td><input type="hidden" name="productID" value="<?php echo $prod->getProductID(); ?>"></td>
					
				</tr>
				<tr>
					<td><input type="hidden" name="productSN" value="<?php echo $prodSN; ?>"></input></td>
					<td><input type="submit" value="Update"></input></td>
				</tr>
			</table>		
		</center></form>
		<center><button type='button' onclick='<?php echo "deleteProduct($prodSN);"?>'>Delete</button></center>
	</body>
</html>