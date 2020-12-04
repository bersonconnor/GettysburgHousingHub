<?php
include_once("db_connect.php");
//print_r($_POST);
	/*
	* Prints out the table of results when the user searches the housing database.
	* The parameters the user searches by are extracted from $_POST.
	*/
	function search($db) {
		
    /*
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

    */
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
				if ($i !== 0 && $i !== $n - 1 && $params !== "") {
					$params .= " AND ";
				}

				/* If the key refers to a boolean variable */
				if ($key=='Kitchen' || $key=='Parking') {
					if ($key == 'Kitchen') { $params .= "ROOM.$key="; }
					if ($key == 'Parking') { $params .= "BUILDING.$key="; }
					/* If the drop down says yes */
					if ($value == "Yes") {
						$params .= "1"; /* Find when True */
					}
					else {
						$params .= "0"; /* Otherwise, find when False */
					}
				}
				/* Otherwise, it is not a boolean */
				else {
					$params .= "$key='$value'";
				}
			}
		}

		/* If we have any parameters, then we create a WHERE statement */
		if ($params !== "") {
		        $q .= " WHERE " . $params;
		}
		$q .= ";";
		//echo "$q";
   
		/* If the query is valid */
		$res_q = $db->query($q);
   
		if ($res_q != False) {
      
			echo "<div style='padding: 15px;'>";
			$i = 0;
			/* Print every search result that matches the user input */
			while ($row=$res_q->fetch()) {

				/* Get all the values from the row and put into an array */
				$building 	= $row['Name'];
				$number 	= $row['Number'];
				$size		= $row['Size'];
				$floor_plan	= $row['FloorPlan'];
				$varArr		= array($building, $number, $size, $floor_plan);

				/* Print with grey as row background if odd and nothing if even*/
				if ($i % 2 == 0) {
					echo "<div class='row'>";
				}
				else {
					echo "<div class='row' style='background: #f2f2f2;'>";
				}

				/* Print each variable */
				foreach ($varArr as $val) {
					echo "<div class='col-md-2'><p style='color: black;'>$val</p></div>";
				}

				$i = $i + 1;
				echo "</div>";
			}
			echo "</div>";
		}
		else {
			print"<p>ERROR</p>";
		}
	}
?>