<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$name = $_GET['name'];
	$price = $_GET['price'];
	$xml = new DOMDocument;
	$xml->load("Data/users.xml");
	$date = date("F j, Y");
	$counter = 0;
	$total = $price;
	$users = $xml->getElementsByTagName('user');
	while($counter < $users->length){
		$username = $users->item($counter)->getElementsByTagName('username')->item(0)->nodeValue;
		$first = $users->item($counter)->getElementsByTagName('firstname')->item(0)->nodeValue;
		$middle = $users->item($counter)->getElementsByTagName('middlename')->item(0)->nodeValue;
		$last = $users->item($counter)->getElementsByTagName('lastname')->item(0)->nodeValue;
		
		if($user == $username){
			break;
		}
		
		$counter++;
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
			<button class = "btnCH" onClick = "cartUser();" >Cart</button>
			<button class = "btnPolls" onClick = "settingsUser();" >Account Settings</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<center>
				<br>
				<h1>Receipt</h1>
				<h2>Thank you for purchasing <?php echo $name ?>.</h2>
				<h3><?php echo $name; ?></h3>
					<td><?php echo 'PHP '.$price.'.00'; ?></td>
				<h3><?php echo 'Total of PHP '.$total.'.00'; ?></h3>
				<h3><?php echo $date; ?></h3>
				<h3><?php echo $first." ".$middle." ".$last; ?></h3>
				<button class = "buttons" onClick = "okay(this);" id = "<?php echo $name ?>" name = "purchased" >Okay</button>
			</center>
		</div>
	</body>
</html>
