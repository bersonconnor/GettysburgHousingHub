<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once("components/header.html");
	?>
	<link href="./components/search.css" rel="stylesheet" type="text/css"></link>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
	include_once("components/navbar.html");
	include_once("components/title.html");
?>

<section class = "table_wrap"><!-- table_wrap-->
  <div class = "table_header"><!-- table_heard-->
    <ul>
    <li>
      <div class = "options"><!-- options-->
        <div class = "t_building">
        <span> Location/Building </span>
        </div>

        <div class = "t_room">
        <span> Room Number </span>
        </div>

        <div class = "t_capacity">
        <span> Capacity </span>
        </div>

        <div class = "t_floor_plan">
        <span> Floor Plan </span>
        </div>

        <div class = "t_status">
        <span> Status </span>
        </div>
      </div><!-- options-->
    </li>
    </ul>

  </div> <!-- table_heard-->

<aside>
  <div class: "filter_bar"><!-- filter_bar-->
    <div class = "select_building">
    <p>Location/Building</p>
    <select style="color:black;width:100%;">
       <option value="" >Choose...</option>
       <?php include_once("../back_end/fill_location_f.php"); ?>
    </select>
    </div>
    </br>

    <div class = "select_capacity">
    <p>Room Capacity</p>
    <select style="color:black;width:100%;">
      <option value="" >Choose...</option>
      <?php include_once("../back_end/fill_capacity_f.php"); ?>
    </select>
    </div>
    </br>

    <div class = "select_kitchen">
    <p>Kitchen</p>
    <select style="color:black;width:100%;">
      <option value="Either" >Either</option>
      <option value = "Yes">Yes</option>
      <option value = "No">No</option>
    </select>
    </div>
    </br>

    <div class = "select_parking">
    <p>Parking</p>
    <select style="color:black;width:100%;">
      <option value="Either" >Either</option>
      <option value = "Yes">Yes</option>
      <option value = "No">No</option>
    </select>
    </div>

    <!-- <div class = "select_capacity">
      <p>Room Capacity:</p>
      <input type="checkbox" id = "1" name="capacity1" value="1"/>
      <label for="1">1</label>
      <input type="checkbox" id = "2" name="capacity2" value="2"/>
      <label for="2">2</label>
      <input type="checkbox" id = "3" name="capacity3" value="3"/>
      <label for="3">3</label>
      <br>
      <input type="checkbox" id = "4" name="capacity4" value="4"/>
      <label for="3">4</label>
      <input type="checkbox" id = "5" name="capacity5" value="5"/>
      <label for="3">5</label>
      <input type="checkbox" id = "6" name="scapacity6" value="6"/>
      <label for="3">6</label>
      <br>
    </div>

    <div class = "select_kitchen">
      <p>Kitchen:</p>
      <input type="radio" id="kitchen" name="kt" value="yes">
      <label for="kitchen">Yes</label>
      <input type="radio" id="no_kitchen" name="kt" value="no">
      <label for="kitchen">No</label>
      <br>
      <input type="radio" id="either" name="kt" value="either" checked="checked">
      <label for="kitchen">Either</label>
      <br>
    </div>

    <div class = "select_parking">
      <p>Parking:</p>
      <input type="radio" id="parking" name="pk" value="yes">
      <label for="kitchen">Yes</label>
      <input type="radio" id="no_parking" name="pk" value="no">
      <label for="kitchen">No</label>
      <br>
      <input type="radio" id="either" name="pk" value="either" checked="checked">
      <label for="kitchen">Either</label>
      <br>
    </div> -->

  </div><!-- filter_bar-->
</aside>
</section> <!-- table_wrap-->


<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>
