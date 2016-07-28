Header("content-type: application/x-javascript");

var userID = '';

function fillOnLoadData(prodID, offeredBy, loginStatus)
{
	//window.location.href = productData;
	//if(!document.getElementById('loginStatus').innerHTML)
		//alert("Not logged in");
	
	userID = loginStatus;
		
	//alert(loginStatus);
	if(userID === '')
	{
		//alert("NOT Logged in");
		//alert("productDescription.php?productID=" + prodID + "&offeredBy=" + offeredBy + "&userID=");
		
		window.location.href = "productDescription.php?productID=" + prodID + "&offeredBy=" + offeredBy + "&userID=";
	}
	else
	{
		alert("Logged in");
	}
		//logged in
	
	//document.getElementById('onLoadPHP').innerHTML = x;
	
}

function search()
{
	//document.getElementById('onLoadPHP').style.display= "none";
	var x = document.getElementById('clothingType').value;
	alert(x);
	//document.getElementById('msg').innerHTML = x;
	
}

function sendSelectedProductRequest()
{
	/*var xhttp;
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
			document.getElementById("userInfo").innerHTML = xhttp.responseText;
			//alert(xhttp.responseText);
			if(xhttp.responseText == "Successfull")
			{
				alert(xhttp.responseText);
				window.location.href = "homepage.php?uName=" + userName + "&uPassword=" + userPassword;
			}
			else
			{
				alert("Login Failure");
			}
		}
	};
	
		//var em = document.getElementById("email").value;
		xhttp.open("GET", "searchedProduct.php?uID=" + i, true);
		xhttp.send();
	}*/
}