function validateForm() {
	if ((document.forms["newUser"]["firstName"].value == null) || (document.forms["newUser"]["firstName"].value) == "") {
		alert("You forgot to enter your first name!");
		return false;
	}
	if ((document.forms["newUser"]["lastName"].value == null) || (document.forms["newUser"]["lastName"].value) == "") {
		alert("You forgot to enter your last name!");
		return false;
	}
	if ((document.forms["newUser"]["password1"].value == null) || (document.forms["newUser"]["password1"].value) == "") {
		alert("You forgot to enter a password!");
		return false;
	}
	if ((document.forms["newUser"]["password2"].value == null) || (document.forms["newUser"]["password2"].value) == "") {
		alert("You forgot to verify your password!");
		return false;
	}
	if ((document.forms["newUser"]["email1"].value == null) || (document.forms["newUser"]["email1"].value) == "") {
		alert("You forgot to enter a email!");
		return false;
	}
	if ((document.forms["newUser"]["email2"].value == null) || (document.forms["newUser"]["email2"].value) == "") {
		alert("You forgot to verify your email!");
		return false;
	}
	if (document.forms["newUser"]["email1"].value != document.forms["newUser"]["email2"].value) {
		alert("Your email addresses don't match!");
		return false;
	}
	if (document.forms["newUser"]["password1"].value != document.forms["newUser"]["password2"].value) {
		alert("Your passwords don't match!");
		return false;
	}
}
