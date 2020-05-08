<?php
    include_once ".\connect.php"
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 5px solid #ccc;
  background-color: #f1f1f1;    
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
    font-size:120%;

}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
<title>COMP325 Final</title>
</head>
<body>
 

<div class="tab">
    <button style ="font-size: 120%;" class="tablinks" onclick="document.location = 'index.html'"><i class="fas fa-home"></i></button> 
  <button class="tablinks" onclick="openCity(event, 'Recipes')">Recipes</button>
  <button class="tablinks" onclick="openCity(event, 'Store')">Store</button>
    <button style ="font-size: 120%;" class="tablinks" onclick="openCity(event, 'Cart')"><i class="fas fa-shopping-cart"></i></button> 
</div>
    <div id="Recipes" class="tabcontent">
  <h3>All Recipes</h3>
  
    <?php
     $sql = "SELECT * FROM Recipes";

    $result = $conn->query($sql);
    $records = array();


if($result->num_rows > 0){
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
        echo "<b>", $r["Name"],": ","</b>", $r["Instructions"];
        echo "<br>";
        echo "<b>","Ingredients: ","</b>",$r["Ingredients"];
        echo "<br>";
        echo '<img src=',$r["Image"],'>';
        echo "<br>";
    }
}
    $conn->close();
    ?>
</div>

<div id="Store" class="tabcontent">
  <h3>All items</h3>
  <p>This is where all the items will be.</p>
</div>
    
    <div id="Cart" class="tabcontent">
  <h3>Cart Items</h3>
  <p>This is where all the items added to the cart will be.</p>
</div>
    
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
    
</script>
    
</body>
</html>