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
      <h2>ACCOUNT SIGNUP</h2><br>
      <p>First Name</p>
      <input type="text" name="firstname" style="width:300px;"/><br /><br />
      <p>Last Name</p>
      <input type="text" name="lastname" style="width:300px;"/><br /><br />
      <p>Password</p>
      <input type="password" name="password" style="width: 300px;"/><br /><br />
      <p>Student ID</p>
      <input type="text" name="id" style="width: 100px;" /><br /><br />
      <p>Graduating Class</p>
      <input type="text" name="class" style="width: 100px;" /><br /><br />
      <br><button class="btn btn-default btn-lg">Sign up now!</button>
    </div>
  </div>
</div>

<?php include_once("components/anim.html"); ?>

</body>
</html>

