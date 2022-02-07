<?php
session_start();
?>
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
	$username = $_GET['user'];
    $password = $_GET['pass'];
	
	$xml = new DOMDocument;
	$xml->load('Data/users.xml');

	$users = $xml->getElementsByTagName('user');
	$ctr = 0;
	$log = 0;
	
	while($ctr < $users->length){
		$user = $users->item($ctr)->getElementsByTagName('username')->item(0)->nodeValue;
		$pass = $users->item($ctr)->getElementsByTagName('password')->item(0)->nodeValue;
		
		if($username == $user){
			$log = 1;
			if($password == $pass){
				$log = 2;
				if($user == "admin"){
					$log = 3;
				}
			}
			break;
		}
		$ctr++;
	}
	
	if($log == 3){
		$_SESSION['login'] = $username;
		header("LOCATION: ../../../Gilz/prodAdmin.php");
	}
	else if($log == 2){
		$_SESSION['login'] = $username;
		header("LOCATION: ../../../Gilz/prodUser.php");
	}
	else if($log == 1){
		echo "<center><p>Invalid password</p></center>";
	}
	else{
		echo "<center><p>Account does not exist</p></center>";
	}
?>
	</body>
</html>