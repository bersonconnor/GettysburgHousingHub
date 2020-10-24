<?php
        /*
        * Fills the drop down list with all of the building names
	* in the database.
        */

	include_once("db_connect.php");

	// Get the names of the building
	$q_loc = "SELECT Name FROM BUILDING;";
	$res_loc = $db->query($q_loc);

	if ($res_loc == TRUE) {
		// Iterate over the names
		while ($row = $res_loc->fetch()) {
			$name = $row['Name'];
			// Inject HTML option for the drop down
			print("<option value='$name'>$name</option>");
		}
	}
	else {
		print("<option value=''>Error</option>");
	}
?>
