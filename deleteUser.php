<?php
	$user = $_GET['username'];

	$xml = new DOMDocument;
	$xml->load('Data/users.xml');
	
	$users = $xml->getElementsByTagName('user');

	$ctr = 0;
	while($ctr < $users->length){
		$username = $users->item($ctr)->getElementsByTagName('username')->item(0)->nodeValue;
		
		if($user == $username){
           break;
		}
		$ctr++;
	}

	$xml->getElementsByTagName('users')->item(0)->removeChild($users->item($ctr));
		
	$test = $xml->save('Data/users.xml');
	
	if($test){
		header("LOCATION: ../../../Gilz/viewUser.php");
	}

?>