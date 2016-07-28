<?php
	
	$root = $_SERVER['DOCUMENT_ROOT'];
	//echo $root;
	$dirDataAccess = $root . "/OnlineShop/Framework/DataAccess.php";
	$dirEntity = $root . "/OnlineShop/Entities/product.php";
	$dirEntityUser = $root . "/OnlineShop/Entities/user.php";
	
	/*echo $dir1, '<br/>';
	include_once('/OnlineShop/Framework/DataAccess.php');
	echo $_SERVER['DOCUMENT_ROOT'], '/OnlineShop/Framework/DataAccess.php';*/
	
	include_once($dirDataAccess);
	include_once($dirEntity);
	include_once($dirEntityUser);
	
	class productData
	{
		function __construct()
		{
			
		}
		
		function showData(productEntity $pr)
		{
			$sql = "SELECT * FROM `products` where `placement` = '" . $pr->getProductPlacement() . "';";
			
			$da = new DataAccess();
			$result = $da->DataTable($sql);
			//$row = mysql_fetch_row($result);
			//$da->DataTable($sql);
			
			while($row = mysql_fetch_row($result))
			{
				//echo $row[6]; has to accessed by numerical row
			}
			//print_r($row);
		}
		
		function showOnLoadData()
		{
			$sqlQuery =	"SELECT a. productID, a.image, a.placement, a.userRating, a.clothingType, a.clothingCategory, b.Name, b.Address, b.contact, b.userID
						FROM products a, userinfo b
						WHERE a.offeredBy = b.userID;";
						
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			
			return $result;
		}
		
		public function showProductDescription(productDescription $pr, $id, userEntity $user)
		{
			$key = $pr->getProductID();
			
			$sqlQuery = "SELECT a.sale, a.image, a.placement, a.userRating, a.clothingType, a.clothingCategory,
						b.size, b.fabric, b.price, b.discount, b.status,
						c.Name, c.contact, c.Address, c.joiningDate, c.userCategory, a.userRatingCount, b.serialNo, a.offeredBy
						FROM products a, productdescription b, userinfo c
						WHERE ((a.productID = '$key') AND (b.productID = '$key') AND (c.userID = '$id'));";
						
			//echo $sqlQuery;
						
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			
			$fillData = '';
			
			while($row = mysql_fetch_row($result))
			{
				$pr->setProductSale($row[0]);
				$pr->setProductImage($row[1]);
				$pr->setProductPlacement($row[2]);
				$pr->setProductUserRating($row[3]);
				$pr->setProductType($row[4]);
				$pr->setProductCategory($row[5]);
				$pr->setProductSize($row[5]);
				$pr->setProductFabric($row[6]);
				$pr->setProductPrice($row[7]);
				$pr->setProductDiscount($row[8]);
				$pr->setProductStatus($row[9]);
				
				if(!$user->getUserID()) //visitors
				{
					$fillData .=
					"
						<div><center>
							<img src=$row[1] alt='product image' style='width:400px;height:300px;'/> <br/>
							User Rating: $row[3] stars [$row[16]]<br/>
							Size: $row[6] <br/>
							Price: $row[8] <br/>
							Discunt: $row[9] <br/>
							Fabric: $row[7] <br/>
							Clothing Type: $row[4] <br/>
							Clothing Category: $row[5] <br/>
							Product of <i>$row[11]</i> <br/>
							Address: $row[13]<br/>
							Proudly in Market with us from $row[14]<br/>
							<b>To Purchase, Please Log In/ Sign Up</b><br/><br/>
						</center></div>
					";
				}
				else //valid user
				{
					$userID = $user->getUserID();
					if($user->getUserType() === "Customer")
					{
						if(!$row[10]) //stock finished
							continue;
						
						$fillData .=
						"
							<div><center>
								<img src=$row[1] alt='product image' style='width:400px;height:300px;'/> <br/>
								User Rating: $row[3]stars [$row[16]]
								<input type='radio' name='rating' value='5'> 5 Stars
								<input type='radio' name='rating' value='4'> 4 Stars
								<input type='radio' name='rating' value='3'> 3 Stars
								<input type='radio' name='rating' value='2'> 2 Stars
								<input type='radio' name='rating' value='1'> 1 Star
								<span style='margin-right:2em;'></span>
								<button type='button' onclick='userRating(\"$key\");'>Submit</button><br/>
								Size: $row[6] <br/>
								Price: $row[8] <br/>
								Discunt: $row[9] <br/>
								Fabric: $row[7] <br/>
								Clothing Type: $row[4] <br/>
								Clothing Category: $row[5] <br/>
								Product of <i>$row[11]</i> <br/>
								Address: $row[13]; contact NO. $row[12] <br/>
								Proudly in Market with us from $row[14]; $row[15] user <br/>
								<button type='button' onclick='AddToCart(\"$userID\", \"$key\");'>Add to Cart</button><br/><br/>
							</center></div>
						";
					}
					if($user->getUserType() === "Admin")
					{
						$fillData .=
						"
							<div><center>
								<img src=$row[1] alt='product image' style='width:400px;height:300px;'/> <br/>
								Product Serial No. $row[17] <br/>
								Product Placement: $row[2]<br/>
								User Rating: $row[3] stars [$row[16]]<br/>
								Size: $row[6] <br/>
								Price: $row[8] <br/>
								Discunt: $row[9] <br/>
								Total Sale: $row[0] <br/>
								Left in Stock: $row[10] <br/>
								Fabric: $row[7] <br/>
								Clothing Type: $row[4] <br/>
								Clothing Category: $row[5] <br/>
								Product of <i>$row[11]</i> <br/>
								Merchant ID: $row[18] <br/>
								product ID: $key <br/>
								Address: $row[13]; contact NO. $row[12] <br/>
								Proudly in Market with us from $row[14]; $row[15] user <br/>
								<button type='button' onclick='productDetailsByAdmin(\"$key\");'>Check Details</button><br/><br/>
							</center></div>
						";
					}
					if($user->getUserType() === "Merchant")
					{
						if($id === $user->getUserID())
						{
							$fillData .=
							"
								<div><center>
									<img src=$row[1] alt='product image' style='width:400px;height:300px;'/> <br/>
									Product Placement: $row[2]<br/>
									User Rating: $row[3] stars [$row[16]]<br/>
									Size: $row[6] <br/>
									Price: $row[8] <br/>
									Discunt: $row[9] <br/>
									Total Sale: $row[0] <br/>
									Left in Stock: $row[10] <br/>
									Fabric: $row[7] <br/>
									Clothing Type: $row[4] <br/>
									Clothing Category: $row[5] <br/>
									Product of <i>$row[11]</i> <br/>
									Merchant ID: $row[18] <br/>
									product ID: $key <br/>
									Address: $row[13]; contact NO. $row[12] <br/>
									Proudly in Market with us from $row[14]; $row[15] user <br/>
									<button type='button' onclick='productDetailsByMerchant(\"$key\", \"$row[17]\", \"$row[18]\");'>Edit Item</button><br/><br/>
								</center></div>
							";
						}
						else
						{
							$fillData .= "<center><b> Sorry, it's not your product! :( </b></center>";
							break;
						}
					}
				}
			}
			//return $pr;
			return $fillData;
		}
		
		function showSearchedProduct(productEntity $pr, $userID)
		{
			$pCategory = $pr->getProductCategory();
			$pType = $pr->getProductType();
	
			$sqlQuery =	"SELECT a. productID, a.image, a.placement, a.userRating, a.clothingType, a.clothingCategory, b.Name, b.Address, b.contact, b.userID
						FROM products a, userinfo b
						WHERE (a.offeredBy = b.userID) AND ((a.clothingType = '$pType') OR (a.clothingCategory = '$pCategory'));";
						
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			
			$fillData = '';
			while($row = mysql_fetch_row($result))
			{
				$fillData .=
				"
					<div>
						<img src=$row[1] alt='product image' style='width:100px;height:100px;'/> <br/>
						Picture: $row[1] <br/>
						Placement: $row[2] <br/>
						User Rating: $row[3] stars<br/>
						Clothing Type: $row[4] <br/>
						Clothing Category: $row[5] <br/>
						Product of <i>$row[6]</i> <br/>
						Address: $row[7]; contact NO. $row[7] <br/>
						<button type='button' onclick='fillOnLoadData(\"$row[0]\", \"$row[9]\", \"$userID\");'>Select</button><br/><br/><br/>
					</div>
				";
			}
			return $fillData;
		}
		
		public function showAllMerchantData($key)
		{
			$sqlQuery =	"SELECT * FROM products WHERE offeredBy = '$key';";
						
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			
			return $result;
		}
		
		public function fetchProductDetails(productDescription $prod)
		{
			$prodID = $prod->getProductID();
			$prodSN = $prod->getProductSerialNo();
			
			$sqlQuery = "SELECT a.image, a.placement, a.clothingType, a.clothingCategory, b.size, b.fabric, b.price, b.discount, b.status FROM products a, productdescription b
						WHERE ((a.productID = '$prodID') AND (b.productID = '$prodID') AND (b.serialNo = $prodSN));";
						
			$da = new DataAccess();
			$result = $da->DataTable($sqlQuery);
			
			return $result;
		}
		
		public function updateProductDetails(productDescription $prod, $userID)
		{
			$prodPlacement = $prod->getProductPlacement();
			$prodType = $prod->getProductType();
			$prodCategory = $prod->getProductCategory();
			$prodSize = $prod->getProductSize();
			$prodFabric = $prod->getProductFabric();
			$prodPrice = $prod->getProductPrice();
			$prodDiscount = $prod->getProductDiscount();
			$prodStatus = $prod->getProductStatus();
			$prodSN = $prod->getProductSerialNo();
			$prodID = $prod->getProductID();
			
			$sqlQuery = "UPDATE `productdescription` SET `size` = '$prodSize', `fabric` = '$prodFabric', `price` = $prodPrice, `discount` = $prodDiscount, `status` =  $prodStatus WHERE `serialNo` = $prodSN;";
						
			$da = new DataAccess();
			if($da->executeCommand($sqlQuery))
			{
				$sql = "UPDATE `products` SET `placement` = '$prodPlacement' WHERE `productID` = '$prodID';";
				
				$da->executeCommand($sql);
				echo "successful";
			}
			else
				echo "fauled to update";
		}
		
		public function deleteProductDetails($key)
		{
			$sqlQuery = "DELETE FROM `productdescription` WHERE `serialNo` = $key;";
			
			$da = new DataAccess();
			$da->executeCommand($sqlQuery);
			header('Location: ../OnlineShop');
		}
		
		public function insertProduct($pType, $pCategory, $uID, $pID)
		{
			$pPlacement = date("Y-m-d");
			$image = "../OnlineShop/pictures/BraceSpringFestival.jpg";
			if($pType && $pCategory)
			{
				$sqlQuery = "INSERT INTO `products`(`productID`, `offeredBy`, `sale`, `image`, `placement`, `userRating`, `userRatingCount`, `clothingType`, `clothingCategory`, `seasonedAttribute`) VALUES
						('$pID', '$uID', 0, '$image', '$pPlacement', 0, 0, '$pType', '$pCategory', null);";
						
				//echo $sqlQuery;
				$da = new DataAccess();
				$da->executeCommand($sqlQuery);
				return "Successfull Entry";
			}
			else
				return 0;
		}
		
		public function insertProductDetails(productDescription $prod)
		{
			$pID = $prod->getProductID();
			$pSize = $prod->getProductSize($_REQUEST['pSize']);
			$pFabric = $prod->getProductFabric();
			$pPrice = $prod->getProductPrice();
			$pDiscount = $prod->getProductDiscount();
			$pStatus = $prod->setProductStatus($_REQUEST['pStatus']);
			
			$sqlQuery ="INSERT INTO `productdescription`(`serialNo`, `size`, `productID`, `fabric`, `price`, `discount`, `status`) VALUES (null, '$pSize', '$pID', '$pFabric', $pPrice, $pDiscount, $pStatus);";
			
			echo $sqlQuery;
		}
	}

?>