<?php
	session_start();
	session_destroy();
	header("LOCATION: ../../../Gilz/login.php");
?>