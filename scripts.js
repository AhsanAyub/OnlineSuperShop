var userID = '';
var userName = '';
var userPassword = '';
var userType = '';

var productID = '';
var productSerialNo = '';
var offeredBy = '';
var modifiedLoginFlag = 0;

function assignUserID()
{
	userID = document.getElementById('userID').value;
	alert(userID);
}

function fillOnLoadData(prodID, offeredBy)
{
	//assignUserID();
	if(userID === '')
	{ //user not logged in
		window.location.href = "productDescription.php?productID=" + prodID + "&offeredBy=" + offeredBy + "&userID=";
	}
	else
	{ //user logged in
		window.location.href = "productDescription.php?productID=" + prodID + "&offeredBy=" + offeredBy + "&userID=" + userID + "&userType=" + userType;
	}
}

function search()
{
	var cCategory = document.getElementById('clothingCategory').value;
	var cType = document.getElementById('clothingType').value;
	
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
			document.getElementById("onLoadPHP").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("POST", "searchedProduct.php?productCategory=" + cCategory + "&productType=" + cType + "&userID=" + userID, true);
	xhttp.send();
}

function hide()
{
	document.getElementById('labelUserName').style.display= "none";
	document.getElementById('labelPassword').style.display= "none";
	document.getElementById('userName').style.display= "none";
	document.getElementById('userPassword').style.display= "none";
	document.getElementById('login').style.display= "none";
	document.getElementById('signup').style.display= "none";
	
	document.getElementById('loginStatus').style.display= "inline";
	document.getElementById('loginStatus').innerHTML= "Welcome, " + userType;
	
	document.getElementById('logout').style.display= "inline";
}

function fetchUserInfo()
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
			userType = xhttp.responseText.replace(/^\s*/,''); //it will avoid whitespaces
			
			if(modifiedLoginFlag)
				fillOnLoadData(productID, offeredBy);
			
			if(userType === "Admin")
			{
				userType = "Admin";
				document.getElementById('Admin').style.display = "inline";
				document.getElementById('Admin').innerHTML = "<a href='Admin.php?userID=" + userID + "'>Admin Panel</a>";
				hide();
			}
			if(userType === "Merchant")
			{
				userType = "Merchant";
				document.getElementById('Merchant').style.display = "inline";
				document.getElementById('Merchant').innerHTML = "<a href='Merchant.php?userID=" + userID + "'>Merchant Panel</a>";
				hide();
			}
			if(userType === "Customer")
			{
				userType = "Customer";
				document.getElementById('Customer').style.display = "inline";
				document.getElementById('Customer').innerHTML = "<a href='Customer.php?userID=" + userID + "'>Customer Panel</a>";
				hide();
			}
		}
	};
	xhttp.open("POST", "signin.php?UserName=" + userName + "&Password=" + userPassword + "&userID=" + userID, true);
	xhttp.send();
}

function login()
{
	userName = document.getElementById('userName').value;
	userPassword = document.getElementById('userPassword').value;
	
	var xhttp;
	
	if(!(userName.length))
	{
		alert("User Name field has to be inserted");
		return;
	}
	else if(!userPassword.length)
	{
		alert("Password field has to be inserted");
		return;
	}
	else
	{
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
				
				if(temp === "invalid")
				{	
					alert("Invaild user - Admin's Approval Needed!");
				}
				else
				{	
					userID = temp;
					//document.getElementById('userID').value = userID;
					
					fetchUserInfo();
				}
			}
		};
		xhttp.open("POST", "signin.php?UserName=" + userName + "&Password=" + userPassword + "&userID=" + userID, true);
		xhttp.send();
	}
}

function modifiedLogin(pID, oBy)
{
	productID = pID;
	offeredBy = oBy;
	//alert("Modified");
	modifiedLoginFlag = 1;
	login();
}

function signup()
{
	window.location.href = "signup.php";
}

function restart()
{
	window.location.href = "../OnlineShop";
}

function productDetailsByMerchant(pID, pSN, uID)
{
	/*
	productID = pID;
	productSerialNo = pSN;
	userID = uID;
	*/
	window.location.href = "updateProduct.php?productID=" + pID + "&productSerialNo=" + pSN + "&userID=" + uID;
}