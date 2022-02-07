<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$xml = new DOMDocument;
	$xml->load('Data/products.xml');
	$counter = 0;
	$products = $xml->getElementsByTagName('product');
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
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<br>
			<h1>Products</h1>
			<table id="customers">
				<tr>
					<th>Picture</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th></th>
					<th></th>
				</tr>
		<?php
			while($counter < $products->length){
				$id = $products->item($counter)->getElementsByTagName('id')->item(0)->nodeValue;
				$name = $products->item($counter)->getElementsByTagName('name')->item(0)->nodeValue;
				$price = $products->item($counter)->getElementsByTagName('price')->item(0)->nodeValue;
				$quantity = $products->item($counter)->getElementsByTagName('quantity')->item(0)->nodeValue;
				$picture = $products->item($counter)->getElementsByTagName('picture')->item(0)->nodeValue;
		?>	
				<tr>
					<td><?php echo '<img src = "'.$picture.'" width = "100" height = "100" />' ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo 'PHP '.$price.'.00'; ?></td>
					<td><?php echo $quantity ?></td>
					<td><button class = "cart" onClick = "editProd(this);" id = "<?php echo $id ?>" >Edit</button></td>
					<td><button class = "cart" onClick = "deleteProd(this);" id = "<?php echo $id ?>" >Delete</button></td>
				</tr>
		<?php
				$counter++;
			}
		?>
			</table>
		</div>
	</body>
</html>