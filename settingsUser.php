<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>User</title>
		<link rel="stylesheet" type="text/css" href="Design/Navigation.css" />
		<script src = "Scripts/pageNavigation.js" ></script>
		<script src = "Scripts/user.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnPolls" onClick = "prodUser();" >Products</button>
			<button class = "btnPolls" onClick = "cartUser();" >Cart</button>
			<button class = "btnCH" onClick = "settingsUser();">Account Settings</button>
			<button class = "btnPolls" onClick = "wishUser();" >Wish List</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "viewPassword" >
			<center>
				<br>
				<br>
				<br>
					<h1>Change Password</h1>
					<br>
					<input type = "password" id = "oldPassword" class = "inputs" placeholder = "Old Password" />
					<br>
					<br>
					<input type = "password" id = "newPassword" class = "inputs" placeholder = "New Password" />
					<br>
					<br>
					<input type = "password" id = "conPassword" class = "inputs" placeholder = "Confirm Password" />
					<br>
					<br>
					<p>
					<button onClick = "changePassword();" class = "pButton" id = "chID" >Change</button>
					<button onClick = "clears();" class = "pButton" >Clear</button>
					</p>
					<br>
			</center>
		</div>
	</body>
</html>