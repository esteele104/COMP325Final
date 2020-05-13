<?php
    include_once ".\connect.php"
?>
<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>Group 5's Recipe Shop- Recipes</title>
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
            <input id="textbox" type="text" placeholder="Search...">      
        </div>
        <div id="bar">
            <a class="title2">Recipes</a>
            
        </div>
        <?php
     $sql = "SELECT * FROM Recipes";

    $result = $conn->query($sql);
    $records = array();


if($result->num_rows > 0){
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
        echo '<img src=',$r["Image"],' height = "250" width = "250">';
        echo '<button class = "btn" onclick= "addRecipeToCart(',"'",$r["Name"],"'",')"><i class="fas fa-plus" style="font-size:15px;"></i>Add to Cart </button>';
        
        echo "<br>";
        echo "<b>", $r["Name"],": ","</b>", $r["Instructions"];
        echo "<br>";
        echo "<b>","Ingredients: ","</b>",$r["Ingredients"];
        echo "<br>";
        echo "<b>","Nutrition Information: ","</b>","Calories: ",$r["Calories"]," Serving size: ",$r["Servings"];
        echo "<br>";
    }
}
    $conn->close();
    ?>
    </body>
</html>