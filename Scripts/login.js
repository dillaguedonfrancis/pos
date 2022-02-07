function login(){
	user = document.getElementById("username").value;
	pass = document.getElementById("password").value;
	
	window.location.href = "logProcess.php?user="+user+"&pass="+pass;
}