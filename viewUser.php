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
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnPolls" onClick = "readProd();">Products</button>
			<button class = "btnCH" onClick = "settingsAdmin();" >Accounts</button>
				<ul id = "productss" class = "hidden" >
					<button onClick = "createUser();" class = "btnhidden" >Add Users</button>
					<button onClick = "viewUser();" class = "btnView" >View Users</button>
					<button onClick = "settingsAdmin();" class = "btnhidden" >Settings</button>
				</ul>
			<button class = "btnPolls" onClick = "transactions();" >Transactions</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<br>
			<h1>Users</h1>
			<table id="customers">
				<tr>
					<th>username</th>
					<th>first</th>
					<th>middle</th>
					<th>last</th>
					<th></th>
					<th></th>
				</tr>
		<?php
			while($counter < $users->length){
				$username = $users->item($counter)->getElementsByTagName('username')->item(0)->nodeValue;
				$first = $users->item($counter)->getElementsByTagName('firstname')->item(0)->nodeValue;
				$middle = $users->item($counter)->getElementsByTagName('middlename')->item(0)->nodeValue;
				$last = $users->item($counter)->getElementsByTagName('lastname')->item(0)->nodeValue;
				
				if($username == $user){
				}
				else{
		?>	
				<tr>
					<td><?php echo $username ?></td>
					<td><?php echo $first ?></td>
					<td><?php echo $middle ?></td>
					<td><?php echo $last ?></td>
					<td><button class = "cart" onClick = "editUser(this);" id = "<?php echo $username ?>" >Edit</button></td>
					<td><button class = "cart" onClick = "deleteUser(this);" id = "<?php echo $username ?>" >Delete</button></td>
				</tr>
		<?php
				}
				$counter++;
			}
		?>
			</table>
		</div>
	</body>
</html>