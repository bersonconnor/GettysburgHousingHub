<?php

// variables must start with $
$host="ada.cc.gettysburg.edu";
$dbase="f20_3";
$user="bersco01";
$pass="bersco01";

try {
	// PHP Database Object
	$db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
}
catch (PDOException $e) {
	// . is the concatenation operator
	die("Error connecting to mysql database " . $e->getMessage());
}

?>
