<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$xml = new DOMDocument;
	$xml->load("Data/$user.xml");
	$counter = 0;
	$products = $xml->getElementsByTagName('product');
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
			<button class = "btnPolls" onClick = "wishUser();" >Wish List</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<br>
			<h1>Cart</h1>
			<table id="customers">
				<tr>
					<th>Picture</th>
					<th>Name</th>
					<th>Price</th>
					<th></th>
					<th></th>
				</tr>
		<?php
			while($counter < $products->length){
				$name = $products->item($counter)->getElementsByTagName('name')->item(0)->nodeValue;
				$price = $products->item($counter)->getElementsByTagName('price')->item(0)->nodeValue;
				$picture = $products->item($counter)->getElementsByTagName('picture')->item(0)->nodeValue;
		?>	
				<tr>
					<td><?php echo '<img src = "'.$picture.'" width = "100" height = "100" />' ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo 'PHP '.$price.'.00'; ?></td>
					<td><center><button class = "cart" onClick = "purchaseCart(this);" id = "<?php echo $name?>" name = "<?php echo $price ?>" >Purchase</button></center></td>
					<td><center><button class = "cart" onClick = "okay(this);" id = "<?php echo $name?>" name = "removed" >Remove</button></center></td>
				</tr>
		<?php
				$counter++;
			}
		?>
			</table>
		</div>
	</body>
</html>