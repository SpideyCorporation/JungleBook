/* JungleBook.js */

function validateUsername()
{
// TODO: Only alphabets to be allowed. No Special Characters or numbers(Username: 123)

	var username = document.forms['form_signup'].elements['username'].value;

	var alphaRegEx = /^[a-zA-Z]+$/;
	if (!alphaRegEx.test(username))
	{
		return false;
	}
	
	$('#username_spinner').css({"width":"20px", "height":"20px"});
	$('#username_spinner').show();
	
	//clear previous username avail message
	$('#username_message').hide();
	
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange=function()
	{
	if (xhr.readyState==4 && xhr.status==200)
    {
    	$('#username_spinner').hide();
    	var response = xhr.responseText;
    	$('#username_message').text(response);
    	$('#username_message').show();
    	
    }
  }
  xhr.open("GET", "/junglebook/signup?user_available=" + username, true);
  xhr.send();
}

function validatePassword()
{
	var signup_password = document.forms['form_signup'].elements['password'].value;
	var signup_conf_password = document.forms['form_signup'].elements['conf_password'].value;
	
	var err_msg = "";
	if (signup_password != signup_conf_password)
	{
		err_msg = "Passwords Do Not Match";
	}
	else if (signup_password == "")
	{
		err_msg = "Please enter password";
	}
	else
	{
		$('#password_message').hide();
	}
	$('#password_message').text(err_msg);
	$('#password_message').show();
}

function validateSignupForm()
{
	return validateUsername() && validatePassword();
}