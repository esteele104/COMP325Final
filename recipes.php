<?php
    include_once ".\connect.php"
?>
<script src="scripts.js"></script>

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
            <a class="title" href="index.html">Group 5's Recipe Shop</a>
            <a class="icon" href="index.html"><img src="home.png" width="30px" height="30px"></a>
            <a class="icon" href="recipes.php"><img src="recipes.png" width="30px" height="30px"></a>
            <a class="icon" href="list.html"><img src="list.png" width="30px" height="30px"></a>      
            <a class="icon" href="cart.html"><img src="cart.png" width="30px" height="30px"></a>
        </div>
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
        echo '<button class = "btn" onclick= >Add to Cart </button>';
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