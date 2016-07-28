<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$prodData = new productData();
	$prodSN = $_REQUEST['prodSerialNo'];
	//echo $prodSN;
	echo $prodData->deleteProductDetails($prodSN);
?>