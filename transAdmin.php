<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("LOCATION: ../../../Gilz/login.php");
	}
	$user = $_SESSION['login'];
	$xml = new DOMDocument;
	$xml->load('Data/transactions.xml');
	$counter = 0;
	$transactions = $xml->getElementsByTagName('transaction');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="Design/Navigation.css" />
		<script src = "Scripts/pageNavigation.js" ></script>
		<script src = "Scripts/admin.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnPolls" onClick = "readProd();">Products</button>
			<button class = "btnPolls" onClick = "settingsAdmin();" >Accounts</button>
			<button class = "btnCH" onClick = "transactions();" >Transactions</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<br>
			<h1>Products</h1>
			<table id="customers">
				<tr>
					<th>Transaction</th>
					<th>Cost</th>
					<th>Date</th>
				</tr>
		<?php
			while($counter < $transactions->length){
				$name = $transactions->item($counter)->getElementsByTagName('name')->item(0)->nodeValue;
				$product = $transactions->item($counter)->getElementsByTagName('product')->item(0)->nodeValue;
				$function = $transactions->item($counter)->getElementsByTagName('function')->item(0)->nodeValue;
				$date = $transactions->item($counter)->getElementsByTagName('date')->item(0)->nodeValue;
				$price = $transactions->item($counter)->getElementsByTagName('price')->item(0)->nodeValue;
		?>	
				<tr>
					<td><?php if($function == "Cart"){ echo $name." added ".$product." to his/her cart."; }else if($function == "Wish"){ echo $name." added ".$product." to his/her wish list."; }else if($function == "Removed"){ echo $name." removed ".$product." to his/her cart."; } else{ echo $name." purchased ".$product; } ?></td>
					<td>PHP <?php echo $price; ?>.00</td>
					<td><?php echo $date; ?> </td>
				</tr>
		<?php
				$counter++;
			}
		?>
			</table>
		</div>
	</body>
</html>