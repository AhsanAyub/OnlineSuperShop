<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$prod = new productDescription();
	$prodData = new productData();
	
	$prod->setProductID($_REQUEST['productID']);
	$prod->setProductSize($_REQUEST['pSize']);
	$prod->setProductFabric($_REQUEST['pFabric']);
	$prod->setProductPrice($_REQUEST['pPrice']);
	$prod->setProductDiscount($_REQUEST['pDiscount']);
	$prod->setProductStatus($_REQUEST['pStatus']);
	
	if($prodData->insertProductDetails($prod))
		echo "Inserted!"
	
	
?>