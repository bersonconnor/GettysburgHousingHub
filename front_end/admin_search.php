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

<aside>
  <div class="filter_bar"><!-- filter_bar-->
    <form name="search_form" method="POST">
            <!-- TODO: DROP DOWNS NEED TO BE STYLED TO MATCH REST OF PAGE -->
            <div class="select_building">
            <p>Location/Building</p>
            <select name="Name" style="color:black;width:100%;">
               <option value="" >Choose...</option>
               <?php include_once("../back_end/fill_location_f.php"); ?>
            </select>
            </div>
            </br>

            <div class = "select_capacity">
            <p>Room Capacity</p>
            <select name="Size" style="color:black;width:100%;">
              <option value="">Choose...</option>
              <?php include_once("../back_end/fill_capacity_f.php"); ?>
            </select>
            </div>
            </br>

            <div class = "select_kitchen">
            <p>Kitchen</p>
            <select name="Kitchen" style="color:black;width:100%;">
              <option value="">Either</option>
              <option value = "Yes">Yes</option>
              <option value = "No">No</option>
            </select>
            </div>
            </br>

	    <div class = "select_parking">
            <p>Parking</p>
            <select name="Parking" style="color:black;width:100%;">
              <option value="">Either</option>
              <option value = "Yes">Yes</option>
              <option value = "No">No</option>
            </select>
            </div>
            </br>

	    <div class = "student_search">
	    <p>Search by Student Name</p>
            <select name="student_name" style="color:black;width:100%;">
	    <option value="">Choose...</option>
        	<?php include_once("../back_end/names_f.php"); ?>
            </select>
            </div>
            </br>
		

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
</section> <!-- table_wrap-->

<?php
        include_once("../back_end/admin_search_f.php");
        if(array_key_exists('search', $_POST)) {
                search();
        }

?>


</BODY>
</HTML>


