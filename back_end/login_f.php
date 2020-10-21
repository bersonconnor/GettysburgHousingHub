<?php
	include_once("db_connect.php");
	include_once("account_utils.php");

	// Get input from the form
	$login  = $_POST['username'];
        $hash   = $_POST['password'];

        // Check user's status
        $result = checkUser($db, $login, $hash);

        if ($result == 1) {
                header("Location: ../front_end/landing.php");
        }
        else {
		$msg = "";
		if ($result == -1) {
                	$msg = "Cannot find your information. Please try again.";
        	}
        	elseif ($result == -2) {
                	$msg = "Your password does not match. Please try again.";
        	}
		header("Location: ../front_end/login.php?msg=$msg");
	}
?>
