<?php

include_once("db_connect.php");

//Check if the user is already in a group 
function checkGroup($db, $login){

  $group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q = $db->query($group);
  
  
  if($q != FALSE){
    $result = $q->fetch();
    $g = $result['GroupID'];
    //The user is not in a group yet
    if($g != NULL){
      return 1;
    }
    //The user is in a group
    else{
      return -1;
    }
  }
  else{
    print"<p>ERROR</p>";
  }
}

//Create a group with user himself as the member; 

function createGroup($db, $login){
  $gId = "SELECT MAX(GroupID) FROM RoomGroup";
  $q1 = $db->query($id);
  
  $sId = "SELECT ID FROM STUDENT WHERE '$login' = Login";
  $q2 = $db->query($sID);
  
  $create = "INSERT INTO ROOM_GROUP VALUE ($gId + 1, $sId, 1);";
  $q3 = $db->query($create);
  
  $update = "UPDATE STUDENT SET GroupID = $gID WHERE '$login' = Login;";
  $q4 = $db->query($update);
  
  if( $q1 != FALSE && $q2 != FALSE && $q3 != FALSE && $q4 != FALSE){
    return TRUE;
  }
  else{
    print"<p>ERROR</p>";
  }
}

/*
// Leave a group
function leaveGroup($db, $login){

  $leave = "UPDATE STUDENT SET GroupID = NULL '$login' = Login";
  $q = $db->query($leave);
  
  if( $q != FALSE ){
    return TRUE;
  }
  else{
    print"<p>ERROR</p>";
  }
}
*/

//Show all the group member of the user


function showGroup($db, $login){
  $group = "SELECT GroupID, Fname, Lname FROM STUDENT NATURAL JOIN  ROOM_GROUP
                WHERE GroupID = (SELECT t2.GroupID FROM STUDENT AS t2 WHERE '$login' = Login)";
  $q = $db->query($group);
  
  if($q != FALSE){
    $i = 0;
    //Get all the members that are in the same group
    printf("<CAPTION>This Group has %d rows and %d columns</CAPTION>\n", $q->rowCount(), $q->columnCount());
    While($row = $q->fetch()){
      $groupID = $row['GroupID'];
      $fname = $row['Fname'];
      $lname = $row['Lname'];
      $arr = array($groupID, $fname, $lname);
      
      if ($i % 2 == 0) {
					echo "<div class='row' style = 'width: 50%;'>";
				}
				else {
					echo "<div class='row' style='background: #f2f2f2; width: 50%;'>";
				}

				/* Print each variable */
				foreach ($arr as $val) {
					echo "<div class='col-md-2'><p style='color: black;'>$val</p></div>";
				}

				$i = $i + 1;
				echo "</div>";      
    }
    return TRUE;
  }
  else{
    return FALSE;
  }
}


//Add the group lead components
?>
