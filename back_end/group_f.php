<?php

include_once("db_connect.php");

//Check if the user is already in a group 
function checkGroup($db, $login){

  $group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q = $db->query($group);
  
   if($q != FALSE){
    $result = $q->fetch();
    $g = $result['GroupID'];
    //The user is group yet
    if($g != NULL){
      return 1;
    }
    //The user is not in a group
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
  $gId = "SELECT MAX(GroupID)AS value FROM ROOM_GROUP";
  $q1 = $db->query($gId);
  $row1 = $q1->fetch();
  $curr_ID = $row1['value'];
  $curr_ID = $curr_ID + 1;
 
  $sId = "SELECT ID FROM STUDENT WHERE '$login' = Login";
  $q2 = $db->query($sId);
  $row2 = $q2->fetch();
  $student_ID = $row2['ID'];
  
  $create = "INSERT INTO ROOM_GROUP VALUES ($curr_ID, $student_ID, 1)";
  $q3 = $db->query($create);
  
  $update = "UPDATE STUDENT SET GroupID = $curr_ID WHERE '$login' = Login;";
  $q4 = $db->query($update);
  
  if( $q1 != FALSE && $q2 != FALSE && $q3 != FALSE && $q4 != FALSE){
    header("Location: ../front_end/group.php");
   }
  else{
    print"<p>ERROR</p>";
  }
}

//Leave a group
function leaveGroup($db, $login){

  $gId = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q1 = $db->query($gId);
  $row1 = $q1->fetch();
  $curr_ID = $row1['GroupID'];
  
  $gSize = "SELECT Size FROM ROOM_GROUP WHERE GroupID = $curr_ID";
  $q2 = $db->query($gSize);
  $row2 = $q2->fetch();
  $curr_Size = $row2['Size'];
  
  
  $leave = "UPDATE STUDENT SET GroupID = NULL WHERE Login ='$login' ";
  $q3 = $db->query($leave);

  if($q1 != FALSE && $q2 != FALSE && $q3 != FALSE){
    if($curr_Size == 1){
      $clear_group = "DELETE FROM ROOM_GROUP WHERE GroupID = $curr_ID";
      $q4 = $db->query($clear_group);
      
      if($q4 == FALSE){
        print"<p> q4 ERROR</p>";
      }
      else{
        header("Location: ../front_end/group.php");
      }
    }
  }
  else{
    print"<p>ERROR</p>";
  }
}

//Show all the group member of the user
function showGroup($db, $login){
  $group = "SELECT GroupID, Fname, Lname FROM STUDENT NATURAL JOIN  ROOM_GROUP
                WHERE GroupID = (SELECT t2.GroupID FROM STUDENT AS t2 WHERE '$login' = Login)";
  $q = $db->query($group);
  
  if($q != FALSE){
    $i = 0;
    //Get all the members that are in the same group
    printf("<CAPTION>The group has %d member(s)</CAPTION>\n", $q->rowCount());
    
    echo "<div class='row' style = 'width: 100%; background: black;'>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 18px'>Group ID</p></div>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 18px'>First Name</p></div>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 18px'>Last Name</p></div>";
    echo "</div>";
    While($row = $q->fetch()){
      $groupID = $row['GroupID'];
      $fname = $row['Fname'];
      $lname = $row['Lname'];
      $arr = array($groupID, $fname, $lname);
      
      if ($i % 2 == 0) {
					echo "<div class='row' style = 'width: 100%; border: solid 1px black;'>";
				}
				else {
					echo "<div class='row' style='background: #f2f2f2; width: 100%;border: solid 1px black;'>";
				}

				// Print each variable 
				foreach ($arr as $val) {
					echo "<div class='col-md-2'><p style='color: black; font-size: 18px'>$val</p></div>";
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
