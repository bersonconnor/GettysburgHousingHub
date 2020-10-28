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

<section class = "content"><!-- content-->
  <div class = "search_body"><!-- search-->
  <table class = "table table-striped table-hover table-bordered"><!-- table-->
    <thead>
    <tr>
      <th scope="col">Location/Building</th>
      <th scope="col">Room#</th>
      <th scope="col">Capacity</th>
      <th scope="col">Floor Plan</th>
      <th scope="col">Status</th>
    </tr>
    </thead>

  <!-- TODO: THE RESULTS THAT ARE PRINTED HERE NEED TO BE FORMATTED AND STYLED -->
  <!-- TODO: PANE WITH SCROLL BAR NEEDS TO BE ADDED FOR OVERFLOWING RESULTS -->
  <tbody>
    <?php
        include_once("../back_end/search_result_f.php");
        if(array_key_exists('search', $_POST)) {
                search();
        }
  ?>
  
  <!-- FOR EVERY ROW IN THE RESULT RESULT, CREATE A ROW -->
  </tbody>
  
  </table>
  </div>
  
<aside>
  <div class="filter_bar"><!-- filter_bar-->
    <form name="search_form" method="POST" <!--action="../back_end/search_result_f.php" -->
	    <!-- TODO: DROP DOWNS NEED TO BE STYLED TO MATCH REST OF PAGE -->
	    <div class="select_building">
	    <p>Location/Building</p>
	    <select name="building" style="color:black;width:100%;">
	       <option value="" >Choose...</option>
	       <?php include_once("../back_end/fill_location_f.php"); ?>
	    </select>
	    </div>
	    </br>

	    <div class = "select_capacity">
	    <p>Room Capacity</p>
	    <select name="size" style="color:black;width:100%;">
	      <option value="">Choose...</option>
	      <?php include_once("../back_end/fill_capacity_f.php"); ?>
	    </select>
	    </div>
	    </br>
         
	    <div class = "select_kitchen">
	    <p>Kitchen</p>
	    <select name="kitchen" style="color:black;width:100%;">
	      <option value="">Either</option>
	      <option value = "Yes">Yes</option>
	      <option value = "No">No</option>
	    </select>
	    </div>
	    </br>

	    <div class = "select_parking">
	    <p>Parking</p>
	    <select name="parking" style="color:black;width:100%;">
	      <option value="">Either</option>
	      <option value = "Yes">Yes</option>
	      <option value = "No">No</option>
	    </select>
	    </div>
	    </br>
      
     <button class="btn" type="button" data-toggle="collapse" data-target = "#expand" style="color:black;width:80%;">More</button></br>
     
     <div class="collapse" id="expand">
     <div class = more>
        <div class = "select_room">
  	    <p>Room#</p>
  	    <select name="room" style="color:black;width:100%;">
  	      <option value="">Choose...</option>
  	      <?php include_once("../back_end/fill_capacity_f.php"); ?>
  	    </select>
  	    </div>
  	    </br>
        
        <div class = "select_bathroom">
  	    <p>Private Bathroom</p>
  	    <select name="bathroom" style="color:black;width:100%;">
  	      <option value="">Either</option>
  	      <option value = "Yes">Yes</option>
  	      <option value = "No">No</option>
  	    </select>
  	    </div>
  	    </br>
           
        <div class = "select_price">
  	    <p>Price</p>
  	    <select name="price" style="color:black;width:100%;">
  	      <option value="">Choose...</option>
  	      <?php include_once("../back_end/fill_capacity_f.php"); ?>
  	    </select>
  	    </select>
  	    </div>
  	    </br>
        
        <div class = "select_availability">
  	    <p>Availability</p>
  	    <select name="availability" style="color:black;width:100%;">
  	      <option value="">Either</option>
  	      <option value = "Yes">Yes</option>
  	      <option value = "No">No</option>
  	    </select>
  	    </div>
  	            
      </div>     
      </div>
               

      <br>  
	    <!-- TODO: BUTTON STYLING NEEDS TO BE FINALIZED AND MOVED TO CSS FILE -->
	    <input type="submit" name="search" id="search" value="Search" id="search_button"
						style="background-color: #f1eded;
						border: none;
						color: black;
						padding:5px 5px;
						text-align: center;
						text-decoration: none;
						display: inline-block;
						font-size: 16px;
						width:100%;
						border-radius: 4px;" />
    </form>

  </div><!-- filter_bar-->
</aside>

</section> <!-- content-->


<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>
