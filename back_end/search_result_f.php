<?php
	include_once("db_connect.php");

	/* Get search variables from $_POST */
	$name = $_POST["name"];
	$cap  = $_POST["capacity"];
	$kit  = $_POST["kitchen"];
	$park = $_POST["parking"];
	print "<p>$name\n$cap\n$kit\n$park\n</p><br />";

	/* Choose the appropriate query depending on user selection*/
	$q = "";
	if ($name != 'NULL' && $cap != 'NULL') {
		$q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName WHERE Name='$name' AND Size='$cap';";
	}
	else if($name != 'NULL' && $cap == 'NULL') {
		$q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName WHERE Name='$name';";
	}
	else if ($name == 'NULL' && $cap != 'NULL') {
		$q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName WHERE Size='$cap';";
	}
	else {
		$q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName;";
	}

	/* If the query is valid */
	$res_q = $db->query($q);
	if ($res_q == TRUE) {
	        print "<!DOCTYPE html><html><head><title>Search Tester</title></head><body>";
	        print "<table><tr><td>Building</td><td>Room Number</td><td>Capacity</td><td>Floor Plan</td></tr>";

		/* Print every search result that matches the user input */
		while ($row=$res_q->fetch()) {
			$building 	= $row['Name'];
			$number 	= $row['Number'];
			$size		= $row['Size'];
			$floor_plan	= $row['FloorPlan'];
			print "<tr><td>$building</td><td>$number</td><td>$size</td><td>$floor_plan</td></tr>";
		}
	}
	else {
		print"<p>ERROR</p>";
	}
	print "</table></body></html>";
?>
