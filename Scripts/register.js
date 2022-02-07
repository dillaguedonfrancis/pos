function userValid(user){
    validChars = /^[A-Za-z_0-9]+$/;
    if(!user.match(validChars)){
        return false;
    }else{
        return true;
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

function inputValidation(username, password, confirms, first, middle, last){
if(userValid(username) == true){
		if(userValid(password) == true){
			if(nameValid(first) == true){
				if(nameValid(middle) == true){
					if(nameValid(last) == true){
						saveAccount(username, password, first, middle, last);
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
		else{
			alert("Invalid Password");
		}
	}
	else{
		alert("Invalid Username");
	}
}

function signUp(){
	username = document.getElementById("regUsername").value;
	password = document.getElementById("regPassword").value;
	confirms = document.getElementById("regConfirm").value;
	first = document.getElementById("regFirst").value;
	middle = document.getElementById("regMid").value;
	last = document.getElementById("regLast").value;
	
	if(!username == ""){
		if(!password == ""){
			if(password == confirms){
				if(!first == ""){
					if(!last == ""){
						inputValidation(username, password, confirms, first, middle, last);
					}
					else{
						alert("Last name should not be empty");
					}
				}
				else{
					alert("First name should not be empty");
				}
			}
			else{
				alert("Password does not match");
			}
		}
		else{
			alert("Password should not be empty");
		}
	}
	else{
		alert("Username should not be empty");
	}
}

function saveAccount(username, password, first, middle, last){
	window.location.href = "saveAccount.php?user="+username+"&pass="+password+"&first="+first+"&middle="+middle+"&last="+last;
}