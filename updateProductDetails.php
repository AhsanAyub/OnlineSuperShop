<?php

	include_once('DataLayer/productData.php');
	include_once('DataLayer/userData.php');
	include_once('Entities/product.php');
	include_once('Entities/user.php');
	
	$userID = $_REQUEST['userID'];
	$prod = new productDescription();
	$prodData = new productData();
	
	$prod->setProductPlacement($_REQUEST['productPlacement']);
	$prod->setProductType($_REQUEST['productType']);
	$prod->setProductCategory($_REQUEST['productCategory']);
	$prod->setProductSize($_REQUEST['productSize']);
	$prod->setProductFabric($_REQUEST['productFabric']);
	$prod->setProductPrice($_REQUEST['productPrice']);
	$prod->setProductDiscount($_REQUEST['productDiscount']);
	$prod->setProductStatus($_REQUEST['productStatus']);
	$prod->setProductID($_REQUEST['productID']);
	$prod->setProductSerialNo($_REQUEST['productSN']);
	
	//echo $prod->getProductID();
	$prodData->updateProductDetails($prod, $userID);
	/*if(!empty($_FILES['productImage']))
	if(isset($_FILES['productImage']))
	{
		//
		echo "is set";
	}
	else
	{
		//$myImage = $_FILES['productImage']['product'];
		//echo $myImage;
		echo "is not set";
		//echo $_FILES['productImageID']['name'];
	}*/
?>