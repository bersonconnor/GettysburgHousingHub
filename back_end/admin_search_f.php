<?php

        //Prints out a table when user searches using an admin search

        function search() {
                $host="ada.cc.gettysburg.edu";
                $dbase="f20_3";
                $user="hochtr01";
                $pass="hochtr01";

                try {
                        //php database
                        $db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
                }
                 catch (PDOException $e) {
                        die("Error connecting to mysql database " . $e->getMessage());
                 }

                //base query
                $q = "SELECT Name, Number, Size, FloorPlan FROM BUILDING JOIN ROOM ON Name=BuildingName";
                $params = "";
                $n = count($_POST);
		$keys = array_keys($_POST);

                //add all none empty parameters
                for ($i = 0; $i < $n; $i++) {
                        $key = $keys[$i];
                        $value = $_POST[$key];
                        //non-default value and not 'search'
                        if ($value !== '' && $key !== 'search') {
                                if ($i !== 0 && $i !== $n - 1 && $params !== "" ) {
                                        $params .= " AND ";
                                }

                                //if its boolean
                                if ($key=='Kitchen' || $key=='Parking') {
                                        if ($key == 'Kitchen') {
                                                $params .= "ROOM.$key=";
                                        }
                                        if ($key == 'Parking') {
                                                $params .= "BUILDING.$key=";
                                        }
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

                //where statement
                if ($params !== "") {
                        $q .= " WHERE " . $params;
                }
                $q .=";";
                echo "Admin Search By Default Shows Residents in Each Room";
                //if its valid
                $res_q = $db->query($q);
                if ($res_q == TRUE) {
                        echo "<div style='padding: 15px;'>";
                        $i = 0;

                        while ($row=$res_q->fetch()) {
                                $building = $row['Name'];
                                $number         = $row['Number'];
                                $size           = $row['Size'];
                                $floor_plan     = $row['FloorPlan'];
                                $varArr         = array($building, $number, $size, $floor_plan);

                                //prints with grey background if odd and nothing if even
                                if ($i % 2 == 0) {
                                        echo "<div class='row'>";
                                }
				else {
                                        echo "<div class='row' style='background: #f2f2f2;'>";
                                }

                                //print each variable
                                foreach ($varArr as $val) {
                                        echo "<div class='col-md-2'><p style='color: black;'>$val</p></div>";
				}
					
				//student lookup and print
				$q2 = "SELECT Fname, Lname FROM STUDENT INNER JOIN ROOM ON ROOM.GroupID = STUDENT.GroupID WHERE STUDENT.GroupID =  (SELECT GroupID FROM ROOM WHERE BuildingName = '$building' AND Number = '$number');";
				$q2_res = $db->query($q2);
			       	if ($q2_res == TRUE) {
					while ($row2 = $q2_res->fetch()) { 
						$Fname = $row2['Fname'];
						$Lname = $row2['Lname'];
						echo "$Fname  $Lname, ";
					}
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

