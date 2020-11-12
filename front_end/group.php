<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("components/header.html"); ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
	include_once("components/navbar.html");
	include_once("components/title.html");
?>


<?php
include_once("../back_end/db_connect.php");
include_once("../back_end/group_f.php");
session_start();
//echo $_SESSION['user'];
$login = $_SESSION['user'];
//print_r($_POST);

$op = $_GET['op'];
$studentID = $_POST['id'];

if($op == "add") {
  $add = leader_add($db, $login, $studentID);
}
else if($op == "remove") {
  $remove = leader_remove($db, $login, $studentID);
}
?>



<div id="main" class="container-fluid">
  <div class="row">
    <div class="col-sm-12" style = "color: black; front: 18px">
      
<?php
      //include_once("../back_end/group_f.php");
      //Check user's group
      $check = checkGroup($db, $login);  
      
      if($check == -1){
        print "<h2>You do not belong to a group</h2>";
      }
      else if($check == 1){
        print "<h2>Your Group: </h2>";
        $checkLeader = checkleader($db, $login);
        if($checkLeader == 1){
          print "<h3>You are the group leader </h3></br>";
        }
        $show = showGroup($db, $login);
        if($show == FALSE){
          print"<h3>SHOW GROUP ERROR</h3>";
          }
      }
      
?>  
  <br>
  <span style="float:left; color: black; font-size: 18px">
      <form name="add" method="post" action="group.php?op=add">
      <input type="text" name="id"placeholder="Student ID" /></br>
      <INPUT type="submit" value="Add a new member" 
          <?php if($check != 1){
           echo ' disabled= disabled ';
          }
          ?>style= "border-radius: 12px;"/>  
    </form>
    </span>
    <span style="float:left; color: black; font-size: 18px">
    <form name="remove" method="post" action="group.php?op=remove">
      <input type="text" name="id"placeholder="Student ID" /></br>
      <INPUT type="submit" value="Remove a member" 
          <?php if($checkLeader != 1){
           echo ' disabled= disabled ';
          }
          ?>style= "border-radius: 12px;"/>
    </form>    
    </span>
    
    <span style="float:right; color: black; font-size: 18px">
    <form action='' method='get'>
    <input type = "submit" name = "create" value = "Create Group"
         <?php if($check==1){
           echo ' disabled= disabled ';
          }
          ?>style= "border-radius: 12px;"/>
    
    <input type = "submit" name ="leave" value = "Leave Group"
         <?php if($check==-1){
           echo ' disabled= disabled ';
          }
          ?>style = "border-radius: 12px;"/>
    </form>
    </span>
    
    <?php 
      //print_r($_GET); 
      if (isset($_GET['create'])) {
       $create = createGroup($db, $login);         
     }
       
      else if($_GET['leave']){
        $leave = leaveGroup($db, $login);

      }
    ?>
    
    </div>
  </div>
</div>

<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>