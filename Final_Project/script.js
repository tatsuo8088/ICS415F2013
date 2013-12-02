function validateForm(){
	var  isFilled = true;
	
	var emailVal = document.forms["final_project"]["email"].value;
	if(emailVal == null || emailVal == ""){
		addClass(inputEmail, "error");
		isFilled = false;
	}
	
	var passwordVal = document.forms["final_project"]["password"].value;
	if(passwordVal == null || passwordVal == ""){
		addClass(inputPassword, "error");
		isFilled = false;
	}
	
	if(isFilled == false){
		return false;
	}
}

function addClass(elem, className){
	elem.className += ' ' + className;
}