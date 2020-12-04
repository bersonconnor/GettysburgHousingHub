<?php
session_start();
include_once("db_connect.php");

function apply() {
	$host="ada.cc.gettysburg.edu";
	$dbase="f20_3";
        $user="hochtr01";
        $pass="hochtr01";

        try {
               // PHP Database Object
               $db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
        }
       	catch (PDOException $e) {
                        // . is the concatenation operator
        die("Error connecting to mysql database " . $e->getMessage());
	}

	$login = $_SESSION['user'];
	$q = "SELECT GroupID FROM STUDENT WHERE Login = '$login'";
	$res = $db->query($q);
	$num = $_POST['room'];
	$building = $_POST['building'];

	if ($res == TRUE) { 
		while ($row = $res->fetch()) {
			$group = $row['GroupID'];
			$q2 = "UPDATE ROOM SET GroupID = '$group' WHERE Number = '$num' AND BuildingName = '$building'";
		}
	
		$res2 = $db->query($q2);
	
		if ($res2 == TRUE) {
			echo "Thank you! You have successfully applied to a room";
		}
		else {
			echo "Error adding you to a room, please try again";
		}
	}
}

