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

<div id="container_name" class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      
<?php

	    include_once("../back_end/db_connect.php");
	    include_once("../back_end/group_utils.php");
      //Check user's group
      
      $login = "jdoe";
      $check = checkGroup($db, $login);    
      if($check == -1){
        print "<h2>You do not belong to a group</h2>";
      }
      else if($check == 1){
        print "<h2>You Group: </h2>";
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
    <form action='' method='post'>
    <button name='submit' value='1'
         <?php if($check==1){
           echo ' disabled= disabled ';
          }
          ?>>Create Group</button>
    
    <button name='submit' value='-1'
         <?php if($check==-1){
           echo ' disabled= disabled ';
          }
          ?>>Leave Group</button>
    </form>
    
    <?php
     if($_POST['submit']==1){
        echo "1";
      }
      else if($_POST['submit']==-1){
        echo "-1";
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
