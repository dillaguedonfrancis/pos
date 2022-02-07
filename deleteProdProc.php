<?php
	$id = $_GET['id'];

	$xml = new DOMDocument;
	$xml->load('Data/products.xml');
	
	$products = $xml->getElementsByTagName('product');

	$ctr = 0;
	while($ctr < $products->length){
		$prodID = $products->item($ctr)->getElementsByTagName('id')->item(0)->nodeValue;
		
		if($id == $prodID){
           break;
		}
		$ctr++;
	}

	$xml->getElementsByTagName('products')->item(0)->removeChild($products->item($ctr));
		
	$test = $xml->save('Data/products.xml');
	
	if($test){
		header("LOCATION: ../../../Gilz/prodAdmin.php");
	}

?>