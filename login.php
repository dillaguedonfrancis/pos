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
		<script src = "Scripts/login.js" ></script>
		<script src = "Scripts/pageNavigation.js" ></script>
	</head>
	<body>
		<div id = "header" >
			<ul>
				<li><a onClick = "loginButton();">Login</a></li>
				<li><a onClick = "registerButton();">Sign Up</a></li>
			</ul>
		</div>
		<div id = "frmLogin" >
			<center>
				<br>
				<h1 id = "head">Login</h1>
				<input type = "text" class = "inputs" id = "username" name = "username" placeholder = "Username" />
				<br>
				<br>
				<input type = "password" class = "inputs" id = "password" name = "password" placeholder = "Password" />
				<p id = "err"  ></p>
				<br>
				<button class = "buttons" onClick = "login();" >Login</button>
			</center>
		</div>
	</body>
</html>