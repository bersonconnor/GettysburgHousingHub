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

<div id="login" class="container-fluid">
  <div class="row">
  <div class="col-sm-12">
      <h2>ACCOUNT LOGIN</h2><br>
      <p>Username</p>
      <input type="text" name="username" style="width:300px;"/><br /><br />
      <p>Password</p>
      <input type="password" name="password" style="width: 300px;"/><br /><br />
      <br><button class="btn btn-default btn-lg">Login in Now!</button>
    </div>
  </div>
</div>

<?php include_once("components/anim.html"); ?>

</body>
</html>

