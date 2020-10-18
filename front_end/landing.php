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

<!-- MESSAGES -->
<div id="messages" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Messages</h2><br>
      There are no important messages.
    </div>
    <div class="col-sm-4">
      <span class="glyphicon logo slideanim"><img src='images/message.png'/></span>
    </div>
  </div>
</div>

<!-- ROOM SELECTION -->
<div id="selection" class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon logo slideanim"><img src='images/house_icon.png' style="width:50%;"/></span>
    </div>
    <div class="col-sm-8">
      <h2>Room Selection</h2><br>
      <p>No room selection processes to list.</p>
    </div>
  </div>
</div>

<!-- ROOM ASSIGNMENT -->
<div id="assignment" class="container-fluid">
  <h2>Room Assignment</h2>
  <div class="col-sm-8">
    <p>Taking classes from Home 001</p><br />
    <p>Fall 2020: 8/9/2020 - 11/22/2020</p><br />
    <p>No roommates to list</p>
  </div>
  <div class="col-sm-4">
      <span class="glyphicon logo slideanim"><img src='images/person.png' style="width:50%;"/></span>
  </div>
</div>

<!-- FOOTER IMAGE -->
<img src="images/glat.jpg" class="w3-image w3-greyscale-min" style="width:100%">
<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>

