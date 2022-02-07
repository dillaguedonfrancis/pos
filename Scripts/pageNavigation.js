function registerButton(){
	window.location.href = "register.php";
}

function loginButton(){
	window.location.href = "login.php";
}

function logout(){
	window.location.href = "logout.php";
}

function settingsUser(){
	window.location.href = "settingsUser.php";
}

function wishUser(){
	window.location.href = "wishUser.php";
}

function prodUser(){
	window.location.href = "prodUser.php";
}

function cartUser(){
	window.location.href = "cartUser.php"
}

function settingsAdmin(){
	window.location.href = "settingsAdmin.php";
}

function createProd(){
	window.location.href = "createProd.php";
}

function readProd(){
	window.location.href = "prodAdmin.php";
}

function viewUser(){
	window.location.href = "viewUser.php";
}

function createUser(){
	window.location.href = "createUser.php";
}

function cancelUpdate(){
	window.location.href = "viewUser.php";
}

function transactions(){
	window.location.href = "transAdmin.php";
}

function searchProd(){
	name = document.getElementById("search").value;
	
	window.location.href = "search.php?search="+name;
}