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

<style>
* {
margin: 0;
padding: 0;
border: none;
list-style-type: none;
}


.search_bar{
  margin: auto;
  width: 1000px;
  padding: 20px; 
  outline: black, solid, 10px;
#border: 2px solid black;
}

.search_bar input{
  color: black;
  font-size = 20px;
  border: 20px; 
  width: 100%;
  padding: 10px;
#border: 2px solid black;
}

.table_wrap{
  width: 1000px;
  margin: 30px auto; 
  padding: 10px;
#border: 2px solid black;
}

.table_wrap ul li .options{
  display:flex;    
  align-items:center;

  background:  #f5f5f5;
  padding: 10px; 
#border: 2px solid black;
}

.table_wrap ul li .options .building{
  width:50%;
  padding: 10px; 
  #border: 2px solid black;
}

.table_wrap ul li .options .room,
.table_wrap ul li .options .size{
  width:20%;
  padding: 20px; 
#border: 2px solid black;
}

.table_wrap ul li .options .floor_plan,
.table_wrap ul li .options .status{
  width:30%;
  padding: 20px; 
#border: 2px solid black;
}

</style>

  <div class="search_bar">
    <input type = "text" id = "search_bar" placeholder = "Search with key words">
  </div>
  
  <div class = "table_wrap">
      <div class = "table_header">
          
          <ul>
            <li>
              <div class = "options">
                  <div class = "building">
                    <span> BUILDING </span>
                  </div>
                  <div class = "room">
                    <span> ROOM </span>
                  </div>
                  <div class = "size">
                    <span> SIZE </span>
                  </div>
                  <div class = "floor_plan">
                    <span> FLOOR PLAN </span>
                  </div>
                  <div class = "status">
                    <span> STATUS </span>
                  </div>
              </div>
            </li>
          </ul>
          
      </div>
  </div>


<?php
	include_once("components/footer.html");
	include_once("components/anim.html");
?>

</body>
</html>