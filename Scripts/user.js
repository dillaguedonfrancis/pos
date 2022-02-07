function changePassword(){
	oldP = document.getElementById("oldPassword").value;
	newP = document.getElementById("newPassword").value;
	conP = document.getElementById("conPassword").value;
	
	if(newP == conP){
		window.location.href = "editPasswordUser.php?oldPass="+oldP+"&newPass="+newP;
	}
	else{
		alert("Password does not match");
	}
}

function clears(){
	document.getElementById("oldPassword").value = "";
	document.getElementById("newPassword").value = "";
	document.getElementById("conPassword").value = "";
}

function addCart(app){
	prodName = app.id;
	prodPrice = app.name;
	prodPic = document.getElementById(prodName).value;
	
	window.location.href = "cartProcess.php?name="+prodName+"&price="+prodPrice+"&picture="+prodPic;
}

function addWish(app){
	prodName = app.id;
	prodPrice = app.name;
	prodPic = document.getElementById(prodName).value;
	
	window.location.href = "wishProcess.php?name="+prodName+"&price="+prodPrice+"&picture="+prodPic;
}

function purchaseCart(app){
	name = app.id;
	price = app.name;
	
	window.location.href = "purchase.php?name="+name+"&price="+price;
}

function okay(app){
	prodName = app.id;
	type = app.name;
	
	window.location.href = "removeToCart.php?name="+prodName+"&type="+type;
}