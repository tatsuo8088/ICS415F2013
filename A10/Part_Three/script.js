function validateForm(){
	var  isFilled = true;
	
	var nameVal = document.forms["myForm"]["name"].value;
	if(nameVal == null || nameVal == ""){
		addClass(fName, "empty");
		isFilled = false;
	}
	
	var emailVal = document.forms["myForm"]["email"].value;
	if(emailVal == null || emailVal == ""){
		addClass(fEmail, "empty");
		isFilled = false;
	}
	
	var passwordVal = document.forms["myForm"]["password"].value;
	if(passwordVal == null || passwordVal == ""){
		addClass(fPassword, "empty");
		isFilled = false;
	}
	
	var confirmVal = document.forms["myForm"]["confirm"].value;
	if(confirmVal == null || confirmVal == ""){
		addClass(fConfirm, "empty");
		isFilled = false;
	}
	if(confirmVal != passwordVal){
		alert("Passwords do not match");
	}
	
	if(isFilled == false){
		alert("Textboxs in red are not filled out");
		return false;
	}
}

function addClass(elem, className){
	elem.className += ' ' + className;
}
