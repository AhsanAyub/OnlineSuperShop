var userName = '';
var password = '';
var userType = '';
var name = '';
var email = '';
var address = '';
var contact = '';

function userValidate()
{
	var msg = '';
	userName = document.getElementById('userName').value;
	if(!(userName.length))
	{
		msg += "username | ";
		//return;
	}
	
	password = document.getElementById('password').value;
	if(!(password.length))
	{
		msg += "password | ";
	}
	
	name = document.getElementById('name').value;
	if(!(name.length))
	{
		msg += "Name | ";
	}
	
	address = document.getElementById('address').value;
	if(!(address.length))
	{
		msg += "Address | ";
	}
	
	email = document.getElementById('email').value;
	if(!(email.length))
	{
		msg += "Email | ";
	}
	
	contact = document.getElementById('contact').value;
	if(!(contact.length))
	{
		msg += "Contact | ";
	}
	var e = document.getElementById("userType");
	userType = e.options[e.selectedIndex].value;
	if(!userType)
	{
		msg += "User type | ";
	}
	
	if(!msg)
	{
		document.getElementById('submit').style.display = "inline";
		document.getElementById('checkingButton').style.display = "none";
	}
	else
		document.getElementById('errorMessage').innerHTML = msg;
		//alert(msg);
}

function checkUserName()
{
	userName = document.getElementById('userName').value;
	
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
			var message = xhttp.responseText.replace(/^\s*/,'');
			if(message)
				alert(message);
		}
	};
	xhttp.open("POST", "userName.php?userName=" + userName, true);
	xhttp.send();
}