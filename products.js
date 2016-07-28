function restart()
{
	window.location.href = "../OnlineShop";
}

function deleteProduct(prodID)
{
	var xhttp;
	if (window.XMLHttpRequest)
	{
		// code for modern browsers
		xhttp = new XMLHttpRequest();
	}
	else 
	{
		// code for IE6, IE5
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.onreadystatechange = function() 
	{
		if (xhttp.readyState == 4)
		{
			var temp = xhttp.responseText.replace(/^\s*/,''); //it will avoid whitespaces
			alert(temp);
		}
	};
	xhttp.open("POST", "deleteProduct.php?prodSerialNo=" + prodID, true);
	xhttp.send();
}