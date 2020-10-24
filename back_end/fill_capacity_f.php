<?php
       /*
        * Fills the drop down list with all of the room capacities
        * in the database.
        */

	include_once("db_connect.php");

	// Select distinct room capacity with ascending order
	$q_cap = "SELECT DISTINCT Size FROM ROOM ORDER BY Size ASC;";
	$res_cap = $db->query($q_cap);

	if ($res_loc == TRUE) {
		// Iterate over all the capacities
		while ($row = $res_cap->fetch()) {
			$size = $row['Size'];
			// Inject capacity as HTML option for a drop down
			print("<option value='$size'>$size</option>");
		}
	}
	else {
		print("<option value=''>Error</option>");
	}
?>
