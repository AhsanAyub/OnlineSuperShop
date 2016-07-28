	<?php

	class DataAccess
	{
		function __construct()
		{
			$db_con = mysqL_connect('localhost', 'root', '');
			mysql_select_db('onlinesupershop', $db_con);
		}
	
		function executeCommand($sqlQuery) //Insert, update and delete operation
		{	
			if(mysql_query($sqlQuery))
				return 1;
			else
				return 0;
			//echo $sqlQuery;
		}
		
		function DataTable($sqlQuery) //return a set of data
		{
			$result = mysql_query($sqlQuery);
			//$row = mysql_fetch_row($result);
			
			return $result;
			//echo $sqlQuery;
		}
	}

?>