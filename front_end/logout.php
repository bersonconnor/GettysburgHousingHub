<?
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("components/header.html"); ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
	//include_once("components/navbar.html");
	include_once("components/title.html");
?>

<!-- MESSAGES -->
<div id="logout" class="container-fluid" style= "color: black; font-size: 20px">
  <div class="row">
    <div class="col-sm-12">
      <h2>You Have Successfully Logged Out of Your Account</h2>
      <h3>You can choose to log back in by</h3>
      <a href="login.php"> Clicking Here</a>
    </div>
  </div>
</div>

<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>