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
			<button class = "btnCH" onClick = "prodUser();" >Products</button>
			<button class = "btnPolls" onClick = "cartUser();" >Cart</button>
			<button class = "btnPolls" onClick = "settingsUser();" >Account Settings</button>
			<button class = "btnPolls" onClick = "wishUser();" >Wish List</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
<?php
	$user = $_SESSION['login'];
	$xml = new DOMDocument;
	$xml->load('Data/Wish'.$user.'.xml');
	$prodName = $_GET['name'];
	$prodPrice = $_GET['price'];
	$picture = $_GET['picture'];
	$function = "Wish";
	$products = $xml->getElementsByTagName('product');
	$exist = false;
	$ctr = 0;
	
	while($ctr < $products->length){
		$productName = $products->item($ctr)->getElementsByTagName('name')->item(0)->nodeValue;

		if($prodName == $productName){
			$exist = true;
			break;
		}
		$ctr++;
	}
	
	if($exist){
		echo "Already added";
	}
	else{
		$newProduct = $xml->createElement('product');

        $newName = $xml->createElement('name', $prodName);
        $newPrice = $xml->createElement('price', $prodPrice);
        $newPicture = $xml->createElement('picture', $picture);

        $newProduct->appendChild($newName);
        $newProduct->appendChild($newPrice);
        $newProduct->appendChild($newPicture);

        $xml->getElementsByTagName('products')->item(0)->appendChild($newProduct);
        $save = $xml->save('Data/Wish'.$user.'.xml');
		
		if($save){
			header("LOCATION: ../../../Gilz/transactions.php?product=".$prodName."&func=".$function."&price=".$prodPrice);
		}
	}
?>
		</div>
	</body>
</html>