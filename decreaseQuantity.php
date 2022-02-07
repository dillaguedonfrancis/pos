<?php
	$name = $_GET['name'];
	$type = $_GET['type'];
	if($type == "purchased"){
		$function = "Purchase";
	}
	else{
		$function = "Removed";
	}
	$xml = new DOMDocument;
	$xml->load('Data/products.xml');
	$ctr = 0;
	$products = $xml->getElementsByTagName('product');
	
	while($ctr < $products->length){
		$prodName = $products->item($ctr)->getElementsByTagName('name')->item(0)->nodeValue;
		
		if($name == $prodName){
			$quantity = $products->item($ctr)->getElementsByTagName('quantity')->item(0)->nodeValue;
			$price = $products->item($ctr)->getElementsByTagName('price')->item(0)->nodeValue;
			break;
		}
		$ctr++;
	}
	
	$quantity = $quantity - 1;
	
	$newValue = $quantity;
	$newTag = $xml->createElement('quantity');
	$newText = $xml->createTextNode($newValue);
	$newTag->appendChild($newText);
	$oldQuantity = $products->item($counter)->getElementsByTagName('quantity')->item(0);
	$products->item($counter)->replaceChild($newTag,$oldQuantity);
	$resultsss = $xml->save('Data/products.xml');
	if($resultsss){
		header("LOCATION: ../../../Gilz/transactions.php?product=".$name."&func=".$function."&price=".$price);
	}
?>