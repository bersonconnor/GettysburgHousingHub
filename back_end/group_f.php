<?php

/*
* Check if the user is already in a group 
*/
function checkGroup($db, $login){

  $group = "SELECT GroupID FROM STUDENT WHERE '$login' = Login";
  $q = $db->query($group);
  
  
  if($q != FALSE){
    $result = $q->fetch();
    //The user is not in a group yet
    if($result == NULL){
      return -1;
    }
    //The user is in a group
    else{
      return 1;
    }
    
  }
  else{
    print"<p>ERROR</p>";
  }
}

/*
* Create a group with user himself as the member; 
*/
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
* Leave a group
*/
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

/*
* Show all the group member of the user
*/
function showGroup($db, $login){
  $group = "SELECT GroupID, Fname, LnameFROM STUDENT NATRUAL JOIN  ROOM_GROUP 
            WHERE GroupID = (SELECT GroupID FROM STUDENT, WHERE '$login' = Login";);
  $q = $db->query($group);
  
  if($q != FALSE){
    //Show all 
    While($row = $result = $q->fetch()){
      $groupID = $row['GroupID'];
      $Fname = $row['Fname'];
      $Lname = $row['Lname'];
      
      //print each rows;
    }
  }
  else{
    print"<p>ERROR</p>";
  }
}

//Add the group lead components
?>
