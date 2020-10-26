<?php
	/*
	* Prints out the table of results when the user searches the housing database.
	* The parameters the user searches by are extracted from $_POST.
	*/
	function search() {
		// TODO: MAKE IT SO INCLUDING OF db_connect.php FUNCTIONS
		// RIGHT NOW IT ONLY FUNCTIONS IF IN CODE METHOD
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


		/* Write out the base query */
		$q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName";
		$params = "";
		$n = count($_POST);
		$keys = array_keys($_POST);

		/* Append all none empty parameters */
		for ($i = 0; $i < $n; ++$i) {
	                $key = $keys[$i];
	                $value = $_POST[$key];

			/* If the current key is not search as that is the button and is not a default value */
			if ($value !== '' && $key !== 'search') {
				if ($i !== 0 && $i !== $n - 1) {
					$params .= " AND ";
				}
				$params .= "$key='$value'";
			}
		}

		/* If we have any parameters, then we create a WHERe statement */
		if ($params !== "") {
		        $q .= " WHERE " . $params;
		}
		$q .= ";";


		// TODO: PRINTING NEEDS TO BE CHANGED SO THAT IT PRINTS FORMATTED AND STYLIZED RESULTS


		/* If the query is valid */
		$res_q = $db->query($q);
		if ($res_q == TRUE) {
		        //print "<!DOCTYPE html><html><head><title>Search Tester</title></head><body>";
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
		print "</table>";
	}
?>
