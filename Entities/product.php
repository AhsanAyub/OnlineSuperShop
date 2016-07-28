<?php

	class productEntity
	{
		//private var $productID = '';
		private $productID = '';
		private $productSale = 0;
		private $productImage = '';
		private $productPlacement = 'hi';
		private $productUserRating = 0;
		private $productType = '';
		private $productCategory = '';
		private $productSeasonedAttribute = '';
		
		public function setProductID($productID)
		{
			$this->productID = $productID;
		}
		public function getProductID()
		{
			return $this->productID;
		}
		
		public function setProductSale($productSale)
		{
			$this->productSale = $productSale;
		}
		public function getProductSale()
		{
			return $this->productSale;
		}
			
		public function setProductImage($productImage)
		{
			$this->productImage = $productImage;
		}
		public function getProductImage()
		{
			return $this->productImage;
		}
		
		public function setProductPlacement($productPlacement)
		{
			$this->productPlacement = $productPlacement;
			//$productPlacement = $productPlacement;
			//echo $productPlacement;
		}
		public function getProductPlacement()
		{
			//return $productPlacement; --WRONG--
			return $this->productPlacement;
		}
		
		public function setProductUserRating($productUserRating)
		{
			$this->productUserRating = $productUserRating;
		}
		public function getProductUserRating()
		{
			return $this->productUserRating;
		}
		
		public function setProductType($productType)
		{
			$this->productType = $productType;
		}
		public function getProductType()
		{
			return $this->productType;
		}
		
		public function setProductCategory($productCategory)
		{
			$this->productCategory = $productCategory;
		}
		public function getProductCategory()
		{
			return $this->productCategory;
		}
		
		public function setProductSeasonedAttribute($productSeasonedAttribute)
		{
			$this->productSeasonedAttribute = $productSeasonedAttribute;
		}
		public function getProductSeasonedAttribute()
		{
			return $this->productSeasonedAttribute;
		}
	}

	
	class productDescription extends productEntity
	{
		private $productSize = '';
		private $productFabric = '';
		private $productPrice = 0;
		private $productDiscount = 0;
		private $productStatus = 0;
		private $productSerialNo;
		
		public function setProductSerialNo($productSerialNo)
		{
			$this->productSerialNo = $productSerialNo;
		}
		public function getProductSerialNo()
		{
			return $this->productSerialNo;
		}
		
		public function setProductSize($productSize)
		{
			$this->productSize = $productSize;
		}
		public function getProductSize()
		{
			return $this->productSize;
		}
		
		public function setProductFabric($productFabric)
		{
			$this->productFabric = $productFabric;
		}
		public function getProductFabric()
		{
			return $this->productFabric;
		}
		
		public function setProductPrice($productPrice)
		{
			$this->productPrice = $productPrice;
		}
		public function getProductPrice()
		{
			return $this->productPrice;
		}
		
		public function setProductDiscount($productDiscount)
		{
			$this->productDiscount = $productDiscount;
		}
		public function getProductDiscount()
		{
			return $this->productDiscount;
		}
		
		public function setProductStatus($productStatus)
		{
			$this->productStatus = $productStatus;
		}
		public function getProductStatus()
		{
			return $this->productStatus;
		}
	}

?>