<?php

	class A
	{
		private $id;
		private $name;
		
		public function setName($name)	
		{
			$this->name = $name;
		}
		public function getName()	
		{
			return $this->name;
		}
		
		public function setID($id)	
		{
			$this->id = $id;
		}
		public function getID()	
		{
			return $id;
		}
	}

?>