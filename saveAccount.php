<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Design/index.css" />
		<script src = "Scripts/login.js" ></script>
		<script src = "Scripts/pageNavigation.js" ></script>
	</head>
	<body>
		<div id = "header" >
			<ul>
				<li><a onClick = "loginButton();">Login</a></li>
				<li><a onClick = "registerButton();">Sign Up</a></li>
			</ul>
		</div>
<?php
	session_start();
    $username = $_GET['user'];
    $password = $_GET['pass'];
    $fname = $_GET['first'];
    $lname = $_GET['last'];
    $mname = $_GET['middle'];
	
	$xml = new DOMDocument;
	$xml->load('Data/users.xml');

	$users = $xml->getElementsByTagName('user');
	$ctr = 0;
	$exist = false;
	
		while($ctr < $users->length){
			$user = $users->item($ctr)->getElementsByTagName('username')->item(0)->nodeValue;
			
			if($username == $user){
				$exist = true;
				break;
			}
			$ctr++;
		}
		
	if(!$exist){
        $newUser = $xml->createElement('user');

        $newUsername = $xml->createElement('username', $username);
        $newPassword = $xml->createElement('password', $password);
        $newFirstname = $xml->createElement('firstname', $fname);
        $newMiddlename = $xml->createElement('middlename', $mname);
        $newLastname = $xml->createElement('lastname', $lname);

        $newUser->appendChild($newUsername);
        $newUser->appendChild($newPassword);
        $newUser->appendChild($newFirstname);
        $newUser->appendChild($newMiddlename);
        $newUser->appendChild($newLastname);

        $xml->getElementsByTagName('users')->item(0)->appendChild($newUser);
        $save = $xml->save('Data/users.xml');
		
		 $myFile = fopen("Data/$username.xml","a");

       $xmlContent = '<?xml version="1.0"?>
   <products></products>';

       $content = file("Data/$username.xml");

       $fileIn = array();
       $count = 0;
       foreach($content as $content)
       {
          $fileIn[$count] = $content;
       }	
	   
       fwrite($myFile,$xmlContent);
	 
		$myFile = fopen("Data/Wish$username.xml","a");

       $xmlContent = '<?xml version="1.0"?>
   <products></products>';

       $content = file("Data/Wish$username.xml");

       $fileIn = array();
       $count = 0;
       foreach($content as $content)
       {
          $fileIn[$count] = $content;
       }	
	   
       fwrite($myFile,$xmlContent);
		if(!isset($_SESSION['login'])){
			echo "<center><p>Succesful</p></center>";
		}
		else{
			header("LOCATION: ../../../Gilz/viewUser.php");
		}
	}
	else{
		echo "<center><p>Already exist</p></center>";
	}
?>
	</body>
</html>