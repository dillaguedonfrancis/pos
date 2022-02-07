<?php
	session_start();
	$name = $_SESSION['login'];
    $product = $_GET['product'];
	$function = $_GET['func'];
	$date = date("F j, Y");
	$price = $_GET['price'];
	
	$xml = new DOMDocument;
	$xml->load('Data/transactions.xml');
		
    $newProduct = $xml->createElement('transaction');

    $newProductUser = $xml->createElement('name', $name);
    $newProductName = $xml->createElement('product', $product);
    $newProductFunction = $xml->createElement('function', $function);
    $newProductDate = $xml->createElement('date', $date);
    $newProductPrice = $xml->createElement('price', $price);

    $newProduct->appendChild($newProductUser);
    $newProduct->appendChild($newProductName);
    $newProduct->appendChild($newProductFunction);
    $newProduct->appendChild($newProductDate);
    $newProduct->appendChild($newProductPrice);

    $xml->getElementsByTagName('transactions')->item(0)->appendChild($newProduct);
    $save = $xml->save('Data/transactions.xml');
		
	if($function == "Wish"){
		header("LOCATION: ../../../Gilz/wishUser.php");
	}
	else{
		header("LOCATION: ../../../Gilz/cartUser.php");
	}
?>