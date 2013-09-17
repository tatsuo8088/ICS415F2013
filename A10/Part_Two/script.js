function addClass(elem, className){
	elem.className += ' ' + className;
}

document.getElementById("boldChange").onclick = function(){
	addClass(part_two, "addBold");
	part_two.innerHTML = "HI";
}

document.getElementById("sizeChange").onclick = function(){
	addClass(part_two, "addFontSize");
	part_two.innerHTML = "HI";
}

document.getElementById("styleChange").onclick = function(){
	addClass(part_two, "addFontStyle");
	part_two.innerHTML = "HI";
}

document.getElementById("colorChange").onclick = function(){
	addClass(part_two, "changeFontColor");
	part_two.innerHTML = "HI";
}