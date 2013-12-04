function validateForm(){
	var  isFilled = true;
	
	var emailVal = document.forms["final_project_newUser"]["email"].value;
	if(emailVal == null || emailVal == ""){
		addClass(inputEmail, "error");
		isFilled = false;
	}
	
	var passwordVal = document.forms["final_project_newUser"]["password"].value;
	if(passwordVal == null || passwordVal == ""){
		addClass(inputPassword, "error");
		isFilled = false;
	}
	
	var confirmVal = document.forms["final_project_newUser"]["confirm_password"].value;
	if(confirmVal == null || confirmVal == ""){
		addClass(confirmPassword, "error");
		isFilled = false;
	}
	if(confirmVal != passwordVal){
		alert("Passwords do not match");
	}
	
	if(isFilled == false){
		return false;
	}
}

function addClass(elem, className){
	elem.className += ' ' + className;
}
