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
		<link rel="stylesheet" type="text/css" href="Design/Navigation.css" />
		<script src = "Scripts/login.js" ></script>
		<script src = "Scripts/pageNavigation.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnPolls" onClick = "prodUser();" >Products</button>
			<button class = "btnPolls" onClick = "cartUser();" >Cart</button>
			<button class = "btnCH" onClick = "settingsUser();">Account Settings</button>
			<button class = "btnPolls" onClick = "wishUser();" >Wish List</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "viewPassword" >
			<?php
				$user = $_SESSION['login'];
				$xml = new DOMDocument;
				$xml->load('Data/users.xml');
				$oldP = $_GET['oldPass'];
				$newP = $_GET['newPass'];
				$counter = 0;
				$users = $xml->getElementsByTagName('user');
				
				while($counter < $users->length){
					$currentuser = $users->item($counter)->getElementsByTagName('username')->item(0)->nodeValue;
					
					if($user == $currentuser){
						$pass = $users->item($counter)->getElementsByTagName('password')->item(0)->nodeValue;
						break;
					}
					
					$counter++;
				}
				
				if($oldP == $pass){
					$newValue = $newP;
					$newTag = $xml->createElement('password');
					$newText = $xml->createTextNode($newValue);
					$newTag->appendChild($newText);

					$oldPassword = $users->item($counter)->getElementsByTagName('password')->item(0);
					$users->item($counter)->replaceChild($newTag,$oldPassword);
					$resultsss = $xml->save('Data/users.xml');
					if($resultsss){
						echo "Success";
					}
				}
				else{
					echo "Wrong password";
				}
			?>
		</div>
	</body>
</html>