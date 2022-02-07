<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$id = $_GET['id'];
	$xml = new DOMDocument;
	$xml->load('Data/products.xml');
	$ctr = 0;
	$products = $xml->getElementsByTagName('product');
	
	while($ctr < $products->length){
		$prodID = $products->item($ctr)->getElementsByTagName('id')->item(0)->nodeValue;
		$prodName = $products->item($ctr)->getElementsByTagName('name')->item(0)->nodeValue;
		$prodPrice = $products->item($ctr)->getElementsByTagName('price')->item(0)->nodeValue;
		$prodQuantity = $products->item($ctr)->getElementsByTagName('quantity')->item(0)->nodeValue;
		
		if($id == $prodID){
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
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<center>
				<br>
				<h1 id = "regH1">Edit Product</h1>
				<input type = "text" class = "inputs" id = "prodNameE" placeholder = "Product Name" value = "<?php echo $prodName ?>"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "prodPriceE" placeholder = "Product Price" value = "<?php echo $prodPrice ?>" />
				<br>
				<br>
				<input type = "number" class = "inputs" id = "prodQuantityE" placeholder = "Product Quantity" value = "<?php echo $prodQuantity ?>" />
				<br>
				<br>
				<p>
					<button onClick = "updateProduct(this);" class = "pButton" id = "chID" name = "<?php echo $prodID ?>" >Update</button>
					<button onClick = "cancelEdit();" class = "pButton" >Cancel</button>
				</p>
				<br>
			</center>
		</div>
	</body>
</html>