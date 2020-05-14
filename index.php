<?php
    include_once ".\connect.php"
?>
<script src="scripts.js"></script>
<!DOCTYPE html>
<html>
    <?php

        $i = 0;
        $sql = "SELECT * FROM items;";
        $sql2 = "SELECT DISTINCT items.Name, recipes.name as recName from 
recipes, itemtorecipe, items

WHERE
itemtorecipe.RecipeID = recipes.ID AND items.ID = itemtorecipe.ItemID;";

    $result = $conn->query($sql);
    $records = array();
    $result2 = $conn->query($sql2);
    $records2 = array();


if($result->num_rows > 0){
    
    
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
                
      echo '<script> addToAllItems(',"'",$r["Name"],"'",',',$r["Price"],",","'",$r["Image"],"'",',',') </script>';    
    
    }
    '<script> localStorage.setItem("allItems", JSON.stringify(allItems)); </script>';
    
}
echo '<script> var recipeItems = [{recipeName: "", items: ["items","item2"]}]; </script>';

if($result2->num_rows > 0){
    
    $oldName = "here";
   //Loop through all our records and add them to our array
    while($r2 = $result2->fetch_assoc())
    {
                
      
      $currName = $r2["recName"];
        
     if(trim($oldName) != trim($currName)){
         $oldName = $currName;
         $i++;
         echo '<script> 

                        var recipeToAdd = {recipeName: ',"'",$r2['recName'],"'",',items: [',"'",$r2["Name"],"'",']};
                        recipeItems.push(recipeToAdd);
                        console.log(recipeItems); 
             </script>';
     }
    else {
        echo '<script>
        
        recipeItems[',$i,'].items.push(',"'",$r2["Name"],"'",');
        
        </script>';
    }
        
}
    echo '<script> localStorage.setItem("recipeItems", JSON.stringify(recipeItems)); </script>';
}
    
    ?>
    <script>
           var recipes = [{recipeL: '', items: ["items","item2"]}];
            var recipeToAdd = {recipeName: 'Banana Pancakes',items: ['Eggs (six pack)']};
                        recipes.push(recipeToAdd);
            console.log(JSON.parse(localStorage.getItem('recipeItems'))); 
    </script>
    
    <head>
        <title>Group 5's Recipe Shop</title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css.css" />
    </head>
    <body>
        <div id="top">
            <a class="title" href="index.php">Group 5's Recipe Shop</a>
            
            <a class="icon" href="recipes.php"  style = "position:absolute; left: 900px; top: 20px"><img src="recipes.png" width="30px" height="30px"></a>
            <a class="icon" href="list.html" style = "position:absolute; left: 1000px; top: 20px"><img src="list.png" width="30px" height="30px"></a>      
            <a class="icon" href="cart.html" style = "position:absolute; left: 1100px; top: 20px"><img src="cart.png" width="30px" height="30px"></a>
        </div>
        <div id="cart-num" class = "cart-pos" style = "font-family: 'Open Sans', sans-serif;color:#b31111;font-weight: bold;"></div>
        <script>
            var cart = JSON.parse(localStorage.getItem('cart'));
            var numToDisaply = cart.length-1;
            if(numToDisaply >0){
                document.getElementById("cart-num").innerHTML = numToDisaply;
            }
        </script>
        
        
        <div id="search">
            <input id="textbox" type="text"
        name="search" placeholder="Search items.." onkeyup = "getKey(event)"> 
            <button class = "searchBtn" onclick="setSearchStr()"> Search</button>
        </div>
        <div class="tab">
            <button class="section" onclick="window.location.href ='produce.php'">Produce</button>
            <button class="section" onclick="window.location.href = 'meat.php'">Meat</button>
            <button class="section" onclick="window.location.href = 'dairy.php'">Dairy</button>
            <button class="section" onclick="window.location.href = 'bakery.php'">Bakery</button>
            <button class="section" onclick="window.location.href = 'beverages.php'">Beverages</button>
            <button class="section" onclick="window.location.href = 'more.php'">More</button>   
        </div>
        <h1 > <center>Welcome to Group 5's Recipe Shop!</center></h1>
        <a> <center>Click on a tab to start browsing the item store or click on the recipe book to browse for recipes.</center></a>
        
        
        
        <?php

        
        $sql = "SELECT * FROM items;";

    $result = $conn->query($sql);
    $records = array();


if($result->num_rows > 0){
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<div class="slideshow-container">';
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
                
          
       echo '<div class="mySlides fade">
            <img src=',$r["Image"],' style="width:300; height: 300">
          </div>';
    }
    echo '</div>';
        echo '<br>';
}
    
    ?>
        <script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
         
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          
          slides[slideIndex-1].style.display = "block";  
    
          setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
    </body>
</html>