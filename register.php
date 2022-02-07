<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		if($_SESSION['login'] == "admin"){
			header("LOCATION: ../../../Gilz/prodAdmin.php");
		}
		else{
			header("LOCATION: ../../../Gilz/prodUser.php");
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Design/index.css" />
		<script src = "Scripts/register.js" ></script>
		<script src = "Scripts/pageNavigation.js" ></script>
	</head>
	<body>
		<div id = "header" >
			<ul>
				<li><a onClick = "loginButton();">Login</a></li>
				<li><a onClick = "registerButton();">Sign Up</a></li>
			</ul>
		</div>
		<div id = "frmRegister" >
			<center>
				<br>
				<h1 id = "regH1">Register</h1>
				<input type = "text" class = "inputs" id = "regUsername" placeholder = "Username"  />
				<br>
				<br>
				<input type = "password" class = "inputs" id = "regPassword" placeholder = "Password"  />
				<br>
				<br>
				<input type = "password" class = "inputs" id = "regConfirm" placeholder = "Confirm Password"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "regFirst" placeholder = "First Name"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "regMid" placeholder = "Middle Name"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "regLast" placeholder = "Last Name"  />
				<br>
				<br>
				<button class = "buttons" onClick = "signUp();" >Register</button>
				<br>
			</center>
		</div>
	</body>
</html>