<?php
	session_start();
	
	$name = $_GET['name'];
	$type = $_GET['type'];
	
	$user = $_SESSION['login'];

	$xml = new DOMDocument;
	$xml->load('Data/'.$user.'.xml');
	
	$products = $xml->getElementsByTagName('product');

	$ctr = 0;
	while($ctr < $products->length){
		$pName = $products->item($ctr)->getElementsByTagName('name')->item(0)->nodeValue;
		
		if($name == $pName){
           break;
		}
		$ctr++;
	}

	$xml->getElementsByTagName('products')->item(0)->removeChild($products->item($ctr));
		
	$test = $xml->save('Data/'.$user.'.xml');
	
	if($test){
		header("LOCATION: ../../../Gilz/decreaseQuantity.php?name=".$name."&type=".$type);
	}

?>