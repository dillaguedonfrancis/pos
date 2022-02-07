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
		<script src = "Scripts/pageNavigation.js" ></script>
		<script src = "Scripts/admin.js" ></script>
	</head>
	<body>
		<div id = "navigation" >
			<button class = "btnCH" onClick = "readProd();">Products</button>
				<ul id = "productss" class = "hidden" >
					<button onClick = "createProd();" class = "btnView" >Create</button>
					<button onClick = "readProd();" class = "btnhidden" >Read</button>
				</ul>
			<button class = "btnPolls" onClick = "settingsAdmin();" >Accounts</button>
			<button class = "btnPolls" onClick = "transactions();" >Transactions</button>
			<button class = "btnPolls" onClick = "logout();" >Logout</button>
		</div>
		<div id = "products" >
			<center>
				<br>
				<h1 id = "regH1">Add Product</h1> <?php
            if(isset($_POST['mp3'])){
                $pic = $_FILES['myFile']['name'];
                $tmp_name = $_FILES['myFile']['tmp_name'];
                
                if($pic){
                    $location = "uploads/$pic";
                    move_uploaded_file($tmp_name,$location);
                    echo "<img src='$location' class='profilepic' id='profile'>";
					echo "<input type = 'hidden' style = 'display:none' id = 'location' value = '$location' />";
                }
            }
            ?>
              <p class="lblChoosePic">Choose Product Picture</p>
				<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					
					<input type="file" name="myFile" id="myFile">
					<input type="submit" name="mp3" value="Upload" class="UploadButton">
				</form>
				<br>
				<input type = "text" class = "inputs" id = "prodName" placeholder = "Product Name"  />
				<br>
				<br>
				<input type = "text" class = "inputs" id = "prodPrice" placeholder = "Product Price"  />
				<br>
				<br>
				<input type = "number" class = "inputs" id = "prodQuantity" placeholder = "Product Quantity"  />
				<br>
				<br>
				<button class = "buttons" onClick = "addProd();" >Register</button>
				<br>
			</center>
		</div>
	</body>
</html>