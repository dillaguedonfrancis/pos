function editProd(app){
	prodID = app.id;
	
	window.location.href = "updateProduct.php?id="+prodID;
}

function deleteProd(app){
	a = confirm("Are you sure you want to delete this ?");
	if(a){
		prodID = app.id;
		window.location.href = "deleteProdProc.php?id="+prodID;
	}
}

function clears(){
	document.getElementById("oldPassword").value = "";
	document.getElementById("newPassword").value = "";
	document.getElementById("conPassword").value = "";
}

function changePassword(){
	oldP = document.getElementById("oldPassword").value;
	newP = document.getElementById("newPassword").value;
	conP = document.getElementById("conPassword").value;
	
	if(newP == conP){
		window.location.href = "editPasswordAdmin.php?oldPass="+oldP+"&newPass="+newP;
	}
	else{
		alert("Password does not match");
	}
}
	
function nameValid(name){
    validChars = /^[A-Z a-z]+$/;
    if(name.match(validChars)){
        return true;
    }else{
        return false;
    }
}
	
function priceValid(name){
    validChars = /^[0-9]+$/;
    if(name.match(validChars)){
        return true;
    }else{
        return false;
    }
}

function addProd(){
	prodName = document.getElementById("prodName").value;
	prodPrice = document.getElementById("prodPrice").value;
	prodQuantity = document.getElementById("prodQuantity").value;
	picLocation = document.getElementById("location").value;
	
	if(prodName == "" || prodPrice == "" || prodQuantity == ""){
		alert("All input fields are required");
	}
	else{
		if(nameValid(prodName) == true){
			if(priceValid(prodPrice) == true){
				window.location.href = "addProduct.php?name="+prodName+"&price="+prodPrice+"&quantity="+prodQuantity+"&picture="+picLocation;
			}
			else{
				alert("Product price should be integer or numeric values only");
			}
		}
		else{
			alert("Product name should only contain letters.");
		}
	}
}

function updateProduct(app){
	prodID = app.name;
	prodName = document.getElementById("prodNameE").value;
	prodPrice = document.getElementById("prodPriceE").value;
	prodQuantity = document.getElementById("prodQuantityE").value;
	
	if(prodName == "" || prodPrice == "" || prodQuantity == ""){
		alert("All input fields are required");
	}
	else{
		if(nameValid(prodName) == true){
			if(priceValid(prodPrice) == true){
				window.location.href = "editProduct.php?name="+prodName+"&price="+prodPrice+"&quantity="+prodQuantity+"&id="+prodID;
			}
			else{
				alert("Product price should be integer or numeric values only");
			}
		}
		else{
			alert("Product name should only contain letters.");
		}
	}
	
}

function deleteUser(app){
	a = confirm("Are you sure you want to delete this ?");
	if(a){
		user = app.id;
		window.location.href = "deleteUser.php?username="+user;
	}
}

function editUser(app){
	user = app.id;
	
	window.location.href = "updateUser.php?user="+user;
}

function updateUser(app){
	user = app.name;
	first = document.getElementById("first").value;
	middle = document.getElementById("middle").value;
	last = document.getElementById("last").value;
	
	if(first == "" || middle == "" || last == ""){
		alert("All input fields are required");
	}
	else{
		if(nameValid(first) == true){
			if(nameValid(middle) == true){
				if(nameValid(last) == true){
				window.location.href = "editUser.php?user="+user+"&first="+first+"&middle="+middle+"&last="+last;
				}
				else{
					alert("Invalid Last name");
				}
			}
			else{
				alert("Invalid Middle name");
			}
		}
		else{
			alert("Invalid First name");
		}
	}
	
}