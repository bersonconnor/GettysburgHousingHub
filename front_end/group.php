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

<div id="main" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      
<?php
      
	    include_once("../back_end/db_connect.php");
	    include_once("../back_end/group_f.php");
      //Check user's group
      
      $login = "jsmith";
      $check = checkGroup($db, $login);  
      
      if($check == -1){
        print "<h2>You do not belong to a group</h2>";
      }
      else if($check == 1){
        print "<h2>Your Group: </h2>";
        $show = showGroup($db, $login);
        if($show == FALSE){
          print"<h3>SHOW GROUP ERROR</h3>";
          }
      }
      else{
         print"<h3>CHECK GROUP ERROR</h3>";
      }
?>  
  
    <br>
    <form action='' method='get'>
    <input type = "submit" name = "create" value = "Create Group"
         <?php if($check==1){
           echo ' disabled= disabled ';
          }
          ?>style= "border-radius: 12px; color: black"/>
    
    <input type = "submit" name ="leave" value = "Leave Group"
         <?php if($check==-1){
           echo ' disabled= disabled ';
          }
          ?>style = "border-radius: 12px; color: black"/>
    </form>
    
    
    <?php 
      //print_r($_GET); 
      if (isset($_GET['create'])) {
       
       $create = createGroup($db, $login);         
     }
       
      else if($_GET['leave']){
        echo "Leaving Group";
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
