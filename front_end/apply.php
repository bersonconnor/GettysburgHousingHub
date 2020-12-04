<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("components/header.html"); ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
        include_once("components/navbar.html");
	include_once("components/title.html");
	//session_start();
	//$login = $_SESSION['user'];
?>


<form name='apply_form' method="POST">
  <div class="row">
  <div class="col-sm-12">
      <h2>Apply for a Room</h2><br>
	<caption>If you have not signed in already, please sign in before applying for a room</caption>
	<br>
      <label for="building">Choose a building:</label>
      <select id="building" name="building">
      <option value="">Choose...</option>
	<?php include_once("../back_end/fill_location_f.php"); ?>
      </select>
      <br>	
      <label for="room">Choose a room:</label>
      <select id="room" name="room"> 
      <option value="-">-</option>
      <option value="101">101</option>
      <option value="102">102</option>
      <option value="105">105</option>
      <option value="203">203</option>
      </select>
	<br>
    	 <input type="submit" name="apply" id="apply" value="Apply" id="apply_button" class="round_button" />  
    </div>
  </div>
</div>


<?php 
include_once("../back_end/apply_f.php");	
if(array_key_exists('apply', $_POST)) {
	apply();
}


include_once("components/anim.html"); ?>

</body>
</html>

