<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$userID = $_GET['user'];
	$xml = new DOMDocument;
	$xml->load('Data/users.xml');
	$ctr = 0;
	$users = $xml->getElementsByTagName('user');
	
	while($ctr < $users->length){
		$username = $users->item($ctr)->getElementsByTagName('username')->item(0)->nodeValue;
		$first = $users->item($ctr)->getElementsByTagName('firstname')->item(0)->nodeValue;
		$middle = $users->item($ctr)->getElementsByTagName('middlename')->item(0)->nodeValue;
		$last = $users->item($ctr)->getElementsByTagName('lastname')->item(0)->nodeValue;
		
		if($userID == $username){
           break;
		}
		$ctr++;
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="Design/Navigation.css" />
		<script src = "Scripts/pageNavigation.js" ></script>
		<script src = "Scripts/admin.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnCH" onClick = "readProd();">Products</button>
				<ul id = "productss" class = "hidden" >
					<button onClick = "createProd();" class = "btnhidden" >Create</button>
					<button onClick = "readProd();" class = "btnView" >Read</button>
				</ul>
			<button class = "btnPolls" onClick = "settingsAdmin();" >Accounts</button>
			<button class = "btnPolls" onClick = "transactions();" >Transactions</button>
			<button class = "btnPolls" onClick = "wishUser();" >Wish List</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<center>
				<br>
				<h1 id = "regH1">Edit User</h1>
				<input type = "text" class = "inputs" id = "first" placeholder = "First Name" value = "<?php echo $first ?>"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "middle" placeholder = "Middle Name" value = "<?php echo $middle ?>" />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "last" placeholder = "Last Name" value = "<?php echo $last ?>" />
				<br>
				<br>
				<p>
					<button onClick = "updateUser(this);" class = "pButton" id = "chID" name = "<?php echo $username ?>" >Update</button>
					<button onClick = "cancelUpdate();" class = "pButton" >Cancel</button>
				</p>
				<br>
			</center>
		</div>
	</body>
</html>