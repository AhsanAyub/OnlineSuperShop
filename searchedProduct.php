<?php

	include_once('Entities/product.php');
	include_once('DataLayer/productData.php');
	
	$pCategory = $_REQUEST['productCategory'];
	$pType = $_REQUEST['productType'];
	$userID = $_REQUEST['userID'];
	//echo $userID;
	$prod = new productEntity();
	$prod->setProductCategory($pCategory);
	$prod->setProductType($pType);
	
	$prodData = new productData();
	echo $prodData->showSearchedProduct($prod, $userID);
	
?>