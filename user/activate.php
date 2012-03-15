<?php
session_start();
include("../config/init.php");

$hash = protect($_GET['uh']);

if(isset($hash)) {

	$test_auth = mysql_query("SELECT * FROM users WHERE(`hash`='$hash')") or die(mysql_error("Failed to activate: " . mysql_error()));
	
	if(countRows($test_auth) == 1) {
	
		if(activateUser($hash) == 1) {
			$_SESSION['msg'] = "<div class='green'>Your account has been activated, you may now log in.</div>";
			header("Location: ../login.php");
		} else {
			print("Failed to activate user, please try again later.");
		}
		
	} else {
	
		header("Location: ../index.php");
	}
	
	
} else {

	header("Location: ../index.php");

}


?>