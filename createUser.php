<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$xml = new DOMDocument;
	$xml->load('Data/users.xml');
	$counter = 0;
	$users = $xml->getElementsByTagName('user');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="Design/Navigation.css" />
		<script src = "Scripts/pageNavigation.js" ></script>
		<script src = "Scripts/admin.js" ></script>
		<script src = "Scripts/register.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnPolls" onClick = "readProd();">Products</button>
			<button class = "btnCH" onClick = "settingsAdmin();" >Accounts</button>
				<ul id = "productss" class = "hidden" >
					<button onClick = "createUser();" class = "btnView" >Add Users</button>
					<button onClick = "viewUser();" class = "btnhidden" >View Users</button>
					<button onClick = "settingsAdmin();" class = "btnhidden" >Settings</button>
				</ul>
			<button class = "btnPolls" onClick = "transactions();" >Transactions</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<center>
				<br>
				<h1 id = "regH1">Add User</h1>
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
				<button class = "buttons" onClick = "signUp();" >Add</button>
				<br>
			</center>
		</div>
	</body>
</html>