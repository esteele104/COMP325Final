<?php
    include_once ".\connect.php"
?>
<script src="Scripts.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>ProjectName - Meat</title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css.css" />
    </head>
    <body>
        <div id="top">
            <a class="title" href="index.html">ProjectName</a>
            <a class="icon" href="index.html"><img src="home.png" width="30px" height="30px"></a>
            <a class="icon" href="recipes.php"><img src="recipes.png" width="30px" height="30px"></a>
            <a class="icon" href="list.html"><img src="list.png" width="30px" height="30px"></a>      
            <a class="icon" href="cart.html"><img src="cart.png" width="30px" height="30px"></a>
        </div>
        <div id="search">
            <input id="textbox" type="text" placeholder="Search...">      
        </div>
        <div id="bar">
            <a class="section" href="produce.php">Produce</a>
            <a class="section" href="meat.php">Meat</a>
            <a class="section" href="dairy.php">Dairy</a>
            <a class="section" href="bakery.php">Bakery</a>
            <a class="section" href="beverages.php">Beverages</a>
            <a class="section" href="more.php">More</a>   
        </div>
        
        <?php
        
        $sql = "SELECT * FROM items where productType = 'Meat';";

    $result = $conn->query($sql);
    $records = array();


if($result->num_rows > 0){
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
        echo $r["Name"]," Price: $",$r["Price"];
        echo '<button class = "btn" onclick="addToCart(',"'",$r["Name"],"'",",",$r["Price"],')"> Add to Cart </button>';
        echo "<br>";
    }
}
    $conn->close();
    ?>
        
    </body>
</html>