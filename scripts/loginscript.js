console.log("checking the javascript file");
function sendLoginParameters()
{
	var userName= document.getElementById("userName").value;
	var userPassword= document.getElementById("userPassword").value;
	if (userName=="" || userPassword==""){
		alert("Username or Password cannot be blank");
		return false;
	}
	document.getElementById("form_login").submit();
}
