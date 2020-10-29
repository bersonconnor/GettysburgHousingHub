<?php
       /*
	* Fills the drop down list with all of the students names
        * in the database.
        */

        include_once("db_connect.php");

        // Select names ordered (lastname, firstname) in ascending order
        $query = "SELECT CONCAT(Lname, ' ', Fname) AS Name FROM STUDENT ORDER BY Name ASC;";
        $res = $db->query($query);

        if ($res != FALSE) {
		// Iterate over all the capacities
                while ($row = $res->fetch()) {
                        $name = $row['Name'];
                        // Inject capacity as HTML option for a drop down
                        print("<option value='$name'>$name</option>");
                }
        }
        else {
                print("<option value=''>Error</option>");
        }
?>


