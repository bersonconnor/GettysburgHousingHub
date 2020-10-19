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

<div id="apply" class="container-fluid">
  <div class="row">
  <div class="col-sm-12">
      <h2>Apply for a Room</h2><br>
      <label for="building">Choose a building:</label>
      <select id="building" name="building">
      <option value="-">-</option>
      <option value="apple">Apple Hall</option>
      <option value="paxton">Paxton</option>
      <option value="hazlet">Hazlet</option>
      <option value="rice">Rice</option> 
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

      <br><button class="btn btn-default btn-lg">Submit Application</button>
    </div>
  </div>
</div>

<?php include_once("components/anim.html"); ?>

</body>
</html>

