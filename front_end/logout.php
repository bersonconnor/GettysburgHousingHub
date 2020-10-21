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
<div id="logout" class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h3>You Have Successfully Logged Out Of Your Account</h3><br>
      #Linked to redirect to login page
    </div>
  </div>
</div>

<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>
