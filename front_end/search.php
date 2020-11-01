<!DOCTYPE html>
<html lang="en">
<head>
        <?php
                include_once("components/header.html");
        ?>
        <link href="./components/search.css" rel="stylesheet" type="text/css"></link>

	<style>
		.round_input {
			background-color: #f1eded;
                        border: none;
                        color: black;
                        padding:5px 5px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        width:100%;
                        border-radius: 4px;
		}
               .round_button {
                        background-color: #f1eded;
                        border: none;
                        color: black;
                        padding:5px 5px;
                        text-align: center;
                        text-decoration: none;
                        display: inline;
                        font-size: 16px;
                        border-radius: 4px;
			width: 100%;
                }

	</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
        include_once("components/navbar.html");
        include_once("components/title.html");
?>
<div style="width:75%;margin-right: auto; margin-left: auto;">
        <div class='row'><div class='col-md-12'><h2>Search Filters</h2></div></div>
	<div style="background: #f4511e; padding: 15px; border-radius: 12px;">
	<div class='row'>
	        <div class='col-md-2'>
			<b style="color: white;">Building</b>
	        </div>
	        <div class='col-md-2'>
			<b style="color: white;">Room Capacity</b>
	        </div>
	        <div class='col-md-2'>
			<b style="color: white;">Kitchen</b>
	        </div>
	        <div class='col-md-2'>
			<b style="color: white;">Parking</b>
	        </div>
	</div>

	<form name="search_form" method="POST">
	<div class='row'>
		<div class='col-md-2'>
			<select name="Name" class="round_input">
	                	<option value="" >Choose...</option>
	                	<?php include_once("../back_end/fill_location_f.php"); ?>
	            	</select>
	        </div>
	        <div class='col-md-2'>
			<select name="Size" class="round_input">
	              		<option value="">Choose...</option>
	              		<?php include_once("../back_end/fill_capacity_f.php"); ?>
	            	</select>
	        </div>
	        <div class='col-md-2'>
			<select name="Kitchen" class="round_input">
	              		<option value="">Either</option>
	              		<option value = "Yes">Yes</option>
	              		<option value = "No">No</option>
	            	</select>
	        </div>
	        <div class='col-md-2'>
			<select name="Parking" class="round_input">
	              		<option value="">Either</option>
			        <option value = "Yes">Yes</option>
	              		<option value = "No">No</option>
	            	</select>
	        </div>
		<div class='col-md-1'></div>
		<div class='col-md-2'>
	            <input type="submit" name="search" id="search" value="Search" id="search_button" class="round_button" />
		</div>
		<div class='col-md-1'></div>
		</div>
	</div>
	</form>

<br />

<div class='row'><div class='col-md-12'><h2>Search Results</h2></div></div>
<div class='row' style="background: #00008B; padding: 15px; border-radius: 12px;">
	<div class='col-md-2'>
		<b style="color: white;">Building</b>
	</div>
        <div class='col-md-2'>
		<b style="color: white;">Room Number</b>
        </div>
        <div class='col-md-2'>
		<b style="color: white;">Capacity</b>
        </div>
        <div class='col-md-2'>
		<b style="color: white;">Floor Plan</b>
        </div>
        <div class='col-md-2'>
		<b style="color: white;">Status</b>
        </div>

</div>

<?php
	include_once("../back_end/search_result_f.php");
        if(array_key_exists('search', $_POST)) {
                search();
        }
?>

</div>
</div>
</div>

<?php
        include_once("components/footer.html");
        include_once("components/anim.html");
?>

</body>
</html>
