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
 
  $studnet_ID = "SELECT ID FROM STUDENT WHERE '$login' = Login";
  $q1 = $db->query($studnet_ID);
  $ID = $q1->fetch();
  $ID_value = $ID['ID'];
  
  $group = "SELECT GroupID, ID, Fname, Lname FROM STUDENT NATURAL JOIN  ROOM_GROUP
                WHERE GroupID = (SELECT t2.GroupID FROM STUDENT AS t2 WHERE '$login' = Login)";
  $q2 = $db->query($group);
  
  if($q1 != FALSE && $q2 != False){
    $i = 0;
    //Get all the members that are in the same group
    printf("<CAPTION>The group has %d member(s)</CAPTION>\n", $q2->rowCount());
    
    echo "<form name = 'remove' method = 'post' action = 'group.php?op=remove'>";
    echo "<div class='row' style = 'background: #3467d4; width: 100%; padding: 10px; border-radius: 12px; border: solid 0.5px black'>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 22px'>Group ID</p></div>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 22px'>Studnet ID</p></div>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 22px'>First Name</p></div>";
    echo "<div class='col-md-2'><p style='color: white; font-size: 22px'>Last Name</p></div>";
    echo "</div>";
    While($row = $q2->fetch()){
      $groupID = $row['GroupID'];
      $id = $row['ID'];
      $fname = $row['Fname'];
      $lname = $row['Lname'];
      $checkbox = "<INPUT type = 'checkbox' name='cbStudent[]' value ='$id' style = 'width: 18px; height: 18px';/>";
      if($id == $ID_value){
        $arr = array($groupID, $id, $fname, $lname);
      }
      else{
        $arr = array($groupID, $id, $fname, $lname, $checkbox);
      }
      
      if ($i % 2 == 0) {
					echo "<div class='row' style = ' background: #f2f2f2; width: 100%; font-size: 22px; padding: 10px; border-radius: 12px; border: solid 0.5px black;'>";
				}
				else {
					echo "<div class='row' style='background: #9dbede ; width: 100%; font-size: 22px; padding: 10px; border-radius: 12px; border: solid 0.5px black;'>";
				}

				// Print each variable 
				foreach ($arr as $val) {
          echo "<div class='col-md-2'><p style='color: black; font-size: 18px'>$val</p></div>";
				}
				$i = $i + 1;
				echo "</div>";      
    }
    if(checkleader($db, $login) == 1){
      echo "<br/><INPUT type='submit' value= 'Remove Member(s)' style= 'float: right; font-size: 18px; border-radius: 12px;'/>";  
    }
    echo "</form>";
    return TRUE;
  }
  else{
    return FALSE;
  }
}

//check if the user is the group leader
function checkleader($db, $login){
  
    $group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
    $q1 = $db->query($group);
    $row1 = $q1->fetch();
    $gID = $row1['GroupID'];  
        
    $check = "SELECT LeaderID FROM ROOM_GROUP WHERE GroupID = '$gID';";
    $q2 = $db->query($check);
    $row2 = $q2->fetch();
    $leader_ID = $row2['LeaderID'];
    
    $s_id = "SELECT ID FROM STUDENT WHERE '$login' = Login;";
    $q3 = $db->query($s_id);
    $row3 = $q3->fetch();
    $iD = $row3['ID'];

    if($q1 != false && $q2 != false && $q3 != false){
        if($iD == $leader_ID){
          return 1;   
        }
        else{
          return -1;
        }
    }
    else{
      return false;
    }
}

function show_groupLeader($db, $login){
    $group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
    $q1 = $db->query($group);
    $row1 = $q1->fetch();
    $gID = $row1['GroupID'];  
    
    $check = "SELECT LeaderID FROM ROOM_GROUP WHERE GroupID = '$gID';";
    $q2 = $db->query($check);
    $row2 = $q2->fetch();
    $leader_ID = $row2['LeaderID'];
        
    $leader_name= "SELECT Fname, Lname FROM STUDENT WHERE '$leader_ID' = ID ";
    $q3 = $db->query($leader_name);
    $row3 = $q3->fetch();
    $f_name = $row3['Fname'];
    $l_name = $row3['Lname'];
    
    if($q1 != false && $q2 != false && $q3 != false){
      print "<h3>The group leader is $f_name $l_name</h3></br>";
    }
    else{
      return false;
    }
    
    
}

//The leader may choose to add a new group member ($login is the leader and $studentID is the member being process)
function leader_add($db, $login, $studentID){
  
//Check the ID being added

  $eval = "SELECT ID FROM STUDENT WHERE $studentID = ID;";
  $q = $db->query($eval);
  if($q != false){
    if($q->rowCount()==0){
      print "<p style='color:red;'>Student ID does not exits</p>";
      return false;
    }
  }
  else{
    print"<p>ERROR</p>";
    return false;
  }

//Add and update the new member into the group  
  $gId = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q1 = $db->query($gId);
  $row1 = $q1->fetch();
  $group_ID = $row1['GroupID'];

  $check = "SELECT GroupID FROM STUDENT WHERE ID = '$studentID'";
  $q2= $db->query($check);
  $row2 = $q2->fetch();
  $curr_Group = $row2['GroupID'];
  
  $update_size = "UPDATE ROOM_GROUP SET Size = Size+1 WHERE GROUPID = '$group_ID'";
  $q3 = $db->query($update_size);  
  
  if($q1 != false && $q2 != false && $q3 != false){
    
    //Add to the group only f the student is not in a group yet
    if($curr_Group == NULL){
      $add = "UPDATE STUDENT SET GROUPID = $group_ID WHERE ID = '$studentID'";
      $q4= $db->query($add);
      return true;
    }
    else{
      print "<p style='color:red;'>The student is already in a group</p>";
    }
  }
  else{
    print"<p>ERROR</p>";
  }
}

//The leader may choose to remove a group member ($login is the leader and $studentID is the member being process)
function leader_remove($db, $login, $studentID){

//Check the ID being added
  
  $eval = "SELECT ID FROM STUDENT WHERE $studentID = ID;";
  $q = $db->query($eval);
  if($q != false){
    if($q->rowCount()==0){
      print "<p style='color:red;'>Student ID does not exits</p>";
      return false;
    }
  }
  else{
    print"<p>ERROR</p>";
    return false;
  }
  
  //Check if the student is in the group
  
  //The student's current groupID
  $gId = "SELECT GroupID FROM STUDENT WHERE '$studentID' = ID";
  $q = $db->query($gId);
  $row = $q->fetch();
  $groupID = $row['GroupID'];
  
  //The leader's groupID
  $leader_group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q1 = $db->query($leader_group);
  $row1 = $q1->fetch();
  $l_groupID = $row1['GroupID'];
  
  if($q != false && $q1 != false){
    if($groupID - $l_groupID != 0){
      print "<p style='color:red;'>The student is not in the group</p>";
      return false;
      }
    }
  else{
    print"<p>ERROR</p>";
    return false;
    }

  $remove = "UPDATE STUDENT SET GROUPID = NULL WHERE ID = '$studentID'";
  $q2 = $db->query($remove);
  
  $update_size = "UPDATE ROOM_GROUP SET Size = Size-1 WHERE GroupID = '$group_ID'";
  $q3 = $db->query($update_size);
  
  if($q2 != false && $q3 != false){
    return true;
  }
  else{
    print"<p>ERROR</p>";
  }
  
}
?>