function getClasses(elem){
	var elmt = document.getElementsByTagName(elem);
	var str = elmt[0].className.split(" ");
	
	return str;
}

alert("Classes that belong to HI are... \n" + getClasses("p"));

