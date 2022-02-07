<?php
    $name = $_GET['name'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];
	$picture = $_GET['picture'];
	
	$xml = new DOMDocument;
	$xml->load('Data/products.xml');

	$products = $xml->getElementsByTagName('product');
	$ctr = 0;
	$exist = false;
	
	while($ctr < $products->length){
		$lastID = $products->item($ctr)->getElementsByTagName('id')->item(0)->nodeValue;
		$ctr++;
	}
	
	$id = $lastID + 1;
	
	while($ctr < $products->length){
		$eName = $products->item($ctr)->getElementsByTagName('name')->item(0)->nodeValue;
		
		if($eName == $name){
			break;
			$exist = true;
		}
		$ctr++;
	}
		
	if(!$exist){
        $newProduct = $xml->createElement('product');

        $newProductID = $xml->createElement('id', $id);
        $newProductName = $xml->createElement('name', $name);
        $newProductPrice = $xml->createElement('price', $price);
        $newProductQuantity = $xml->createElement('quantity', $quantity);
        $newProductPicture = $xml->createElement('picture', $picture);

        $newProduct->appendChild($newProductID);
        $newProduct->appendChild($newProductName);
        $newProduct->appendChild($newProductPrice);
        $newProduct->appendChild($newProductQuantity);
        $newProduct->appendChild($newProductPicture);

        $xml->getElementsByTagName('products')->item(0)->appendChild($newProduct);
        $save = $xml->save('Data/products.xml');
		
		header("LOCATION: ../../../Gilz/prodAdmin.php");
	}
?>